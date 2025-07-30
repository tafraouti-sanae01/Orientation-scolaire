@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="container py-5">
    <div class="row align-items-center flex-column-reverse flex-md-row">
        <!-- Left: Texts -->
        <div class="col-md-6 text-center text-md-start">
        image.png            <h2 class="text-primary fw-semibold mb-2">L’orientation scolaire 100% marocaine</h2>
            <h1 class="display-5 fw-bold text-success mb-2">Trouve ta voie après le Bac !</h1>
            <h2 class="h3 fw-bold mb-3">Découvre <span class="text-primary">les filières</span> et <span class="text-info">les écoles</span> qui te correspondent</h2>
            <p class="lead mb-4">
                Évite les erreurs d’orientation : notre plateforme t’aide à choisir la filière et le parcours qui correspondent à tes ambitions, tes résultats et tes centres d’intérêt. <br>
                <span class="fw-bold text-success">Gratuit, rapide et personnalisé !</span>
            </p>
            <a href="#" class="btn btn-gradient-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-sm mb-4" style="background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%); color: #fff; border: none;">
                Je commence mon orientation
            </a>
                </div>
        <!-- Right: Image -->
        <div class="col-md-6 mb-4 mb-md-0 d-flex justify-content-center">
            <div class="position-relative">
                <img src="{{ asset('images/image1.png') }}" alt="Lycéen pensif" class="img-fluid rounded-4 hero-img border border-4 border-white">
                <span class="position-absolute top-0 end-0 translate-middle p-2 bg-success bg-opacity-10 rounded-circle" style="width: 80px; height: 80px;"></span>
                </div>
        </div>
    </div>
</div>
@endsection
