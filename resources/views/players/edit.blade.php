@extends('layout.base')

@section('title', 'Modifier le joueur')

@section('content')

    <h1>Modifier le joueur</h1>

    <form action="{{ route('players.update', $player) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" value="{{ $player->name }}" required>
        </div>

        <div>
            <label for="age">Âge</label>
            <input type="number" id="age" name="age" value="{{ $player->age }}" required>
        </div>

        <div>
            <label for="team_id">Équipe</label>
            <select id="team_id" name="team_id" required>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $player->team_id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="position">Position</label>
            <input type="text" id="position" name="position" value="{{ $player->position }}" required>
        </div>
        <div>
            <label for="number">Numéro</label>
            <input type="number" id="number" name="number" value="{{ $player->number }}" min="1" max="99" required>
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="file" id="photo" name="photo">
        </div>

        <button type="submit" class="btn-primary">Enregistrer les modifications</button>
    </form>

    <div>
        <a href="{{ route('players.index') }}" class="btn-primary">Retour à la liste des joueurs</a>
    </div>

@endsection
