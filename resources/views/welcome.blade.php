@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<!-- Hero Section -->
<div class="hero-section bg-gradient-primary text-white py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">
        <!-- Left: Texts -->
        <div class="col-md-6 text-center text-md-start">
                <div class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill">
                    <i class="fas fa-star me-2"></i>Plateforme #1 d'orientation au Maroc
                </div>
                <h2 class="text-warning fw-semibold mb-2">L'orientation scolaire 100% marocaine</h2>
                <h1 class="display-4 fw-bold mb-3">Trouve ta voie après le Bac !</h1>
                <h2 class="h4 fw-bold mb-4">Découvre <span class="text-warning">les filières</span> et <span class="text-info">les écoles</span> qui te correspondent</h2>
            <p class="lead mb-4">
                    Évite les erreurs d'orientation : notre plateforme t'aide à choisir la filière et le parcours qui correspondent à tes ambitions, tes résultats et tes centres d'intérêt. <br>
                    <span class="fw-bold text-warning">Gratuit, rapide et personnalisé !</span>
                </p>
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-md-start">
                    <a href="{{ route('register') }}" class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg">
                        <i class="fas fa-rocket me-2"></i>Je commence mon orientation
                    </a>
                    <a href="#how-it-works" class="btn btn-outline-light btn-lg rounded-pill px-4 py-3 fw-bold">
                        <i class="fas fa-play me-2"></i>Comment ça marche ?
            </a>
                </div>
                </div>
        <!-- Right: Image -->
        <div class="col-md-6 mb-4 mb-md-0 d-flex justify-content-center">
            <div class="position-relative">
                    <img src="{{ asset('images/image1.png') }}" alt="Lycéen pensif" class="img-fluid rounded-4 hero-img border border-4 border-white shadow-lg">
                    <div class="position-absolute top-0 end-0 translate-middle">
                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <i class="fas fa-graduation-cap text-success fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
<div class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="card border-0 bg-white shadow-sm h-100">
                    <div class="card-body">
                        <div class="display-6 text-primary fw-bold mb-2">50K+</div>
                        <p class="text-muted mb-0">Étudiants orientés</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card border-0 bg-white shadow-sm h-100">
                    <div class="card-body">
                        <div class="display-6 text-success fw-bold mb-2">200+</div>
                        <p class="text-muted mb-0">Écoles partenaires</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card border-0 bg-white shadow-sm h-100">
                    <div class="card-body">
                        <div class="display-6 text-info fw-bold mb-2">95%</div>
                        <p class="text-muted mb-0">Taux de satisfaction</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card border-0 bg-white shadow-sm h-100">
                    <div class="card-body">
                        <div class="display-6 text-warning fw-bold mb-2">24h</div>
                        <p class="text-muted mb-0">Réponse garantie</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- How it works Section -->
<div id="how-it-works" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Comment ça marche ?</h2>
            <p class="lead text-muted">3 étapes simples pour trouver ta voie</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-user-plus text-primary fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-3">1. Crée ton profil</h4>
                        <p class="text-muted">Inscris-toi gratuitement et complète ton profil avec tes centres d'intérêt et tes résultats scolaires.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-search text-success fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-3">2. Découvre tes options</h4>
                        <p class="text-muted">Notre système analyse ton profil et te propose les filières et écoles les plus adaptées.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-check-circle text-warning fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-3">3. Fais ton choix</h4>
                        <p class="text-muted">Compare les options, consulte les détails et prends une décision éclairée pour ton avenir.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Pourquoi choisir notre plateforme ?</h2>
            <p class="lead text-muted">Des outils puissants pour une orientation réussie</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-cogs text-primary fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Système personnalisé</h5>
                        <p class="text-muted">Notre système analyse ton profil pour te proposer les meilleures options d'orientation.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-database text-success fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Base de données complète</h5>
                        <p class="text-muted">Accès à plus de 200 écoles et 500+ filières avec des informations détaillées et actualisées.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-users text-info fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Communauté active</h5>
                        <p class="text-muted">Échange avec d'autres étudiants, pose tes questions et partage tes expériences.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="fas fa-mobile-alt text-warning fs-4"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">100% gratuit</h5>
                        <p class="text-muted">Accès complet à toutes les fonctionnalités sans aucun coût. Ton orientation réussie est notre priorité.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">Ils ont trouvé leur voie</h2>
            <p class="lead text-muted">Découvre les témoignages de nos étudiants</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Amina B.</h6>
                                <small class="text-muted">École de Commerce</small>
                            </div>
                        </div>
                        <p class="text-muted">"Grâce à cette plateforme, j'ai découvert ma passion pour le commerce. Je suis maintenant étudiante dans une excellente école !"</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-success"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Youssef M.</h6>
                                <small class="text-muted">Ingénierie Informatique</small>
                            </div>
                        </div>
                        <p class="text-muted">"Le système a parfaitement identifié mes compétences en maths. Je suis ravi de mon choix d'orientation !"</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-info"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Fatima L.</h6>
                                <small class="text-muted">Médecine</small>
                            </div>
                        </div>
                        <p class="text-muted">"La plateforme m'a aidée à comprendre les prérequis pour la médecine. Un outil indispensable !"</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-5 bg-gradient-primary text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-3">Prêt à découvrir ton avenir ?</h2>
        <p class="lead mb-4">Rejoins plus de 50 000 étudiants qui ont déjà trouvé leur voie grâce à notre plateforme</p>
        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
            <a href="{{ route('register') }}" class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg">
                <i class="fas fa-rocket me-2"></i>Commencer maintenant
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg rounded-pill px-4 py-3 fw-bold">
                <i class="fas fa-sign-in-alt me-2"></i>Se connecter
            </a>
        </div>
        <p class="mt-3 mb-0">
            <small class="text-light opacity-75">
                <i class="fas fa-shield-alt me-1"></i>100% gratuit • 
                <i class="fas fa-clock me-1"></i>Inscription en 2 minutes • 
                <i class="fas fa-lock me-1"></i>Données sécurisées
            </small>
        </p>
    </div>
</div>
@endsection
