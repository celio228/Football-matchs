@extends('layout.base')

@section('content')
    <h1>Créer un match</h1>

    @if($teams->isEmpty())
        <p>
            Aucune équipe disponible.  
            <a href="{{ route('teams.create') }}">Créer une équipe</a>
        </p>
    @else
    
    @if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{ route('games.store') }}" method="POST">
            @csrf

            <div>
                <label for="home_team_id">Équipe à domicile</label>
                <select name="home_team_id" id="home_team_id" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="away_team_id">Équipe à l'extérieur</label>
                <select name="away_team_id" id="away_team_id" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="match_date">Date du match</label>
                <input type="date" name="match_date" id="match_date" required>
            </div>

            <button type="submit">Créer le match</button>
        </form>
    @endif
@endsection
