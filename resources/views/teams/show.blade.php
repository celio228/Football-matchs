@extends('layout.base')

@section('title', 'Détails de l\'équipe')

@section('content')

<style>
    .team-details-header {
        display: flex;
        align-items: flex-start;
        gap: 40px;
        margin-bottom: 40px;
    }

    .team-details-header .team-logo-lg {
        width: 150px;
        height: 150px;
        object-fit: contain;
        border-radius: 10px;
        border: 1px solid #e0e0e0;
    }

    .team-details-header .team-info {
        flex-grow: 1;
    }

    .team-details-header .team-info h1 {
        font-size: 2.5rem;
        margin: 0 0 10px 0;
        color: #333;
    }

    .team-details-header .team-info .description {
        font-size: 1rem;
        color: #666;
        line-height: 1.6;
        margin-top: 20px;
    }

    .player-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
    }

    .player-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        padding: 15px;
        transition: transform 0.2s;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .player-card:hover {
        transform: translateY(-3px);
    }

    .player-card .player-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .player-card .player-name {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    .player-card .player-age {
        font-size: 0.8rem;
        color: #666;
        margin-bottom: 10px;
    }

    .player-card .details-button {
        padding: 8px 16px;
        font-size: 0.8rem;
        border-radius: 20px;
    }
    
    .btn-primary {
        background-color: #007bff;
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
    
    .btn-primary:hover {
        background-color: #0056b3;
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

    .mt-4 {
        margin-top: 1rem;
    }
</style>

<div class="team-details-header">
    <img src="{{ asset('storage/' . $team->logo) }}" alt="Logo de {{ $team->name }}" class="team-logo-lg">
    <div class="team-info">
        <h1>{{ $team->name }}</h1>
        <p>Année de création: {{ $team->creation_year }}</p>
        <p>Nombre de joueurs: {{ $team->player_count }} joueurs</p>
        <p class="description">{{ $team->description }}</p>
    </div>
</div>

<h2>Joueurs</h2>
<div class="player-grid">
    @foreach ($team->players as $player)
        <div class="player-card">
            <img src="{{ asset('storage/' . $player->photo) }}" alt="Photo de {{ $player->name }}" class="player-photo">
            <h3 class="player-name">{{ $player->name }}</h3>
            <p class="player-age">{{ $player->age }} ans</p>
            <a href="{{ route('players.show', $player) }}" class="details-button">Détails du joueur</a>
        </div>
    @endforeach
</div>

<div class="mt-4">
    @if (Auth::check())
        <a href="{{ route('teams.edit', $team->id) }}" class="btn-primary">Modifier l'équipe</a>
    @endif
    @if (Auth::check())
        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Supprimer l'équipe</button>
        </form>
    @endif
    <a href="{{ route('teams.index') }}" class="btn-primary">Retour à la liste des équipes</a>
    @if (Auth::check())
        <a href="{{ route('players.create') }}" class="btn-primary">Créer un joueur</a>
    @endif
</div>

@endsection


