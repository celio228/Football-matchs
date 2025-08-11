<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'Mon Application')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Styles généraux pour le corps et la mise en page */
        body {
            font-family: sans-serif;
            background-color: #ffffff;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Styles pour la barre de navigation */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 170px;
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); */
        }

        .navbar .nav-left {
            display: flex;
            align-items: center;
        }

        .navbar .logo {
            height: 40px;
            margin-right: 20px;
        }

        .navbar .nav-right ul {
            display: flex;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navbar .nav-right li {
            margin-left: 20px;
        }

        .navbar .nav-link {
            color: #007bff;
            background-color: #ffffff;
        }




        .navbar a {
            text-decoration: none;
            color: #FFF;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #007bff;
            background-color: #ffffff
        }

        /* Style spécifique pour le bouton de connexion */
        .login-button {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-align: center;
            white-space: nowrap;
        }

        .login-button:hover {
            background-color: #1a4f89;
        }

        /* Styles pour le pied de page */
        footer {
            margin-top: auto;
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-top: 1px solid #e0e0e0;
            color: #666;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.05);
        }

        /* Styles pour le titre et la grille d'équipes */
        .header {
            text-align: center;
            margin-bottom: 10px;
            line-height: 1;
            
        }

        .header h1 {
            font-size: 6rem;
            font-weight: 900;
            color: #1a1a1a;
            word-spacing: -10px;

            
        }

        .header p {
            color: #1a1a1a;
            font-size: 1.5rem;
            font-weight: bold;
            word-spacing: -1px
        }

        /* Styles pour la grille d'équipes */
        .teams-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            justify-content: center;
        }

        .team-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.2s;
        }

        .team-card:hover {
            transform: translateY(-5px);
        }

        .team-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .team-name {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .team-details {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 10px;
        }

        .team-details p {
            margin: 0;
        }

        .details-button {
            background-color: #007bff;
            color: #fff;
            border: 2px solid #007bff;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s, color 0.2s;
        }

        .details-button:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Styles pour le bouton de création d'équipe */
        .btn-primary {
            display: block;
            width: fit-content;
            margin: 20px auto;
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-left">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('/images/logos/logo.png') }}" alt="Logo" class="logo">
                </a>
            </div>
            <div class="nav-right">
                <ul>
                    <li><a href="{{ route('games.index') }}" class="nav-link">Liste des matchs</a></li>
                    <li><a href="{{ route('teams.index') }}" class="nav-link">Liste des équipes</a></li>
                    <li><a href="{{ route('login') }}" class="login-button">Se connecter</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Mon Application. Tous droits réservés.</p>
    </footer>
</body>
</html>
