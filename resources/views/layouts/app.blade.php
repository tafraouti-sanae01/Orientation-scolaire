<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'E-Tawjihi')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', Arial, sans-serif; }
    </style>
</head>
<body>
    <!-- Menu de navigation commun -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded-bottom-4 mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="https://img.icons8.com/ios-filled/50/4ecca3/graduation-cap.png" alt="Logo" width="40" height="40" class="me-2">
                <span class="fw-bold fs-4 text-dark">E-Tawjihi</span>
                <span class="badge bg-success ms-2">ORIENTATION IA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active text-success' : '' }}" href="{{ url('/') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('ecoles') ? 'active text-success' : '' }}" href="{{ route('ecoles') }}">Les écoles supérieures</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('concours') ? 'active text-success' : '' }}" href="{{ route('concours') }}">Liste des concours</a></li>
                </ul>
                <div class="ms-lg-4 mt-3 mt-lg-0">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-success rounded-pill me-2">Se connecter</a>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill">S'inscrire</a>
                    @endguest
                    @auth
                        <span class="ms-3">Bonjour, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link text-danger">Déconnexion</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
