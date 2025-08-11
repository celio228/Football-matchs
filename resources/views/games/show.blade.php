@extends('layout.base')

@section('content')
    <h1>Détails du match</h1>

    <p><strong>Équipe 1 :</strong> {{ $game->homeTeam->name }}</p>
    <p><strong>Équipe 2 :</strong> {{ $game->awayTeam->name }}</p>
    <p><strong>Date :</strong> {{ $game->match_date }}</p>

    <a href="{{ route('games.index') }}">← Retour à la liste</a>
@endsection
