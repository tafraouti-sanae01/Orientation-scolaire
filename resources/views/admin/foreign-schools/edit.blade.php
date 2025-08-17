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
                   <a href="{{ route('admin.foreign-schools.index') }}" class="btn btn-outline-secondary">
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
                    <form action="{{ route('admin.foreign-schools.update', $ecole->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Informations générales -->
                                <h5 class="mb-4">📚 Informations générales</h5>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nom de l'école *</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$ecole->name) }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="type" class="form-label">Type d'école *</label>
                                        <select class="form-select" id="type" name="type" required>
                                            <option value="">Sélectionner...</option>
                                            <option value="ingenieur" {{ old('category') == 'ingenieur' ? 'selected' : '' }}>
                                                Ingénierie</option>
                                            <option value="commerce" {{ old('category') == 'commerce' ? 'selected' : '' }}>
                                                Commerce</option>
                                            <option value="sante" {{ old('category') == 'sante' ? 'selected' : '' }}>Santé
                                            </option>
                                            <option value="architecture" {{ old('category') == 'architecture' ? 'selected' : '' }}>Architecture</option>
                                            <option value="technique" {{ old('category') == 'technique' ? 'selected' : '' }}>
                                                Technique</option>
                                            <option value="specialise" {{ old('category') == 'specialise' ? 'selected' : '' }}>Spécialisé</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Localisation -->
                                <h5 class="mb-4">📍 Localisation</h5>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <label for="country" class="form-label">Pays *</label>
                                        <input type="text" class="form-control" id="country" name="country" value="{{ old('country',$ecole->country) }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city" class="form-label">Ville *</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city',$ecole->city) }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="address" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address',$ecole->address) }}">
                                    </div>
                                </div>

                                <!-- Frais et admissions -->
                                <h5 class="mb-4">💰 Frais et admissions</h5>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-3">
                                        <label for="is_free" class="form-label">École gratuite ?</label>
                                        <select class="form-select" id="is_free" name="is_free">
                                            <option value="1">Oui</option>
                                            <option value="0">Non</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="admission_requirements" class="form-label">Conditions
                                            d'admission</label>
                                        <input type="text" class="form-control" id="admission_requirements"
                                            name="admission_requirements" value="{{ old('admission_requirements',$ecole->admission_requirements) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="language_requirements" class="form-label">Niveau de langue
                                            requis</label>
                                        <input type="text" class="form-control" id="language_requirements"
                                            name="language_requirements" value="{{ old('language_requirements',$ecole->language_requirements) }}">
                                    </div>
                                </div>

                                <!-- Contact -->
                                <h5 class="mb-4">📧 Contact</h5>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email',$ecole->email) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone" class="form-label">Téléphone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',$ecole->phone) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="website" class="form-label">Site web</label>
                                        <input type="url" class="form-control" id="website" name="website" value="{{ old('website',$ecole->website) }}">
                                    </div>
                                </div>

                                <!-- Description et médias -->
                                <h5 class="mb-4">📝 Description et médias</h5>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description détaillée *</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image" class="form-label">Logo de l'école</label>
                                        <input type="file" class="form-control" id="image" name="image" >
                                    </div>
                                    
                                </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <!-- Actions -->
                        <div class="row">
                            
                            <div class="col-md-6">
                                <h6 class="fw-bold text-warning mb-3">Actions</h6>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Enregistrer les modifications
                                    </button>
                                    
                                    <a href="{{ route('admin.foreign-schools.index') }}" class="btn btn-outline-secondary">
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