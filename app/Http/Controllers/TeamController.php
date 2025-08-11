<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $teams = Team::all(); // Ou une autre méthode pour récupérer les équipes

    return view('teams.index', compact('teams'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'creation_year' => 'required|integer',
        'player_count' => 'required|integer',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Enregistrement du logo
    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('images', 'public');
    }

    // Création de l'équipe (user_id facultatif)
    Team::create([
        'name' => $validated['name'],
        'creation_year' => $validated['creation_year'],
        'player_count' => $validated['player_count'],
        'logo' => $logoPath,
        'user_id' => null, // volontairement NULL pour ne pas lier à un utilisateur
    ]);

    return redirect()->route('teams.create')->with('success', 'Équipe créée avec succès.');
}

    public function show(string $id)
    {
        $team = Team::findOrFail($id);
        $team->load('players'); // Charger les joueurs de l'équipe

        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'creation_year' => 'required|integer',
            'player_count' => 'required|integer',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Enregistrement du logo
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('images', 'public');
            $validated['logo'] = $logoPath;
        }

        $team->update($validated);

        return redirect()->route('teams.index')->with('success', 'Équipe mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Équipe supprimée avec succès.');
    }
}
