<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tawjih')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="shortcut icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .navbar-brand,
        .btn,
        .form-control,
        .form-label,
        .badge,
        .display-1,
        .display-2,
        .display-3,
        .display-4,
        .display-5,
        .display-6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        div,
        a,
        label,
        input,
        textarea,
        select,
        button {
            font-family: 'Times New Roman', Times, serif !important;
        }


    </style>
</head>

<body>
    @auth
        <!-- Header simple pour utilisateurs connectés -->
        <div class="bg-white shadow-sm border-bottom py-3">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Logo -->
                    <a class="d-flex align-items-center text-decoration-none" href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Tawjih Logo" width="40" height="40" class="me-3 rounded">
                        <div>
                            <span class="fw-bold fs-4 text-dark">Tawjih</span>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success text-white" style="font-size: 10px;">ORIENTATION</span>
                            </div>
                        </div>
                    </a>
                    
                    <!-- User info et déconnexion -->
                    <div class="d-flex align-items-center">
                        <div class="me-3 text-end d-none d-md-block">
                            <div class="small fw-medium">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                            <div class="small text-muted">{{ Auth::user()->email }}</div>
                        </div>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Menu de navigation pour les visiteurs -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded-bottom-4 mb-4">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Tawjih Logo" width="45" height="45"
                            class="me-3 rounded">
                        <div class="d-flex flex-column">
                            <span class="fw-bold fs-4 text-dark mb-0">Tawjih</span>
                            <span class="badge bg-success" style="font-size: 10px;">ORIENTATION</span>
                        </div>
                    </div>
                </a>
                <div class="ms-auto">
                    <a href="{{ route('login') }}" class="btn btn-outline-success rounded-pill me-2">Se connecter</a>
                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill">S'inscrire</a>
                </div>
            </div>
        </nav>
    @endauth

    @yield('content')

    <!-- Footer -->
    <!-- Footer -->
    <footer class="bg-light text-black py-5 mt-5">
        <div class="container text-center">
            <!-- Logo et description -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-column align-items-center mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/logo.jpg') }}" alt="Tawjih Logo" width="40" height="40"
                                class="me-3 rounded">
                            <div>
                                <h5 class="fw-bold mb-0">Tawjih</h5>
                                <span class="badge bg-success" style="font-size: 10px;">ORIENTATION</span>
                            </div>
                        </div>
                        <p class="text-muted">
                            La plateforme d'orientation scolaire 100% marocaine. Aide les étudiants à
                            trouver leur voie après le Bac avec des outils personnalisés et une base de données
                            complète.
                        </p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="text-black"><i class="fab fa-facebook-f fs-5"></i></a>
                            <a href="#" class="text-black"><i class="fab fa-twitter fs-5"></i></a>
                            <a href="#" class="text-black"><i class="fab fa-instagram fs-5"></i></a>
                            <a href="#" class="text-black"><i class="fab fa-linkedin-in fs-5"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ligne de séparation -->
            <hr class="my-4 border-secondary">

            <!-- Copyright et message -->
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0 text-center text-md-start">
                    <p class="mb-0 text-muted">© 2025 Tawjih. Tous droits réservés.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 text-muted">
                        <i class="fas fa-heart text-danger me-1"></i>
                        Fait avec amour au Maroc
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    if(session('error'))
        echo '<div class="alert alert-danger">'.session('error').'</div>';
    ?>
</body>

</html>