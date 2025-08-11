<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    // Liste des matchs
    public function index()
    {
        // Récupère tous les matchs avec leurs relations 'homeTeam' et 'awayTeam'
        // $games = Game::with(['homeTeam', 'awayTeam'])->get();
        $games = Game::all();


        return view('games.index', compact('games'));

    // return view('games.index', compact('games', 'teams'));
    }

    // Formulaire création
    public function create()
    {
        $teams = Team::all();
        return view('games.create', compact('teams'));
    }

    // Enregistrer un match
    public function store(Request $request)
    {
        $validated = $request->validate([
        'home_team_id' => 'required|exists:teams,id|different:away_team_id',
        'away_team_id' => 'required|exists:teams,id|different:home_team_id',
        'match_date'   => 'required|date',
    ]);

    Game::create($validated);

    return redirect()->route('games.index')->with('success', 'Match créé avec succès.');
    }

    // Afficher un match
    public function show(Game $game)
    {
        $game->load(['homeTeam', 'awayTeam']);
        return view('games.show', compact('game'));
    }

    // Formulaire édition
    public function edit(Game $game)
    {
        $teams = Team::all();
        return view('games.edit', compact('game', 'teams'));
    }

    // Mettre à jour
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'home_team_id' => 'required|different:away_team_id|exists:teams,id',
            'away_team_id' => 'required|different:home_team_id|exists:teams,id',
            'match_date'   => 'required|date',
        ]);

        $game->update([
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id,
            'match_date'   => $request->match_date,
        ]);

        return redirect()->route('games.index')
            ->with('success', 'Match mis à jour avec succès.');
    }

    // Supprimer
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')
            ->with('success', 'Match supprimé avec succès.');
    }
}
