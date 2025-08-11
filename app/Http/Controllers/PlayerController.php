<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlayerRequest;
use App\Models\Player;
use App\Models\Team;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('players.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
      $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        // Handle photo upload if provided
        

        Player::create([
            'name' => $request->name,
            'position' => $request->position,
            'team_id' => $request->team_id,
            'photo' => $request->file('photo')->store('photos', 'public')
        ]);
        // Enregistrement du logo
    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('images', 'public');
    }

        return redirect()->route('teams.index')->with('success', 'Joueur ajouté avec succès');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = Player::findOrFail($id);
        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $player = Player::findOrFail($id);
        $player->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect()->route('teams.index')->with('success', 'Joueur supprimé avec succès');
    }
}
