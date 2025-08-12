<div>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container-form {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        /* Styles pour les messages de succès */
        .alert.alert-success {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        /* Styles pour les champs de formulaire */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .team-form input[type="text"],
        .team-form input[type="number"],
        .team-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .team-form textarea {
            resize: vertical;
        }

        /* Styles pour le bouton de soumission */
        .btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }

        /* Styles pour le lien de retour */
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4a5568;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #1a202c;
            text-decoration: underline;
        }
    </style>

    <div class="container-form">
        <h1>Créer une nouvelle équipe</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data" class="team-form">
            @csrf

            <div class="form-group">
                <label for="name">Nom de l'équipe :</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="creation_year">Année de création :</label>
                <input type="number" id="creation_year" name="creation_year" required>
            </div>

            <div class="form-group">
                <label for="player_count">Nombre de joueurs :</label>
                <input type="number" id="player_count" name="player_count" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description de l'équipe :</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="logo">Logo de l'équipe :</label>
                <input type="file" id="logo" name="logo" accept="image/*" required>
            </div>

            <button type="submit" class="btn-primary">Créer l'équipe</button>
        </form>
    
        <a href="{{ route('teams.index') }}" class="back-link">Retour à la liste des équipes</a>
    </div>
</div>