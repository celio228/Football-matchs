@extends('layout.base')
@section('content')
    <div class="container mt-5">
        <h1>Créer un joueur</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('players.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>

            <div class="mb-3">
                <label for="team_id" class="form-label">Équipe</label>
                <select class="form-select" id="team_id" name="team_id" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="number" class="form-label">Numéro</label>
                <input type="number" class="form-control" id="number" name="number" min="1" max="99" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Âge</label>
                <input type="number" class="form-control" id="age" name="age" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter le joueur</button>
        </form>
    </div>
@endsection