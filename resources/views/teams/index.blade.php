@extends('layout.base')

@section('title', 'Liste des équipes')

@section('content')
<div class="header">
    <h1>Parcourir toutes les équipes</h1>
    <p>Parcourez la liste de toutes les équipes du championnat de<br>Le nom d'un championnat fictif</p>
</div>

<div class="teams-grid">
    @foreach ($teams as $team)
        <div class="team-card">
            <img src="{{ asset('storage/' . $team->logo) }}" alt="Logo de l'équipe" class="team-logo">
            <h2 class="team-name">{{ $team->name }}</h2>
            <div class="team-details">
                <p>Année de création: {{ $team->creation_year }}</p>
                <p>Nombre de joueurs: {{ $team->player_count }} joueurs</p>
            </div>
            <a href="{{ route('teams.show', $team) }}" class="details-button">Détails de l'équipe</a>
        </div>
    @endforeach
</div>


<a href="{{ route('teams.create') }}" class="btn btn-primary">Créer une équipe</a>

@endsection
