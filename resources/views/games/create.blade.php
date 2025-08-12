@extends('layout.base')

@section('content')
    <style>
        /* Styles généraux pour le corps */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8fafc;
            color: #333;
        }

        /* Conteneur principal */
        .container-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #1a202c;
            margin-bottom: 25px;
            font-size: 2rem;
            font-weight: bold;
        }

        /* Alertes de l'application */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid transparent;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-link {
            font-weight: bold;
            text-decoration: underline;
        }

        /* Groupes de formulaire */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        /* Champs de formulaire (select, input) */
        .form-control {
            width: 100%;
            padding: 10px 12px;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Bouton de soumission */
        .btn-primary {
            display: inline-block;
            width: 100%;
            font-weight: 600;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: 12px;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 4px;
            cursor: pointer;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004d9c;
        }
    </style>

    <div class="container-form">
        <h1>Créer un match</h1>

        @if($teams->isEmpty())
            <div class="alert alert-warning">
                <p class="mb-0">
                    Aucune équipe disponible. 
                    <a href="{{ route('teams.create') }}" class="alert-link">Créer une équipe</a> pour pouvoir créer un match.
                </p>
            </div>
        @else
        
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <form action="{{ route('games.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="home_team_id">Équipe à domicile</label>
                    <select name="home_team_id" id="home_team_id" class="form-control" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="away_team_id">Équipe à l'extérieur</label>
                    <select name="away_team_id" id="away_team_id" class="form-control" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="match_date">Date du match</label>
                    <input type="date" name="match_date" id="match_date" class="form-control" required>
                </div>

                <button type="submit" class="btn-primary mt-3">Créer le match</button>
            </form>
        @endif
    </div>
@endsection