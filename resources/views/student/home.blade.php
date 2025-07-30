@extends('layouts.app')
@section('title', 'Mon espace étudiant')

@section('content')
<div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
    <div class="row">
        <!-- Menu latéral -->
        <div class="col-md-2 d-none d-md-block bg-white shadow-sm p-0" style="min-height: 100vh;">
            <div class="p-4 border-bottom">
                <img src="{{ asset('images/logo.png') }}" alt="E-Tawjihi" style="max-width: 120px;">
                <div class="fw-bold mt-2">E-Tawjihi<br><span class="text-secondary small">ORIENTATION IA</span></div>
            </div>
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link" href="#">Mon Plan E-Tawjihi</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Mes Résultats</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Secteurs de métiers</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Filières</a></li>
                <li class="nav-item"><a class="nav-link active text-primary" href="#">Ecoles et universités</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Concours</a></li>
                <!-- ... autres liens ... -->
            </ul>
        </div>
        <!-- Contenu principal -->
        <div class="col-md-10 px-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold">ECOLES SUPÉRIEURES</h4>
                <div>
                    <input type="text" class="form-control" placeholder="Afficher les filtres d'écoles" style="width: 300px;">
                </div>
            </div>
            <div class="mb-3 text-muted">Résultats: <span class="fw-bold">332</span></div>
            <!-- Grille des écoles -->
            <div class="row g-4">
                @foreach([
                    [
                        'logo' => asset('images/supemir.png'),
                        'sponsor' => true,
                        'name' => "(SUPEMIR) Ecole Supérieure des Multimédia, Informatique et Réseaux",
                        'desc' => "SUP’EMIR est un établissement reconnu pour son engagement envers l’excellence académique et l’employabilité de ses diplômés...",
                        'type' => "Privé",
                        'universite' => "Pas d'Université",
                        'frais' => "38000 - 42000 Dhs/an"
                    ],
                    [
                        'logo' => asset('images/esmc.png'),
                        'sponsor' => true,
                        'name' => "(ESMC) Ecole Supérieure de Management et de Communication",
                        'desc' => "L'ESMC Business School se distingue comme une institution avant-gardiste...",
                        'type' => "Privé",
                        'universite' => "Sans Université",
                        'frais' => "30000 - 33000 Dhs/an"
                    ],
                    [
                        'logo' => asset('images/esca.png'),
                        'sponsor' => true,
                        'name' => "(ESCA) Ecole de Management",
                        'desc' => "L'ESCA Ecole de Management se distingue par son approche innovante de l'enseignement supérieur...",
                        'type' => "Privé",
                        'universite' => "Sans Université",
                        'frais' => "53000 - 70000 Dhs/an"
                    ]
                ] as $ecole)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body position-relative">
                            @if($ecole['sponsor'])
                                <span class="badge bg-primary position-absolute top-0 start-0 m-2">Sponsorisé</span>
                            @endif
                            <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle" title="Ajouter aux favoris">
                                <svg width="20" height="20" fill="currentColor" class="text-secondary" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            </button>
                            <div class="mb-3 text-center">
                                <img src="{{ $ecole['logo'] }}" alt="Logo école" style="max-height: 50px;">
                            </div>
                            <h5 class="card-title fw-bold">{{ $ecole['name'] }}</h5>
                            <p class="card-text text-muted small">{{ $ecole['desc'] }}</p>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-5 text-muted small">Type :</div>
                                <div class="col-7 text-end"><span class="badge bg-light text-primary">{{ $ecole['type'] }}</span></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted small">Université :</div>
                                <div class="col-7 text-end"><span class="badge bg-light text-secondary">{{ $ecole['universite'] }}</span></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5 text-muted small">Frais :</div>
                                <div class="col-7 text-end"><span class="badge bg-light text-warning">{{ $ecole['frais'] }}</span></div>
                            </div>
                            <a href="#" class="btn btn-primary w-100">En savoir plus</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
