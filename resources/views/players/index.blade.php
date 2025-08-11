@extends('layout.base')

@section('title', 'Liste des joueurs')

@section('content')

    <h1>Liste des joueurs</h1>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Âge</th>
                <th>Équipe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->age }}</td>
                    <td>{{ $player->team->name }}</td>
                    <td>
                        <a href="{{ route('players.show', $player) }}">Voir</a>
                        <a href="{{ route('players.edit', $player) }}">Modifier</a>
                        <form action="{{ route('players.destroy', $player) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('players.create') }}" class="btn-primary">Créer un joueur</a>

@endsection
