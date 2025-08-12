@extends('layout.base')

@section('content')
    <style>
        /* Styles généraux pour le corps et le conteneur */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            padding: 20px;
        }
        .player-form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff; /* Un bleu foncé élégant */
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
        }

        /* Styles pour les messages d'erreur */
        .error-message {
            background-color: #fcebeb;
            color: #c0392b;
            border: 1px solid #f5c7c7;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 25px;
        }
        .error-message ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
        .error-message li {
            margin-bottom: 5px;
        }

        /* Styles pour les champs de formulaire */
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #495057;
        }
        .form-input, .form-select {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .form-input:focus, .form-select:focus {
            border-color: #5d5dff; /* Un bleu plus vif au focus */
            outline: none;
            box-shadow: 0 0 5px rgba(93, 93, 255, 0.3);
        }

        /* Styles pour le bouton de soumission */
        .submit-btn {
            width: 100%;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            margin-top: 20px;
        }
        .submit-btn:hover {
            background-color: #303f9f;
        }
    </style>

    <div class="player-form-container">
        <h1>Créer un joueur</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('players.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-input" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-input" id="position" name="position" required>
            </div>

            <div class="form-group">
                <label for="team_id" class="form-label">Équipe</label>
                <select class="form-select" id="team_id" name="team_id" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="number" class="form-label">Numéro</label>
                <input type="number" class="form-input" id="number" name="number" min="1" max="99" required>
            </div>

            <div class="form-group">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-input" id="photo" name="photo" accept="image/*">
            </div>

            <div class="form-group">
                <label for="age" class="form-label">Âge</label>
                <input type="number" class="form-input" id="age" name="age" min="1" required>
            </div>

            <button type="submit" class="submit-btn">Ajouter un joueur</button>
        </form>
    </div>
@endsection