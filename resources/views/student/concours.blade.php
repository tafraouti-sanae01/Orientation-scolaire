@extends('layouts.app')
@section('title', 'Concours')

@section('content')
<div class="container-fluid bg-light min-vh-100">
    <div class="row">
        <!-- Menu latéral -->
        @include('components.student-sidebar')
        
        <!-- Contenu principal -->
        
        <div class="col-md-10 px-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold">CONCOURS 2025</h4>
                <div>
                    <input type="text" id="searchConcours" class="form-control" placeholder="Rechercher un concours..." style="width: 300px;">
                </div>
            </div>

            <!-- Filtres par catégorie -->
            <div class="mb-4">
                <div class="btn-group flex-wrap" role="group">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Tous</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="ingenieur">Ingénierie</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="commerce">Commerce</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="sante">Santé</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="education">Éducation</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="formation">Formation Professionnelle</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="specialise">Instituts Spécialisés</button>
                </div>
            </div>
            
            <!-- Compteur de résultats -->
            <div class="mb-3 text-muted">
                Résultats: <span class="fw-bold" id="resultCount">{{ $concours->count() }}</span>
            </div>

            <!-- Grille des concours -->
            <div class="row g-4" id="concoursContainer">
                @forelse($concours as $conc)
                @php
                    $category = $conc->category;
                    switch($category) {
                        case 'ingenieur': $catLabel = 'Ingénierie'; break;
                        case 'commerce': $catLabel = 'Commerce'; break;
                        case 'sante': $catLabel = 'Santé'; break;
                        case 'education': $catLabel = 'Éducation'; break;
                        case 'formation': $catLabel = 'Formation Professionnelle'; break;
                        case 'specialise': $catLabel = 'Instituts Spécialisés'; break;
                        default: $catLabel = ucfirst($category);
                    }
                    
                    // Gestion des dates d'inscription
                    $today = now();
                    $isOpen = false;
                    $dateText = $conc->inscription;
                    
                    if ($conc->inscription) {
                        try {
                            $moisFrancais = [
                                'janvier' => 'January', 'février' => 'February', 'mars' => 'March',
                                'avril' => 'April', 'mai' => 'May', 'juin' => 'June',
                                'juillet' => 'July', 'août' => 'August', 'septembre' => 'September',
                                'octobre' => 'October', 'novembre' => 'November', 'décembre' => 'December'
                            ];
                            
                            if (strpos($conc->inscription, '-') !== false) {
                                $dateParts = explode('-', $conc->inscription);
                                $endDate = trim(end($dateParts));
                            } else {
                                $endDate = trim($conc->inscription);
                            }
                            
                            foreach ($moisFrancais as $fr => $en) {
                                $endDate = str_replace($fr, $en, strtolower($endDate));
                            }
                            
                            $inscriptionDate = DateTime::createFromFormat('j F Y', $endDate);
                            $isOpen = $inscriptionDate && $today <= $inscriptionDate;
                        } catch (Exception $e) {
                            $isOpen = false;
                        }
                    }
                @endphp
                
                <div class="col-md-6 col-lg-4 concours-item" data-category="{{ $category }}">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column">
                            <!-- En-tête avec titre et bouton favori -->
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="fw-bold mb-1">{{ $conc->name }}</h5>
                                    <small class="text-muted">{{ $catLabel }}</small>
                                </div>
                                <button class="btn btn-sm btn-outline-danger border-0 favorite-btn" 
                                        data-type="concours" 
                                        data-item-id="{{ $conc->id }}"
                                        data-item-name="{{ $conc->name }}"
                                        data-item-category="{{ $category }}"
                                        data-item-description="{{ $conc->description }}"
                                        type="button">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            
                            <!-- Description -->
                            <p class="text-muted small mb-3">{{ Str::limit($conc->description, 120) }}</p>
                            
                            <!-- Badges d'état -->
                            <div class="mb-3">
                                {{-- @if($isOpen) 
                                    <span class="badge bg-success me-1 mb-1">Inscriptions ouvertes</span>
                                @else
                                    <span class="badge bg-danger me-1 mb-1">Inscriptions fermées</span>
                                @endif --}}
                                
                                @if($conc->epreuve)
                                    <span class="badge bg-info me-1 mb-1">Épreuves: {{ $conc->epreuve }}</span>
                                @endif
                                
                                @if($conc->places)
                                    <span class="badge bg-warning text-dark me-1 mb-1">{{ $conc->places }} places</span>
                                @endif
                            </div>
                            
                            <!-- Détails supplémentaires -->
                            <div class="concours-details small mb-3">
                                @if($conc->inscription)
                                    <div class="detail-item mb-2">
                                        <i class="fas fa-calendar-alt text-primary me-2"></i>
                                        <span>Inscriptions: {{ $conc->inscription }}</span>
                                    </div>
                                @endif
                                
                                @if($conc->filieres)
                                    <div class="detail-item mb-2">
                                        <i class="fas fa-graduation-cap text-success me-2"></i>
                                        <span>Filières: {{ $conc->filieres }}</span>
                                    </div>
                                @endif
                                
                                @if($conc->conditions)
                                    <div class="detail-item mb-2">
                                        <i class="fas fa-clipboard-check text-danger me-2"></i>
                                        <span>Conditions: {{ Str::limit($conc->conditions, 50) }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Bouton d'action -->
                            <div class="mt-auto">
                                @if($conc->site)
                                    <a href="{{ Str::startsWith($conc->site, 'http') ? $conc->site : 'https://'.$conc->site }}" 
                                       target="_blank" 
                                       class="btn btn-outline-primary w-100">
                                        <i class="fas fa-external-link-alt me-2"></i> Site officiel
                                    </a>
                                @else
                                    <button class="btn btn-outline-secondary w-100" disabled>
                                        <i class="fas fa-info-circle me-2"></i> Détails non disponibles
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-trophy fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Aucun concours disponible</h5>
                        <p class="text-muted">Il n'y a pas de concours programmés pour le moment.</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($concours->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Affichage de {{ $concours->firstItem() }} à {{ $concours->lastItem() }} sur {{ $concours->total() }} résultats
                </div>
                <div class="d-flex gap-2">
                    <nav aria-label="Navigation des concours">
                        <ul class="pagination pagination-sm mb-0">
                            {{-- Précédent --}}
                            @if($concours->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link"><i class="fas fa-chevron-left"></i></span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $concours->previousPageUrl() }}">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                            @endif

                            {{-- Pages --}}
                            @foreach($concours->getUrlRange(1, $concours->lastPage()) as $page => $url)
                                @if($page == $concours->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Suivant --}}
                            @if($concours->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $concours->nextPageUrl() }}">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
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
    .card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
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
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    .concours-details .detail-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 8px;
    }

    .concours-details .detail-item i {
        margin-top: 2px;
    }

    .btn-group .btn {
        border-radius: 20px;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .btn-group .btn.active {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
    }

    @media (max-width: 768px) {
        .btn-group {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 5px;
        }
        
        .btn-group .btn {
            margin-right: 0;
            width: 100%;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const concoursItems = document.querySelectorAll('.concours-item');
    const searchInput = document.getElementById('searchConcours');
    const resultCount = document.getElementById('resultCount');
    const concoursContainer = document.getElementById('concoursContainer');
    const favoriteButtons = document.querySelectorAll('.favorite-btn');

    // Fonction combinée de filtrage et recherche
    function filterAndSearch() {
        const activeFilter = document.querySelector('[data-filter].active');
        const filterValue = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
        const searchTerm = searchInput.value.trim().toLowerCase();
        
        let visibleCount = 0;

        concoursItems.forEach(item => {
            const category = item.getAttribute('data-category');
            const cardText = item.textContent.toLowerCase();
            
            const matchesFilter = filterValue === 'all' || category === filterValue;
            const matchesSearch = searchTerm === '' || cardText.includes(searchTerm);
            
            if (matchesFilter && matchesSearch) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        resultCount.textContent = visibleCount;
        
        // Afficher un message si aucun résultat
        if (visibleCount === 0) {
            const noResults = document.createElement('div');
            noResults.className = 'col-12';
            noResults.innerHTML = `
                <div class="text-center py-5">
                    <i class="fas fa-trophy fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Aucun résultat trouvé</h5>
                    <p class="text-muted">Aucun concours ne correspond à vos critères de recherche.</p>
                </div>
            `;
            
            // Vérifier si le message n'existe pas déjà
            if (!concoursContainer.querySelector('.col-12 .text-muted')) {
                concoursContainer.appendChild(noResults);
            }
        } else {
            // Supprimer le message si des résultats sont trouvés
            const noResultsMsg = concoursContainer.querySelector('.col-12 .text-muted');
            if (noResultsMsg && noResultsMsg.parentElement.parentElement.classList.contains('concours-item') === false) {
                noResultsMsg.parentElement.parentElement.remove();
            }
        }
    }

    // Gestion des favoris
    function handleFavoriteClick(button) {
        const type = button.getAttribute('data-type');
        const itemId = button.getAttribute('data-item-id');
        const itemName = button.getAttribute('data-item-name');
        const itemCategory = button.getAttribute('data-item-category');
        const itemDescription = button.getAttribute('data-item-description');

        button.disabled = true;
        const icon = button.querySelector('i');

        fetch('/favorites/toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
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
            if (!response.ok) throw new Error('Erreur réseau');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                button.classList.toggle('favorited');
                icon.classList.toggle('far');
                icon.classList.toggle('fas');

                // Toast de notification
                const toastHtml = `
                    <div class="toast show position-fixed bottom-0 end-0 m-3" role="alert" style="z-index: 9999">
                        <div class="toast-header">
                            <i class="fas fa-heart text-danger me-2"></i>
                            <strong class="me-auto">Favoris</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                        <div class="toast-body">${data.message}</div>
                    </div>
                `;
                
                const toastEl = document.createElement('div');
                toastEl.innerHTML = toastHtml;
                document.body.appendChild(toastEl);
                
                setTimeout(() => {
                    toastEl.remove();
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        })
        .finally(() => {
            button.disabled = false;
        });
    }

    // Événements
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            filterAndSearch();
        });
    });

    searchInput.addEventListener('input', filterAndSearch);

    favoriteButtons.forEach(button => {
        button.addEventListener('click', function() {
            handleFavoriteClick(this);
        });
    });

    // Initialisation
    filterAndSearch();

    // Animation des cartes
    if (concoursItems.length > 0) {
        concoursItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'all 0.5s ease';

            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, index * 100);
        });
    }
});
</script>
@endsection