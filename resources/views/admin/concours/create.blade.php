@extends('layouts.app')
@section('title', 'Ajouter un concours')

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
                    <h2 class="fw-bold text-dark mb-1">Ajouter un concours</h2>
                    <p class="text-muted mb-0">Créer un nouveau concours pour les étudiants</p>
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.concours') }}" class="btn btn-outline-secondary">
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

            <!-- Formulaire d'ajout -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="fw-bold mb-0">🏆 Informations du concours</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.concours.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <!-- Informations de base -->
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary mb-3">Informations de base</h6>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom du concours *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="category" class="form-label">Catégorie *</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        <option value="ingenieur" {{ old('category') == 'ingenieur' ? 'selected' : '' }}>Ingénierie</option>
                                        <option value="commerce" {{ old('category') == 'commerce' ? 'selected' : '' }}>Commerce</option>
                                        <option value="sante" {{ old('category') == 'sante' ? 'selected' : '' }}>Santé</option>
                                        <option value="education" {{ old('category') == 'education' ? 'selected' : '' }}>Éducation</option>
                                        <option value="formation" {{ old('category') == 'formation' ? 'selected' : '' }}>Formation Professionnelle</option>
                                        <option value="specialise" {{ old('category') == 'specialise' ? 'selected' : '' }}>Instituts Spécialisés</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="filieres" class="form-label">Filières *</label>
                                    <input type="text" class="form-control" id="filieres" name="filieres" value="{{ old('filieres') }}" required>
                                    <small class="text-muted">Ex: EMI, ENSIAS, ENSEM, IAV, INPT, INSEA, ENSA...</small>
                                </div>
                            </div>
                            
                            <!-- Informations pratiques -->
                            <div class="col-md-6">
                                <h6 class="fw-bold text-success mb-3">Informations pratiques</h6>
                                
                                <div class="mb-3">
                                    <label for="inscription" class="form-label">Période d'inscription *</label>
                                    <input type="text" class="form-control" id="inscription" name="inscription" value="{{ old('inscription') }}" required>
                                    <small class="text-muted">Ex: 20 juin - 10 juillet 2025</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="epreuve" class="form-label">Date des épreuves *</label>
                                    <input type="text" class="form-control" id="epreuve" name="epreuve" value="{{ old('epreuve') }}" required>
                                    <small class="text-muted">Ex: Mai 2025 ou 21 juillet 2025</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="places" class="form-label">Nombre de places *</label>
                                    <input type="text" class="form-control" id="places" name="places" value="{{ old('places') }}" required>
                                    <small class="text-muted">Ex: 185 MP, 44 TSI, 37 PSI (ENSIAS)</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="conditions" class="form-label">Conditions d'accès *</label>
                                    <textarea class="form-control" id="conditions" name="conditions" rows="2" required>{{ old('conditions') }}</textarea>
                                    <small class="text-muted">Ex: Classes préparatoires MP, TSI, PSI</small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="site" class="form-label">Site web *</label>
                                    <input type="text" class="form-control" id="site" name="site" value="{{ old('site') }}" required>
                                    <small class="text-muted">Ex: amci.ma, cursussup.gov.ma</small>
                                </div>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <!-- Actions -->
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="fw-bold text-warning mb-3">Actions</h6>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus me-2"></i>Ajouter le concours
                                    </button>
                                    
                                    <a href="{{ route('admin.concours') }}" class="btn btn-outline-secondary">
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