<!-- resources/views/games/edit.blade.php -->
@extends('layout.base')

@section('content')
    <h1>Modifier le match</h1>

    <form method="POST" action="{{ route('games.update', $game) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="team1_id">Équipe 1 :</label>
            <select name="team1_id" id="team1_id" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ $game->team1_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="team2_id">Équipe 2 :</label>
            <select name="team2_id" id="team2_id" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ $game->team2_id == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="match_time">Heure du match :</label>
            <input type="time" name="match_time" id="match_time" value ="{{ $game->match_time->format('H:i') }}" required>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
