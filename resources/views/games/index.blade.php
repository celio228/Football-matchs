@extends('layout.base')

@section('title', 'Liste des matchs')

@section('content')
<style>
    /* Styles généraux */
    body {
        font-family: sans-serif;
        background-color: #f4f7f9;
        margin: 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

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


    /* Styles pour la grille de matchs */
    .games-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        justify-content: center;
    }

    .game-card {
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

    .game-card:hover {
        transform: translateY(-5px);
    }

    .teams-vs {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        margin-bottom: 15px;
    }

    .team-logo {
        width: 60px;
        height: 60px;
        object-fit: contain;
    }

    .team-name {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
        margin: 0 10px;
        text-align: center;
        flex-grow: 1;
    }

    .score {
        font-size: 1.5rem;
        font-weight: bold;
        color: #1a1a1a;
        margin: 0 10px;
    }

    .match-date {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 10px;
    }

    .game-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .game-actions a,
    .game-actions button {
        text-decoration: none;
        color: #fff;
        padding: 8px 12px;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.2s;
        border: none;
        cursor: pointer;
    }

    .edit-button {
        background-color: #007bff;
    }

    .edit-button:hover {
        background-color: #0056b3;
    }

    .delete-button {
        background-color: #dc3545;
    }

    .delete-button:hover {
        background-color: #c82333;
    }
    
    .no-games-message {
        text-align: center;
        color: #888;
        font-style: italic;
    }
</style>

<div class="container">
    <div class="header">
        <h1>Parcourir tous les matchs prévus</h1>
        <p>Parcourez la liste de tous les matchs prévus du championnat de<br>Le nom d'un championnat fictif</p>
    </div>

    @if ($games->isEmpty())
        <p class="no-games-message">Aucun match trouvé.</p>
    @else
    <div class="games-grid" id="games-grid">
        @foreach ($games as $game)
            <a href="{{ route('games.show', $game) }}">
                <div class="game-card">
                    <div class="teams-vs">
                        <!-- Logo de l'équipe à domicile -->
                        <img src="{{ asset('storage/' . $game->homeTeam->logo) }}" alt="Logo de l'équipe à domicile" class="team-logo">
                        <span class="team-name">{{ $game->homeTeam->name }}</span>
                        
                        <span class="score">0-0</span>

                        <!-- Logo de l'équipe à l'extérieur -->
                        <span class="team-name">{{ $game->awayTeam->name }}</span>
                        <img src="{{ asset('storage/' . $game->awayTeam->logo) }}" alt="Logo de l'équipe à l'extérieur" class="team-logo">
                    </div>
                    
                    <div class="match-date">
                        Date du match: {{ $game->match_date }}
                    </div>
                    
                    {{-- <div class="game-actions">
                        <a href="{{ route('games.edit', $game) }}" class="edit-button">✏️ Modifier</a>
                        <form action="{{ route('games.destroy', $game) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('Confirmer la suppression ?')">🗑️ Supprimer</button>
                        </form>
                    </div> --}}
                </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
<a href="{{ route('games.create') }}" class="btn btn-primary">Créer un match</a>


<script>
    const gamesGrid = document.getElementById('games-grid');
    gamesGrid.addEventListener('click', (event) => {
        const target = event.target;
        if (target.classList.contains('edit-button')) {
            // Logique pour modifier le match
        } else if (target.classList.contains('delete-button')) {
            // Logique pour supprimer le match
        }
    });
</script>
@endsection
