@extends('layouts.app')
@section('title', 'Modifier l\'école')

@section('content')
<div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
    <div class="row">
        <!-- Menu latéral Admin -->
        <div class="col-md-2 d-none d-md-block bg-dark text-white p-0" style="min-height: 100vh;">
            <div class="p-3 border-bottom">
                <h5 class="text-white mb-0">🔧 Administration</h5>
            </div>
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.students*') ? 'bg-primary' : '' }}" href="{{ route('admin.students') }}">
                        <i class="fas fa-users me-2"></i>Étudiants
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.concours*') ? 'bg-primary' : '' }}" href="{{ route('admin.concours') }}">
                        <i class="fas fa-trophy me-2"></i>Concours
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.ecoles*') ? 'bg-primary' : '' }}" href="{{ route('admin.ecoles') }}">
                        <i class="fas fa-university me-2"></i>Écoles
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.foreign-schools*') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.foreign-schools.index') }}">
                            <i class="fas fa-globe me-2"></i>Écoles Étrangères
                        </a>
                    </li>
            </ul>
        </div>
        
        <!-- Contenu principal -->
        <div class="col-md-10 px-4 py-4">
            <!-- En-tête -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Modifier l'école</h2>
                    <p class="text-muted mb-0">Modifier les informations de {{ $ecole->name }}</p>
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.ecoles') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                    </a>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Formulaire d'édition -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="fw-bold mb-0">🏫 Informations de l'école</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.ecoles.update', $ecole->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Informations de base -->
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary mb-3">Informations de base</h6>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom de l'école *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $ecole->name) }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="category" class="form-label">Catégorie *</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        <option value="ingenieur" {{ old('category', $ecole->category) == 'ingenieur' ? 'selected' : '' }}>Ingénierie</option>
                                        <option value="commerce" {{ old('category', $ecole->category) == 'commerce' ? 'selected' : '' }}>Commerce</option>
                                        <option value="sante" {{ old('category', $ecole->category) == 'sante' ? 'selected' : '' }}>Santé</option>
                                        <option value="architecture" {{ old('category', $ecole->category) == 'architecture' ? 'selected' : '' }}>Architecture</option>
                                        <option value="technique" {{ old('category', $ecole->category) == 'technique' ? 'selected' : '' }}>Technique</option>
                                        <option value="specialise" {{ old('category', $ecole->category) == 'specialise' ? 'selected' : '' }}>Spécialisé</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Description *</label>
                                    <textarea class="form-control" id="desc" name="desc" rows="3" required>{{ old('desc', $ecole->description) }}</textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type d'établissement *</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="">Sélectionner un type</option>
                                        <option value="Public" {{ old('type', $ecole->type) == 'Public' ? 'selected' : '' }}>Public</option>
                                        <option value="Semi-public" {{ old('type', $ecole->type) == 'Semi-public' ? 'selected' : '' }}>Semi-public</option>
                                        <option value="Privé" {{ old('type', $ecole->type) == 'Privé' ? 'selected' : '' }}>Privé</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Informations pratiques -->
                            <div class="col-md-6">
                                <h6 class="fw-bold text-success mb-3">Informations pratiques</h6>
                                
                                <div class="mb-3">
                                    <label for="universite" class="form-label">Université *</label>
                                    <input type="text" class="form-control" id="universite" name="universite" value="{{ old('universite', $ecole->university) }}" required>
                                    <small class="text-muted">Ex: Université Mohammed V, Multiples universités</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="frais" class="form-label">Frais de scolarité *</label>
                                    <select class="form-select" id="frais" name="frais" required>
                                        <option value="">Sélectionner</option>
                                        <option value="Gratuit" {{ old('frais', $ecole->fees) == 'Gratuit' ? 'selected' : '' }}>Gratuit</option>
                                        <option value="Payant" {{ old('frais', $ecole->fees) == 'Payant' ? 'selected' : '' }}>Payant</option>
                                        <option value="Variable" {{ old('frais', $ecole->fees) == 'Variable' ? 'selected' : '' }}>Variable</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="seuils" class="form-label">Seuils d'admission *</label>
                                    <input type="text" class="form-control" id="seuils" name="seuils" value="{{ old('seuils', $ecole->seuils) }}" required>
                                    <small class="text-muted">Ex: SM ≥12, PC ≥14.5, SVT/Tech ≥15</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="logo" class="form-label">Logo de l'école</label>
                                    <input type="text" class="form-control" id="logo" name="logo" value="{{ old('logo', $ecole->logo ?? '') }}">
                                    <small class="text-muted">Nom du fichier image (ex: ensa.png)</small>
                                </div>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <!-- Actions -->
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-info mb-3">Statut</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" value="active" checked>
                                    <label class="form-check-label" for="status">
                                        École active
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h6 class="fw-bold text-warning mb-3">Actions</h6>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Enregistrer les modifications
                                    </button>
                                    
                                    <a href="{{ route('admin.ecoles') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-times me-2"></i>Annuler
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1) !important;
}

.form-label {
    font-weight: 600;
    color: #495057;
}

.card {
    border: none;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}
</style>
@endsection 