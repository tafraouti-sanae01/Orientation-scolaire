@extends('layouts.app')
@section('title', 'Modifier l\'étudiant')

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
            </ul>
        </div>
        
        <!-- Contenu principal -->
        <div class="col-md-10 px-4 py-4">
            <!-- En-tête -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Modifier l'étudiant</h2>
                    <p class="text-muted mb-0">Modifier les informations de {{ $student->name }} {{ $student->prenom }}</p>
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.students') }}" class="btn btn-outline-secondary">
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
                    <h5 class="fw-bold mb-0">📝 Informations de l'étudiant</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Informations personnelles -->
                            <div class="col-md-6">
                                <h6 class="fw-bold text-primary mb-3">Informations personnelles</h6>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom *</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $student->prenom) }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="age" class="form-label">Âge</label>
                                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $student->age) }}" min="16" max="100">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Genre</label>
                                    <select class="form-select" id="gender" name="gender">
                                        <option value="">Sélectionner</option>
                                        <option value="Homme" {{ old('gender', $student->gender) == 'Homme' ? 'selected' : '' }}>Homme</option>
                                        <option value="Femme" {{ old('gender', $student->gender) == 'Femme' ? 'selected' : '' }}>Femme</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="city" class="form-label">Ville</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $student->city) }}">
                                </div>
                            </div>
                            
                            <!-- Informations académiques -->
                            <div class="col-md-6">
                                <h6 class="fw-bold text-success mb-3">Informations académiques</h6>
                                
                                <div class="mb-3">
                                    <label for="school" class="form-label">École actuelle</label>
                                    <input type="text" class="form-control" id="school" name="school" value="{{ old('school', $student->school) }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="school_type" class="form-label">Type d'école</label>
                                    <select class="form-select" id="school_type" name="school_type">
                                        <option value="">Sélectionner</option>
                                        <option value="Public" {{ old('school_type', $student->school_type) == 'Public' ? 'selected' : '' }}>Public</option>
                                        <option value="Privé" {{ old('school_type', $student->school_type) == 'Privé' ? 'selected' : '' }}>Privé</option>
                                        <option value="Semi-public" {{ old('school_type', $student->school_type) == 'Semi-public' ? 'selected' : '' }}>Semi-public</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="bac_level" class="form-label">Niveau Bac</label>
                                    <select class="form-select" id="bac_level" name="bac_level">
                                        <option value="">Sélectionner</option>
                                        <option value="1ère année" {{ old('bac_level', $student->bac_level) == '1ère année' ? 'selected' : '' }}>1ère année Baccalauréat</option>
                                        <option value="2ème année" {{ old('bac_level', $student->bac_level) == '2ème année' ? 'selected' : '' }}>2ème année Baccalauréat</option>
                                        <option value="bac+1" {{ old('bac_level', $student->bac_level) == 'bac+1' ? 'selected' : '' }}>Bac+1</option>
                                        <option value="bac+2" {{ old('bac_level', $student->bac_level) == 'bac+2' ? 'selected' : '' }}>Bac+2</option>
                                        <option value="bac+3" {{ old('bac_level', $student->bac_level) == 'bac+3' ? 'selected' : '' }}>Bac+3</option>
                                        <option value="autres" {{ old('bac_level', $student->bac_level) == 'autres' ? 'selected' : '' }}>Autres</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="bac_obtenu" class="form-label">Bac obtenu</label>
                                    <select class="form-select" id="bac_obtenu" name="bac_obtenu">
                                        <option value="">Sélectionner</option>
                                        <option value="Oui" {{ old('bac_obtenu', $student->bac_obtenu) == 'Oui' ? 'selected' : '' }}>Oui</option>
                                        <option value="Non" {{ old('bac_obtenu', $student->bac_obtenu) == 'Non' ? 'selected' : '' }}>Non</option>
                                        <option value="En cours" {{ old('bac_obtenu', $student->bac_obtenu) == 'En cours' ? 'selected' : '' }}>En cours</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Statut du profil</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="profile_completed" name="profile_completed" value="1" {{ $student->profile_completed ? 'checked' : '' }}>
                                        <label class="form-check-label" for="profile_completed">
                                            Profil complété
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <!-- Informations système -->
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-info mb-3">Informations système</h6>
                                
                                <div class="mb-3">
                                    <label class="form-label">Date d'inscription</label>
                                    <input type="text" class="form-control" value="{{ $student->created_at->format('d/m/Y H:i') }}" readonly>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Dernière modification</label>
                                    <input type="text" class="form-control" value="{{ $student->updated_at->format('d/m/Y H:i') }}" readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h6 class="fw-bold text-warning mb-3">Actions</h6>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Enregistrer les modifications
                                    </button>
                                    
                                    <a href="{{ route('admin.students') }}" class="btn btn-outline-secondary">
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