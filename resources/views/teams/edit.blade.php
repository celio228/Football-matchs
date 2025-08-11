@extends('layout.base')

@section('content')
    <h1>Modifier l'équipe : {{ $team->name }}</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teams.update', $team->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nom de l'équipe :</label>
        <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}">
        <br>
        <label for="creation_year">Année de création :</label>
        <input type="number" name="creation_year" id="creation_year" value="{{ old('creation_year', $team->creation_year) }}">
        <br>
        <label for="player_count">Nombre de joueurs :</label>
        <input type="number" name="player_count" id="player_count" value="{{ old('player_count', $team->player_count) }}">
        <br>
        <label for="description">Description de l'équipe :</label>
        <textarea name="description" id="description" rows="4">{{ old('description', $team->description) }}</textarea>
        <br>
        <label for="logo">Logo de l'équipe :</label>
        <input type="file" name="logo" id="logo" accept="image/*">
        <br><br>

        <button type="submit">Modifier l'équipe</button>
    </form>
@endsection