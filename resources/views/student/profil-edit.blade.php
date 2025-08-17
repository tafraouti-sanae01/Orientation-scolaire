@extends('layouts.app')
@section('title', 'Modifier le Profil')

@section('content')
    <div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
        <div class="row">
            <!-- Menu latéral -->
            <div class="col-md-2 d-none d-md-block bg-white shadow-sm p-0" style="min-height: 100vh;">
                <ul class="nav flex-column mt-4">
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active text-primary' : '' }}"
                            href="{{ route('dashboard') }}">Accueil</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('student.ecoles') ? 'active text-primary' : '' }}"
                            href="{{ route('student.ecoles') }}">Ecoles et universités</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.ForeignSchool') ? 'active text-primary' : '' }}" href="{{ route('student.ForeignSchool') }}">Écoles Étrangères</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('student.concours') ? 'active text-primary' : '' }}"
                            href="{{ route('student.concours') }}">Concours</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('student.profil') ? 'active text-primary' : '' }}"
                            href="{{ route('student.profil') }}">Mon Profil</a></li>
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('student.parametres') ? 'active text-primary' : '' }}"
                            href="{{ route('student.parametres') }}">Paramètres</a></li>
                </ul>
            </div>
            <!-- Contenu principal -->
            <div class="col-md-10 px-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">MODIFIER MON PROFIL</h4>
                    <div>
                        <a href="{{ route('student.profil') }}" class="btn btn-outline-secondary">Retour au profil</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('student.profil.update') }}">
                            @csrf
                            @method('PUT')
                            
                            <!-- Informations personnelles -->
                            <div class="card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="fw-bold mb-0">Informations personnelles</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nom *</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                                   value="{{ old('name', Auth::user()->name) }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Prénom *</label>
                                            <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" 
                                                   value="{{ old('prenom', Auth::user()->prenom) }}" required>
                                            @error('prenom')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email *</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                                   value="{{ old('email', Auth::user()->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Âge</label>
                                            <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" 
                                                   value="{{ old('age', Auth::user()->age) }}" min="15" max="100">
                                            @error('age')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Ville</label>
                                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" 
                                                   value="{{ old('city', Auth::user()->city) }}">
                                            @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Genre</label>
                                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">Sélectionner</option>
                                                <option value="Homme" {{ old('gender', Auth::user()->gender) == 'Homme' ? 'selected' : '' }}>Homme</option>
                                                <option value="Femme" {{ old('gender', Auth::user()->gender) == 'Femme' ? 'selected' : '' }}>Femme</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Informations académiques -->
                            <div class="card mb-4">
                                <div class="card-header bg-white">
                                    <h5 class="fw-bold mb-0">Informations académiques</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">École</label>
                                            <input type="text" name="school" class="form-control @error('school') is-invalid @enderror" 
                                                   value="{{ old('school', Auth::user()->school) }}">
                                            @error('school')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Type d'école</label>
                                            <input type="text" name="school_type" class="form-control @error('school_type') is-invalid @enderror" 
                                                   value="{{ old('school_type', Auth::user()->school_type) }}">
                                            @error('school_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Niveau Bac</label>
                                            <select class="form-select @error('bac_level') is-invalid @enderror" name="bac_level">
                                                <option value="">Sélectionner un niveau</option>
                                                <option value="1ère année" {{ old('bac_level', Auth::user()->bac_level) == '1ère année' ? 'selected' : '' }}>1ère année Baccalauréat</option>
                                                <option value="2ème année" {{ old('bac_level', Auth::user()->bac_level) == '2ème année' ? 'selected' : '' }}>2ème année Baccalauréat</option>
                                                <option value="bac+1" {{ old('bac_level', Auth::user()->bac_level) == 'bac+1' ? 'selected' : '' }}>Bac+1</option>
                                                <option value="bac+2" {{ old('bac_level', Auth::user()->bac_level) == 'bac+2' ? 'selected' : '' }}>Bac+2</option>
                                                <option value="bac+3" {{ old('bac_level', Auth::user()->bac_level) == 'bac+3' ? 'selected' : '' }}>Bac+3</option>
                                                <option value="autres" {{ old('bac_level', Auth::user()->bac_level) == 'autres' ? 'selected' : '' }}>Autres</option>
                                            </select>
                                            @error('bac_level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Bac obtenu</label>
                                            <input type="text" name="bac_obtenu" class="form-control @error('bac_obtenu') is-invalid @enderror" 
                                                   value="{{ old('bac_obtenu', Auth::user()->bac_obtenu) }}">
                                            @error('bac_obtenu')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('student.profil') }}" class="btn btn-outline-secondary">Annuler</a>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 