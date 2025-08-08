@extends('layouts.app')
@section('title', 'Concours')

@section('content')
<div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
    <div class="row">
        <!-- Menu latéral -->
        <div class="col-md-2 d-none d-md-block bg-white shadow-sm p-0" style="min-height: 100vh;">
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active text-primary' : '' }}" href="{{ route('dashboard') }}">Mon Plan Tawjih</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.ecoles') ? 'active text-primary' : '' }}" href="{{ route('student.ecoles') }}">Ecoles et universités</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.concours') ? 'active text-primary' : '' }}" href="{{ route('student.concours') }}">Concours</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.profil') ? 'active text-primary' : '' }}" href="{{ route('student.profil') }}">Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.parametres') ? 'active text-primary' : '' }}" href="{{ route('student.parametres') }}">Paramètres</a></li>
            </ul>
        </div>
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
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Tous</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="ingenieur">Ingénierie</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="commerce">Commerce</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="sante">Santé</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="education">Éducation</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="formation">Formation Professionnelle</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="specialise">Instituts Spécialisés</button>
                </div>
            </div>
            
            <!-- Grille des concours -->
            <div class="row g-4">
                @php($concours = \App\Models\Concours::latest()->get())
                @foreach($concours as $conc)
                @php($category = $conc->category)
                @switch($category)
                    @case('ingenieur') @php($catLabel='Ingénierie') @break
                    @case('commerce') @php($catLabel='Commerce') @break
                    @case('sante') @php($catLabel='Santé') @break
                    @case('education') @php($catLabel='Éducation') @break
                    @case('formation') @php($catLabel='Formation') @break
                    @case('specialise') @php($catLabel='Spécialisé') @break
                    @default @php($catLabel=$category)
                @endswitch
                <div class="col-md-6 col-lg-4 concours-item" data-category="{{ $category }}">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0">{{ $conc->name }}</h5>
                                <div class="favorite-btn">
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
                            </div>
                            <p class="text-muted small mb-2">{{ $conc->description }}</p>
                            <div class="mb-2">
                                <span class="badge bg-light text-dark me-1">{{ $catLabel }}</span>
                                <span class="badge bg-light text-dark me-1">Inscriptions : {{ $conc->inscription }}</span>
                                <span class="badge bg-warning me-1">Épreuves : {{ $conc->epreuve }}</span>
                            </div>
                            <ul class="small text-muted mb-3">
                                @if($conc->filieres)
                                    <li><strong>Filières:</strong> {{ $conc->filieres }}</li>
                                @endif
                                @if($conc->places)
                                    <li><strong>Places:</strong> {{ $conc->places }}</li>
                                @endif
                                @if($conc->conditions)
                                    <li><strong>Conditions:</strong> {{ $conc->conditions }}</li>
                                @endif
                            </ul>
                            @if($conc->site)
                                <a href="{{ Str::startsWith($conc->site, 'http') ? $conc->site : 'https://'.$conc->site }}" target="_blank" class="mt-auto text-decoration-none">
                                    <i class="fas fa-external-link-alt me-1"></i> Consulter le site
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
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

.card {
    transition: all 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const concoursItems = document.querySelectorAll('.concours-item');
    const searchInput = document.getElementById('searchConcours');
    const favoriteButtons = document.querySelectorAll('.favorite-btn');

    // Fonction de filtrage par catégorie
    function filterByCategory(category) {
        concoursItems.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Fonction de recherche
    function searchConcours(searchTerm) {
        const searchLower = searchTerm.toLowerCase();
        
        concoursItems.forEach(item => {
            const card = item.querySelector('.card');
            const text = card.textContent.toLowerCase();
            
            if (text.includes(searchLower)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Gestion des favoris
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function() {
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
                    throw new Error(`HTTP error! status: ${response.status}`);
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
                console.error('Erreur détaillée:', error);
                
                // Afficher un message d'erreur plus détaillé
                const errorToast = document.createElement('div');
                errorToast.className = 'position-fixed top-0 end-0 p-3';
                errorToast.style.zIndex = '9999';
                errorToast.innerHTML = `
                    <div class="toast show" role="alert">
                        <div class="toast-header bg-danger text-white">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong class="me-auto">Erreur</strong>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                        </div>
                        <div class="toast-body">
                            ${error.message}
                        </div>
                    </div>
                `;
                document.body.appendChild(errorToast);

                // Supprimer le toast d'erreur après 5 secondes
                setTimeout(() => {
                    errorToast.remove();
                }, 5000);
            })
            .finally(() => {
                // Réactiver le bouton
                this.disabled = false;
            });
        });
    });

    // Événements pour les filtres par catégorie
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
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
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.trim();
        
        if (searchTerm === '') {
            const activeFilter = document.querySelector('[data-filter].active');
            const filter = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
            filterByCategory(filter);
        } else {
            searchConcours(searchTerm);
        }
    });

    // Initialiser le filtrage
    filterByCategory('all');
});
</script>
@endsection 