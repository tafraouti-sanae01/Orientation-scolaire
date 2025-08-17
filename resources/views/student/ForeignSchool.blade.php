@extends('layouts.app')
@section('title', 'Ecoles et universités')

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
                    <li class="nav-item"><a
                            class="nav-link {{ request()->routeIs('student.ForeignSchool') ? 'active text-primary' : '' }}"
                            href="{{ route('student.ForeignSchool') }}">Écoles Étrangères</a></li>
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
        <div>
            <h4 class="fw-bold mb-1">ÉCOLES ET UNIVERSITÉS</h4>
            <p class="text-muted mb-0">Découvrez les meilleures écoles et universités</p>
        </div>
        <div>
            <input type="text" id="searchEcoles" class="form-control" placeholder="Rechercher une école..." style="width: 300px;">
        </div>
    </div>

    <!-- Filtres par catégorie -->
    <div class="mb-4">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-outline-primary active" data-filter="all">Toutes</button>
            <button type="button" class="btn btn-outline-primary" data-filter="ingenieur">Ingénierie</button>
            <button type="button" class="btn btn-outline-primary" data-filter="commerce">Commerce</button>
            <button type="button" class="btn btn-outline-primary" data-filter="sante">Santé</button>
            <button type="button" class="btn btn-outline-primary" data-filter="architecture">Architecture</button>
            <button type="button" class="btn btn-outline-primary" data-filter="technique">Technique</button>
            <button type="button" class="btn btn-outline-primary" data-filter="specialise">Spécialisé</button>
        </div>
    </div>

    <div class="mb-3 text-muted">Résultats: <span class="fw-bold" id="resultCount">{{ $ForeignSchool->total() }}</span></div>

    <!-- Grille des écoles -->
    <div class="row g-4">
@if($ForeignSchool->count() > 0)
            @foreach($ForeignSchool as $school)
                <div class="col-md-6 col-lg-4 ecole-item" data-category="{{ $school->category }}">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- En-tête avec image et nom -->
                        <div class="card-header bg-white border-0 text-center pb-3">
                            <div class="ForeignSchool-image-container mb-3">
                                
                                    <div class="ForeignSchool-logo-placeholder">
                                        <i class="fas fa-university text-primary fa-2x"></i>
                                    </div>
                                
                            </div>
                            <h6 class="fw-bold mb-1">{{ $school->name }}</h6>

                            <!-- Bouton favori -->
                            <div class="favorite-btn">
                                <button class="btn btn-sm btn-outline-danger border-0 favorite-btn" data-type="ecole"
                                    data-item-id="{{ $school->id }}" data-item-name="{{ $school->name }}"
                                    data-item-category="{{ $school->type }}" data-item-description="{{ $school->description }}" type="button">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
    <!-- Description -->
    <p class="text-muted small mb-4">{{ Str::limit($school->description, 100) }}</p>

    <!-- Détails -->
    <div class="ForeignSchool-details row gx-2 gy-1">
        <div class="col-6">
            <i class="fas fa-tag text-primary me-1"></i>
            <span class="text-muted">Catégorie:</span>
            <span class="fw-semibold text-primary">{{ ucfirst($school->type) ?? '—' }}</span>
        </div>

        <div class="col-6">
            <i class="fas fa-building text-success me-1"></i>
            <span class="text-muted">Type:</span>
            <span class="fw-semibold text-success">{{ $school->is_free ? 'Gratuite' : 'Payante' }}</span>
        </div>

        <div class="col-6">
            <i class="fas fa-globe text-info me-1"></i>
            <span class="text-muted">Pays:</span>
            <span class="fw-semibold text-info">{{ $school->country }}</span>
        </div>

        <div class="col-6">
            <i class="fas fa-map-marker-alt text-danger me-1"></i>
            <span class="text-muted">Ville:</span>
            <span class="fw-semibold text-danger">{{ $school->city }}</span>
        </div>

        @if($school->address)
        <div class="col-12">
            <i class="fas fa-location-arrow text-secondary me-1"></i>
            <span class="text-muted">Adresse:</span>
            <span class="fw-semibold text-secondary">{{ $school->address }}</span>
        </div>
        @endif

        @if($school->website)
        <div class="col-12">
            <i class="fas fa-link text-primary me-1"></i>
            <span class="text-muted">Site:</span>
            <a href="{{ $school->website }}" target="_blank" class="fw-semibold text-primary">{{ $school->website }}</a>
        </div>
        @endif

        @if($school->email)
        <div class="col-6">
            <i class="fas fa-envelope text-warning me-1"></i>
            <span class="text-muted">Email:</span>
            <span class="fw-semibold text-warning">{{ $school->email }}</span>
        </div>
        @endif

        @if($school->phone)
        <div class="col-6">
            <i class="fas fa-phone text-success me-1"></i>
            <span class="text-muted">Téléphone:</span>
            <span class="fw-semibold text-success">{{ $school->phone }}</span>
        </div>
        @endif

        @if($school->admission_requirements)
        <div class="col-12">
            <i class="fas fa-file-alt text-info me-1"></i>
            <span class="text-muted">Admission:</span>
            <span class="fw-semibold text-info">{{ $school->admission_requirements }}</span>
        </div>
        @endif

        @if($school->language_requirements)
        <div class="col-12">
            <i class="fas fa-language text-danger me-1"></i>
            <span class="text-muted">Langue:</span>
            <span class="fw-semibold text-danger">{{ $school->language_requirements }}</span>
        </div>
        @endif
    </div>
</div>


                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-university fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Aucune école trouvée</h5>
                    <p class="text-muted">Il n'y a pas encore d'écoles dans la base de données.</p>
                </div>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted">
            Affichage de {{ $ForeignSchool->firstItem() ?? 0 }} à {{ $ForeignSchool->lastItem() ?? 0 }} sur {{ $ForeignSchool->total() }} résultats
        </div>
        <div class="d-flex gap-2">
            @if($ForeignSchool->hasPages())
                <nav aria-label="Navigation des écoles">
                    <ul class="pagination pagination-sm mb-0">
                        {{-- Précédent --}}
                        @if($ForeignSchool->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $ForeignSchool->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                            </li>
                        @endif

                        {{-- Pages --}}
                        @foreach($ForeignSchool->getUrlRange(1, $ForeignSchool->lastPage()) as $page => $url)
                            @if($page == $ForeignSchool->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Suivant --}}
                        @if($ForeignSchool->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $ForeignSchool->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </div>
</div>

        </div>
    </div>

    <style>
        .card {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        .card-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
        }

        .school-image-container {
            position: relative;
            display: inline-block;
        }

        .school-logo {
            border: 3px solid #e9ecef;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: auto;
        }

        .card:hover .school-logo {
            border-color: #0d6efd;
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .school-logo-placeholder {
            width: 80px;
            height: 80px;
            border: 3px solid #e9ecef;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            transition: all 0.3s ease;
        }

        .card:hover .school-logo-placeholder {
            border-color: #0d6efd;
            transform: scale(1.05);
        }

        .favorite-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .favorite-btn .btn {
            transition: all 0.3s ease;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .favorite-btn .btn:hover {
            background-color: #dc3545;
            color: white;
            transform: scale(1.1);
        }

        .favorite-btn .btn.favorited {
            background-color: #dc3545;
            color: white;
        }

        .favorite-btn .btn.favorited i {
            animation: heartBeat 0.6s ease-in-out;
        }

        @keyframes heartBeat {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .school-details {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .detail-item:last-child {
            margin-bottom: 0;
        }

        .detail-item i {
            width: 16px;
            text-align: center;
        }

        .btn-group .btn {
            border-radius: 20px;
            margin-right: 5px;
        }

        .btn-group .btn.active {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }

        .pagination .page-link {
            border-radius: 8px;
            margin: 0 2px;
            border: none;
            color: #6c757d;
        }

        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .nav-link.active {
            background-color: #e3f2fd !important;
            border-radius: 8px;
            font-weight: 600;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButtons = document.querySelectorAll('[data-filter]');
            const ecoleItems = document.querySelectorAll('.ecole-item');
            const searchInput = document.getElementById('searchEcoles');
            const resultCount = document.getElementById('resultCount');
            const favoriteButtons = document.querySelectorAll('.favorite-btn');

            // Fonction de filtrage par catégorie
            function filterByCategory(type) {
    let visibleCount = 0;
    const typeLower = type.toLowerCase().trim();

    ecoleItems.forEach(item => {
        const itemCategory = item.getAttribute('data-category')?.toLowerCase().trim();

        if (typeLower === 'all' || itemCategory === typeLower) {
            item.style.display = 'block';
            visibleCount++;
        } else {
            item.style.display = 'none';
        }
    });

    resultCount.textContent = visibleCount;
}


            // Fonction de recherche
            function searchEcoles(searchTerm) {
    const searchLower = searchTerm.toLowerCase();
    const activeFilter = document.querySelector('[data-filter].active');
    const filter = activeFilter ? activeFilter.getAttribute('data-filter').toLowerCase().trim() : 'all';

    let visibleCount = 0;

    ecoleItems.forEach(item => {
        const card = item.querySelector('.card');
        const text = card.textContent.toLowerCase();
        const itemCategory = item.getAttribute('data-category')?.toLowerCase().trim();

        const matchesSearch = text.includes(searchLower);
        const matchesCategory = (filter === 'all' || itemCategory === filter);

        if (matchesSearch && matchesCategory) {
            item.style.display = 'block';
            visibleCount++;
        } else {
            item.style.display = 'none';
        }
    });

    resultCount.textContent = visibleCount;
}

            // Gestion des favoris
            favoriteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const type = this.getAttribute('data-type');
                    const itemId = this.getAttribute('data-item-id');
                    const itemName = this.getAttribute('data-item-name');
                    const itemCategory = this.getAttribute('data-item-category');
                    const itemDescription = this.getAttribute('data-item-description');

                    // Désactiver le bouton pendant la requête
                    this.disabled = true;

                    fetch('/favorites/toggle', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            type: type,
                            item_id: itemId,
                            item_name: itemName,
                            item_category: itemCategory,
                            item_description: itemDescription
                        })
                    })
                        .then(response => {
                            if (!response.ok) {
                                return;
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                // Toggle de l'état visuel
                                this.classList.toggle('favorited');

                                const icon = this.querySelector('i');
                                if (this.classList.contains('favorited')) {
                                    icon.className = 'fas fa-heart';
                                } else {
                                    icon.className = 'far fa-heart';
                                }

                                // Afficher un message de confirmation
                                const toast = document.createElement('div');
                                toast.className = 'position-fixed top-0 end-0 p-3';
                                toast.style.zIndex = '9999';
                                toast.innerHTML = `
                                                    <div class="toast show" role="alert">
                                                        <div class="toast-header">
                                                            <i class="fas fa-heart text-danger me-2"></i>
                                                            <strong class="me-auto">Favoris</strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                                                        </div>
                                                        <div class="toast-body">
                                                            ${data.message}
                                                        </div>
                                                    </div>
                                                `;
                                document.body.appendChild(toast);

                                // Supprimer le toast après 3 secondes
                                setTimeout(() => {
                                    toast.remove();
                                }, 3000);

                                // Déclencher l'événement de mise à jour des favoris
                                window.dispatchEvent(new Event('favoriteUpdated'));
                            } else {
                                throw new Error(data.message || 'Erreur inconnue');
                            }
                        })
                        .catch(error => {
                            return;
                        })
                        .finally(() => {
                            // Réactiver le bouton
                            this.disabled = false;
                        });
                });
            });

            // Événements pour les filtres par catégorie
            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const filter = this.getAttribute('data-filter');

                    // Mettre à jour les boutons actifs
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Réinitialiser la recherche
                    searchInput.value = '';

                    // Appliquer le filtre
                    filterByCategory(filter);
                });
            });

            // Événement pour la recherche
            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.trim();

                if (searchTerm === '') {
                    const activeFilter = document.querySelector('[data-filter].active');
                    const filter = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
                    filterByCategory(filter);
                } else {
                    searchEcoles(searchTerm);
                }
            });

            // Initialiser le compteur
            filterByCategory('all');

            // Animation d'apparition des cartes
            ecoleItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    item.style.transition = 'all 0.5s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
@endsection