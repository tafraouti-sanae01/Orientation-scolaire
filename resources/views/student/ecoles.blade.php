@extends('layouts.app')
@section('title', 'Ecoles et universités')

@section('content')
    <div class="container-fluid" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">
        <div class="row">
            <!-- Menu latéral -->
            @include('components.student-sidebar')

            <!-- Contenu principal -->
            <div class="col-md-10 px-4 py-4">
                <!-- En-tête amélioré -->
                <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                    <div>
                            <h3 class="fw-bold mb-2 text-gradient">🏛️ ÉCOLES ET UNIVERSITÉS</h3>
                            <p class="text-muted mb-0">Découvrez les meilleures institutions d'enseignement supérieur du Maroc</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="position-relative">
                                <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                <input type="text" id="searchEcoles" class="form-control ps-5" placeholder="Rechercher une école..." style="width: 300px; border-radius: 25px;">
                            </div>
                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fas fa-university text-primary fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filtres améliorés -->
                <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
                    <h6 class="fw-bold mb-3 text-dark">Filtrer par catégorie</h6>
                    <div class="btn-group flex-wrap" role="group">
                        <button type="button" class="btn btn-outline-primary active rounded-pill me-2 mb-2" data-filter="all">
                            <i class="fas fa-th me-1"></i>Toutes
                        </button>
                        <button type="button" class="btn btn-outline-primary rounded-pill me-2 mb-2" data-filter="ingenieur">
                            <i class="fas fa-cogs me-1"></i>Ingénierie
                        </button>
                        <button type="button" class="btn btn-outline-primary rounded-pill me-2 mb-2" data-filter="commerce">
                            <i class="fas fa-chart-line me-1"></i>Commerce
                        </button>
                        <button type="button" class="btn btn-outline-primary rounded-pill me-2 mb-2" data-filter="sante">
                            <i class="fas fa-heartbeat me-1"></i>Santé
                        </button>
                        <button type="button" class="btn btn-outline-primary rounded-pill me-2 mb-2" data-filter="architecture">
                            <i class="fas fa-building me-1"></i>Architecture
                        </button>
                        <button type="button" class="btn btn-outline-primary rounded-pill me-2 mb-2" data-filter="technique">
                            <i class="fas fa-tools me-1"></i>Technique
                        </button>
                        <button type="button" class="btn btn-outline-primary rounded-pill me-2 mb-2" data-filter="specialise">
                            <i class="fas fa-star me-1"></i>Spécialisé
                        </button>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="bg-white rounded-4 shadow-sm p-3 mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-university text-primary me-2"></i>
                            <span class="text-muted">Résultats: <span class="fw-bold text-primary" id="resultCount">{{ isset($schools) ? $schools->total() : 0 }}</span> écoles</span>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="text-center">
                                <div class="fw-bold text-success">{{ isset($schools) ? $schools->where('type', 'Public')->count() : 0 }}</div>
                                <small class="text-muted">Publiques</small>
                            </div>
                            <div class="text-center">
                                <div class="fw-bold text-info">{{ isset($schools) ? $schools->where('type', 'Privé')->count() : 0 }}</div>
                                <small class="text-muted">Privées</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grille des écoles améliorée -->
                <div class="row g-4">
                    @if(isset($schools) && count($schools) > 0)
                        @foreach($schools as $school)
                            <div class="col-md-6 col-lg-4 ecole-item" data-category="{{ $school->category }}">
                                <div class="card h-100 border-0 shadow-sm hover-lift">
                                    <!-- En-tête avec image et badges -->
                                    <div class="card-header bg-gradient-primary text-white border-0 position-relative" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div class="school-logo-placeholder bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                <i class="fas fa-university text-white fs-3"></i>
                                            </div>
                                            <div class="d-flex flex-column align-items-end">
                                                <span class="badge bg-{{ $school->type === 'Public' ? 'success' : 'warning' }} text-white mb-1">
                                                    {{ $school->type }}
                                                </span>
                                                <button class="btn btn-sm btn-outline-light border-0 favorite-btn" 
                                                        data-type="ecole"
                                                        data-item-id="{{ $school->id }}" 
                                                        data-item-name="{{ $school->name }}"
                                                        data-item-category="{{ $school->category }}" 
                                                        data-item-description="{{ $school->description }}" 
                                                        type="button">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                                </div>
                                        </div>
                                        <h5 class="fw-bold mb-1">{{ $school->name }}</h5>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            <span>{{ $school->university }}</span>
                                        </div>
                                    </div>

                                    <div class="card-body p-4">
                                        <!-- Description -->
                                        <p class="text-muted mb-4">{{ Str::limit($school->description, 120) }}</p>

                                        <!-- Détails organisés -->
                                        <div class="school-details">
                                            <!-- Catégorie -->
                                            <div class="detail-item mb-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                                        <i class="fas fa-tag text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block">Catégorie</small>
                                                        <span class="fw-semibold text-dark">{{ ucfirst($school->category) }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Type et Frais -->
                                            <div class="row g-3 mb-3">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px;">
                                                            <i class="fas fa-building text-success"></i>
                                                        </div>
                                                        <div>
                                                            <small class="text-muted d-block">Type</small>
                                                            <span class="fw-semibold text-dark small">{{ $school->type }}</span>
                                                        </div>
                                                    </div>
                                            </div>

                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px;">
                                                            <i class="fas fa-money-bill text-warning"></i>
                                                        </div>
                                                        <div>
                                                            <small class="text-muted d-block">Frais</small>
                                                            <span class="fw-semibold text-dark small">{{ $school->fees ?? 'Non spécifié' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Seuils -->
                                            @if($school->seuils)
                                                <div class="detail-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                                        <i class="fas fa-chart-line text-info"></i>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block">Seuils d'admission</small>
                                                        <span class="fw-semibold text-dark">{{ $school->seuils }}</span>
                                                    </div>
                                                </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <!-- Footer avec actions -->
                                    <div class="card-footer bg-light border-0 p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-flag text-primary me-2"></i>
                                                <small class="text-muted">Maroc</small>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-info-circle me-1"></i>Détails
                                                </button>
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="fas fa-graduation-cap me-1"></i>Candidater
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="bg-white rounded-4 shadow-sm p-5 text-center">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                                    <i class="fas fa-university fa-3x text-muted"></i>
                                </div>
                                <h5 class="text-muted mb-3">Aucune école trouvée</h5>
                                <p class="text-muted mb-4">Il n'y a pas encore d'écoles dans la base de données.</p>
                                <button class="btn btn-primary rounded-pill">
                                    <i class="fas fa-plus me-2"></i>Ajouter une école
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Pagination améliorée -->
                @if(isset($schools) && $schools->hasPages())
                <div class="bg-white rounded-4 shadow-sm p-4 mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                            <i class="fas fa-list me-2"></i>
                        Affichage de {{ $schools->firstItem() ?? 0 }} à {{ $schools->lastItem() ?? 0 }} sur {{ $schools->total() }} résultats
                    </div>
                            <nav aria-label="Navigation des écoles">
                                <ul class="pagination pagination-sm mb-0">
                                    {{-- Précédent --}}
                                    @if($schools->onFirstPage())
                                        <li class="page-item disabled">
                                        <span class="page-link rounded-start"><i class="fas fa-chevron-left"></i></span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                        <a class="page-link rounded-start" href="{{ $schools->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                    @endif

                                    {{-- Pages --}}
                                    @foreach($schools->getUrlRange(1, $schools->lastPage()) as $page => $url)
                                        @if($page == $schools->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                        @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    {{-- Suivant --}}
                                    @if($schools->hasMorePages())
                                        <li class="page-item">
                                        <a class="page-link rounded-end" href="{{ $schools->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                        <span class="page-link rounded-end"><i class="fas fa-chevron-right"></i></span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <style>
    .text-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hover-lift {
            transition: all 0.3s ease;
        }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .detail-item {
        transition: all 0.2s ease;
    }
    
    .detail-item:hover {
        transform: translateX(5px);
        }

        .btn-group .btn {
        transition: all 0.3s ease;
    }
    
    .btn-group .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>

    <script>
        // Script de recherche et filtrage
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchEcoles');
            const filterButtons = document.querySelectorAll('[data-filter]');
            const ecoleItems = document.querySelectorAll('.ecole-item');
            const resultCount = document.getElementById('resultCount');

            // Fonction de recherche
            function performSearch() {
                const searchTerm = searchInput.value.toLowerCase();
                let visibleCount = 0;

                ecoleItems.forEach(item => {
                    const schoolName = item.querySelector('h5').textContent.toLowerCase();
                    const schoolUniversity = item.querySelector('.text-muted').textContent.toLowerCase();
                    const isVisible = schoolName.includes(searchTerm) || schoolUniversity.includes(searchTerm);
                    
                    item.style.display = isVisible ? 'block' : 'none';
                    if (isVisible) visibleCount++;
                });

                resultCount.textContent = visibleCount;
            }

            // Fonction de filtrage
            function performFilter(category) {
                let visibleCount = 0;

                ecoleItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    const isVisible = category === 'all' || itemCategory === category;
                    
                    item.style.display = isVisible ? 'block' : 'none';
                    if (isVisible) visibleCount++;
                });

                resultCount.textContent = visibleCount;
            }

            // Événements
            searchInput.addEventListener('input', performSearch);

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Retirer la classe active de tous les boutons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    // Ajouter la classe active au bouton cliqué
                    this.classList.add('active');

                    const category = this.getAttribute('data-filter');
                    performFilter(category);
                });
            });
        });
    </script>
@endsection