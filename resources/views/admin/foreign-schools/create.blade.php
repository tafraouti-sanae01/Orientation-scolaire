@extends('layouts.app')
@section('title', 'Ajouter une École Étrangère')

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
                        <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.students*') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.students') }}">
                            <i class="fas fa-users me-2"></i>Étudiants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.concours*') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.concours') }}">
                            <i class="fas fa-trophy me-2"></i>Concours
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.ecoles*') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.ecoles') }}">
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
            <div class="col-md-10 col-12 p-4">

                <div class="col-12 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="fw-bold text-dark mb-1">Ajouter une École Étrangère</h2>
                            <p class="text-muted mb-0">Remplissez les informations de la nouvelle école</p>
                        </div>
                        <div>
                            <a href="{{ route('admin.foreign-schools.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                            </a>
                        </div>
                    </div>

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('admin.foreign-schools.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Informations générales -->
                                <h5 class="mb-4">📚 Informations générales</h5>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nom de l'école *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
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
                                        <input type="text" class="form-control" id="country" name="country" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city" class="form-label">Ville *</label>
                                        <input type="text" class="form-control" id="city" name="city" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="address" class="form-label">Adresse</label>
                                        <input type="text" class="form-control" id="address" name="address">
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
                                            name="admission_requirements">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="language_requirements" class="form-label">Niveau de langue
                                            requis</label>
                                        <input type="text" class="form-control" id="language_requirements"
                                            name="language_requirements">
                                    </div>
                                </div>

                                <!-- Contact -->
                                <h5 class="mb-4">📧 Contact</h5>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone" class="form-label">Téléphone</label>
                                        <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="website" class="form-label">Site web</label>
                                        <input type="url" class="form-control" id="website" name="website">
                                    </div>
                                </div>

                                <!-- Description et médias -->
                                <h5 class="mb-4">📝 Description et médias</h5>
                                <div class="row g-3 mb-4">
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description détaillée *</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"
                                            required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image" class="form-label">Logo de l'école</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Enregistrer
                                    </button>
                                    <a href="{{ route('admin.foreign-schools.index') }}"
                                        class="btn btn-secondary">Annuler</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .card {
                border-radius: 12px;
            }

            .form-control,
            .form-select {
                border-radius: 8px;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Gestion de l'affichage des frais
                const isFreeSelect = document.getElementById('is_free');
                const feesContainer = document.getElementById('fees-container');
                const annualFeesInput = document.getElementById('annual_fees');

                function toggleFeesVisibility() {
                    if (isFreeSelect.value === '1') {
                        feesContainer.style.display = 'none';
                        annualFeesInput.removeAttribute('required');
                    } else {
                        feesContainer.style.display = 'block';
                        annualFeesInput.setAttribute('required', 'required');
                    }
                }

                isFreeSelect.addEventListener('change', toggleFeesVisibility);
                toggleFeesVisibility(); // Initial check
            });
        </script>
@endsection