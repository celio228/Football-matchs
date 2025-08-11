<div>
    <h1>Créer une nouvelle équipe</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Nom de l'équipe :</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="creation_year">Année de création :</label>
            <input type="number" id="creation_year" name="creation_year" required>
        </div>

        <div>
            <label for="player_count">Nombre de joueurs :</label>
            <input type="number" id="player_count" name="player_count" required>
        </div>
        <div>
            <label for="description">Description de l'équipe :</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>

        <div>
            <label for="logo">Logo de l'équipe :</label>
            <input type="file" id="logo" name="logo" accept="image/*" required>
        </div>

        <button type="submit">Créer l'équipe</button>
    </form>
        <a href="{{ route('teams.index') }}">Retour à la liste des équipes</a>
</div>
