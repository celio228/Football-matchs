@extends('layout.base')

@section('title', 'Se connecter')

@section('content')
<style>
    /* Styles pour centrer le formulaire */
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
        width: 100%;
        background-color: #f4f7f9;
        font-family: Arial, sans-serif;
    }

    /* Styles pour le conteneur du formulaire */
    .login-box {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 400px;
    }

    /* Styles pour le titre et le paragraphe */
    .login-box h1 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .login-box p {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 30px;
    }

    /* Styles pour les champs de formulaire */
    .form-group {
        text-align: left;
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #495057;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #007bff;
    }

    /* Styles pour le lien "Mot de passe oublié ?" */
    .forgot-password {
        display: block;
        text-align: right;
        margin-top: -10px;
        margin-bottom: 20px;
        color: #007bff;
        text-decoration: none;
        font-size: 0.9rem;
    }

    /* Styles pour le bouton de connexion */
    .login-btn {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .login-btn:hover {
        background-color: #0056b3;
    }
</style>

<div class="login-container">
    <div class="login-box">
        <h1>Se connecter</h1>
        <p>Remplir vos paramètres de connexion pour vous connecter à votre compte administrateur.</p>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Saisir l'adresse e-mail ici ..." required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Saisir le mot de passe ici ..." required>
            </div>
            <a href="#" class="forgot-password">Mot de passe oublié ?</a>
            <button type="submit" class="login-btn">Se connecter</button>
        </form>
    </div>
</div>
@endsection
