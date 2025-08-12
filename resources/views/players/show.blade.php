@extends('layout.base')

@section('title', 'Détails du joueur')

@section('content')
    <div class="container mt-5">
        <div class="card p-4 shadow-sm">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($player->photo)
                        <img src="{{ asset('storage/' . $player->photo) }}" alt="Photo de {{ $player->name }}" class="img-fluid rounded mb-3" style="width: 200px; height: 250px; object-fit: cover;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center mx-auto mb-3 rounded" style="width: 200px; height: 250px;">
                            <span class="text-muted">Pas de photo</span>
                        </div>
                    @endif
                </div>

                <div class="col-md-8">
                    <h1 class="card-title">{{ $player->name }}</h1>
                    <p class="card-text"><strong>Âge :</strong> {{ $player->age }} ans</p>
                    <p class="card-text"><strong>Équipe :</strong> {{ $player->team->name }}</p>
                    <p class="card-text"><strong>Position :</strong> {{ $player->position }}</p>
                    <p class="card-text"><strong>Numéro :</strong> {{ $player->number }}</p>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @auth
                        <a href="{{ route('players.edit', $player) }}" class="btn btn-primary">Modifier le joueur</a>
                    @endauth
                    <a href="{{ route('teams.show', $player->team) }}" class="btn-primary">Retour à la liste</a>
                </div>

                @auth
                    <form action="{{ route('players.destroy', $player) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?')">Supprimer</button>
                </form>
                @endauth
            </div>
        </div>
    </div>
@endsection