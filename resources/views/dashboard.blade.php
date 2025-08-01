@extends('layouts.app')
@section('title', 'Mon espace étudiant')

@section('content')
<div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
    <div class="row">
        <!-- Menu latéral -->
        <div class="col-md-2 d-none d-md-block bg-white shadow-sm p-0" style="min-height: 100vh;">
            
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active text-primary' : '' }}" href="{{ route('dashboard') }}">Mon Plan Tawjih</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.ecoles') ? 'active text-primary' : '' }}" href="{{ route('student.ecoles') }}">Ecoles et universités</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.concours') ? 'active text-primary' : '' }}" href="{{ route('student.concours') }}">Concours</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.profil') ? 'active text-primary' : '' }}" href="{{ route('student.profil') }}">Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.parametres') ? 'active text-primary' : '' }}" href="{{ route('student.parametres') }}">Paramètres</a></li>
            </ul>
        </div>
        <!-- Contenu principal -->
        <div class="col-md-10 px-4 py-4">
            <!-- En-tête avec salutation -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-primary mb-1">Bonjour, {{ Auth::user()->name ?? 'Étudiant' }} ! 👋</h2>
                    <p class="text-muted mb-0">Bienvenue dans votre espace d'orientation personnalisé</p>
                </div>
                <div class="text-end">
                    <div class="badge bg-success p-2">Profil complété</div>
                    <p class="text-muted small mb-0 mt-1">Dernière connexion: {{ now()->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
.bg-gradient-success {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
.bg-gradient-info {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
.bg-gradient-warning {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
}
</style>
@endsection
