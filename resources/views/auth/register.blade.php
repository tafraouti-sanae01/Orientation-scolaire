@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<style>
    body {
        background: radial-gradient(circle at 20% 20%, #b2fefa 0%, #e0c3fc 100%);
        min-height: 100vh;
    }
    .register-bg {
        background: linear-gradient(135deg, #6a82fb 0%, #fc5c7d 100%);
        color: #fff;
        border-top-left-radius: 1rem;
        border-bottom-left-radius: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .register-quote {
        font-size: 1.1rem;
        font-style: italic;
        margin-top: 2rem;
    }
    .register-card {
        max-width: 900px;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(44,62,80,0.15);
        margin: 3rem auto;
    }
</style>
<div class="container">
    <div class="register-card row mx-auto bg-white">
        <!-- Left: Illustration & citation -->
        <div class="col-md-6 register-bg p-5 d-none d-md-flex flex-column align-items-center justify-content-center">
            <div class="register-quote">
                <span class="fs-5">" La réussite dépend d'une bonne orientation ! "</span>
            </div>
            <img src="{{ asset('images/books-illustration.png') }}" alt="Illustration" class="mt-4" style="max-width: 220px;">
        </div>
        <!-- Right: Formulaire -->
        <div class="col-md-6 p-5">
            <h4 class="mb-2 text-primary fw-bold">Marhba bik !</h4>
            <p class="mb-4 text-muted">Créez votre compte dès maintenant !</p>
    <form method="POST" action="{{ route('register') }}">
        @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom complet *</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autofocus placeholder="Votre nom complet">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
        </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail *</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required placeholder="exemple@email.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
        </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe *</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required placeholder="Votre mot de passe">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text text-danger small">
                        Le mot de passe doit comporter au moins 8 caractères !
                    </div>
        </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmez le mot de passe *</label>
                    <input id="password_confirmation" type="password" class="form-control"
                           name="password_confirmation" required placeholder="Votre mot de passe">
        </div>

                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">S'inscrire</button>
            </form>
            <div class="mt-3 text-center small">
                En t'inscrivant, tu acceptes <a href="#" class="text-primary">Les conditions générales d'utilisation</a>.
            </div>
            <div class="mt-3 text-center">
                Vous avez un compte ? <a href="{{ route('login') }}" class="text-primary fw-bold">Se connecter</a>
            </div>
        </div>
    </div>
</div>
@endsection
