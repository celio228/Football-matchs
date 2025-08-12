@extends('layout.base')

@section('content')
<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Arial', sans-serif;
    }
    .game-details-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
        padding: 20px;
    }
    .card {
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 30px;
        text-align: center;
        max-width: 600px;
        width: 100%;
    }
    h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 20px;
    }
    p {
        font-size: 1.2rem;
        color: #555;
        margin: 10px 0;
    }
    .team-name {
        font-weight: bold;
        color: #007bff;
    }
    .back-link {
        background-color: 
        margin-top: 30px;
        font-size: 1rem;
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .back-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.2s;
        display: inline-block;
        margin-top: 20px;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

</style>

<div class="game-details-container">
    <div class="card">
        <h1>Détails du match</h1>
        <p><strong>Équipe 1 :</strong> <span class="team-name">{{ $game->homeTeam->name }}</span></p>
        <p><strong>Équipe 2 :</strong> <span class="team-name">{{ $game->awayTeam->name }}</span></p>
        <p><strong>Date :</strong> {{ $game->match_date }}</p>
    </div>
    <div class="game-actions">
        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary">Modifier le match</a>
        <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Supprimer le match</button>
        </form>
    </div>


    <a href="{{ route('games.index') }}" class="btn btn-primary">← Retour à la liste</a>
</div>
@endsection
