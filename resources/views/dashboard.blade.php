@extends('layouts.app')
@section('title', 'Mon espace étudiant')

@section('content')
<div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
    <div class="row">
        <!-- Menu latéral -->
        <div class="col-md-2 d-none d-md-block bg-white shadow-sm p-0" style="min-height: 100vh;">
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active text-primary' : '' }}" href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.ecoles') ? 'active text-primary' : '' }}" href="{{ route('student.ecoles') }}">Ecoles et universités</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.ForeignSchool') ? 'active text-primary' : '' }}" href="{{ route('student.ForeignSchool') }}">Écoles Étrangères</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.concours') ? 'active text-primary' : '' }}" href="{{ route('student.concours') }}">Concours</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.profil') ? 'active text-primary' : '' }}" href="{{ route('student.profil') }}">Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.parametres') ? 'active text-primary' : '' }}" href="{{ route('student.parametres') }}">Paramètres</a></li>
            </ul>
        </div>
        
        <!-- Contenu principal -->
        <div class="col-md-10 px-4 py-4">
            <!-- En-tête avec salutation -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-primary mb-1">Bonjour, {{ Auth::user()->name ?? 'Étudiant' }} {{ Auth::user()->prenom ?? '' }} ! 👋</h2>
                    <p class="text-muted mb-0">Bienvenue dans votre espace d'orientation personnalisé</p>
                </div>
                <div class="text-end">
                    <p class="text-muted small mb-0">Dernière connexion: {{ now()->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <!-- Statistiques rapides -->
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <div class="card bg-gradient-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">{{ $totalSchools }}</h4>
                                    <p class="mb-0 small">Écoles disponibles</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-graduation-cap fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-gradient-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">{{ $totalConcours }}</h4>
                                    <p class="mb-0 small">Concours actifs</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-trophy fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-bold mb-3">🚀 Actions rapides</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="{{ route('student.ecoles') }}" class="card text-decoration-none h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-university fa-2x text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold">Découvrir les écoles</h6>
                                    <p class="text-muted small mb-0">Explorez {{ $totalSchools }}+ établissements</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('student.concours') }}" class="card text-decoration-none h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-trophy fa-2x text-success"></i>
                                    </div>
                                    <h6 class="fw-bold">Voir les concours</h6>
                                    <p class="text-muted small mb-0">{{ $totalConcours }} concours disponibles</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('student.profil') }}" class="card text-decoration-none h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-user fa-2x text-info"></i>
                                    </div>
                                    <h6 class="fw-bold">Mon profil</h6>
                                    <p class="text-muted small mb-0">Gérez vos informations</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('student.parametres') }}" class="card text-decoration-none h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-cog fa-2x text-warning"></i>
                                    </div>
                                    <h6 class="fw-bold">Paramètres</h6>
                                    <p class="text-muted small mb-0">Sécurité et préférences</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques détaillées -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">📊 Statistiques par domaine</h5>
                        </div>
                        <div class="card-body">
                            @foreach($categoryStats as $category => $stats)
                                @if($stats['count'] > 0)
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span>{{ $stats['name'] }}</span>
                                        <span class="fw-bold">{{ $stats['count'] }} école{{ $stats['count'] > 1 ? 's' : '' }}</span>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-{{ $loop->index % 6 == 0 ? 'primary' : ($loop->index % 6 == 1 ? 'success' : ($loop->index % 6 == 2 ? 'danger' : ($loop->index % 6 == 3 ? 'warning' : ($loop->index % 6 == 4 ? 'info' : 'secondary')))) }}" style="width: {{ $stats['percentage'] }}%"></div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            
                            @if($totalSchools == 0)
                                <div class="text-center py-3">
                                    <i class="fas fa-university text-muted fa-2x mb-2"></i>
                                    <p class="text-muted mb-0">Aucune école disponible pour le moment</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">🎓 Conseils d'orientation</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info mb-3">
                                <i class="fas fa-lightbulb me-2"></i>
                                <strong>Conseil du jour:</strong> Commencez par explorer les écoles qui correspondent à vos centres d'intérêt.
                            </div>
                            <div class="alert alert-success mb-3">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong>Prochaine étape:</strong> Complétez votre profil pour recevoir des recommandations personnalisées.
                            </div>
                            <div class="alert alert-warning">
                                <i class="fas fa-clock me-2"></i>
                                <strong>Rappel:</strong> Les inscriptions aux concours commencent bientôt. Préparez vos dossiers !
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recommandations personnalisées -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">❤️ Vos favoris</h5>
                        </div>
                        <div class="card-body">
                            <div id="favorites-container">
                                @php
                                    $favorites = Auth::user()->favorites()->orderBy('created_at', 'desc')->take(4)->get();
                                @endphp
                                
                                @if($favorites->count() > 0)
                                    <div class="row g-3">
                                        @foreach($favorites as $favorite)
                                            <div class="col-md-6">
                                                <div class="border rounded p-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i class="fas fa-heart text-danger me-2"></i>
                                                        <h6 class="fw-bold mb-0">{{ $favorite->item_name }}</h6>
                                                    </div>
                                                    <p class="text-muted small mb-2">
                                                        {{ $favorite->type == 'ecole' ? 'École' : 'Concours' }} ajouté à vos favoris
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="badge bg-primary">{{ ucfirst($favorite->item_category) }}</span>
                                                        <small class="text-muted">{{ Str::limit($favorite->item_description, 30) }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-heart text-muted fa-3x mb-3"></i>
                                        <h6 class="text-muted">Aucun favori pour le moment</h6>
                                        <p class="text-muted small">Ajoutez des écoles et concours à vos favoris pour les voir ici</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Calendrier des échéances -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">📅 Échéances importantes</h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-danger"></div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Concours CNC</h6>
                                            <p class="text-muted small mb-0">Inscriptions: 20 Mai 2025</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-warning"></div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Concours ENCG</h6>
                                            <p class="text-muted small mb-0">Inscriptions: 20 Juin 2025</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item mb-3">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-info"></div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Concours ENSA</h6>
                                            <p class="text-muted small mb-0">Inscriptions: 20 Juin 2025</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-success"></div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Concours ENSAM</h6>
                                            <p class="text-muted small mb-0">Inscriptions: 20 Juin 2025</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
.bg-gradient-success {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
.bg-gradient-info {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
.bg-gradient-warning {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
}

.timeline-marker {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin-top: 4px;
}

.card:hover {
    transform: translateY(-2px);
    transition: transform 0.2s ease;
}

.progress {
    border-radius: 10px;
}

.progress-bar {
    border-radius: 10px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des cartes au survol
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Animation des statistiques
    const counters = document.querySelectorAll('h4');
    counters.forEach(counter => {
        const target = parseInt(counter.textContent);
        let current = 0;
        const increment = target / 50;
        
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.ceil(current);
                setTimeout(updateCounter, 20);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    });

    // Fonction pour mettre à jour les favoris
    function updateFavorites() {
        fetch('/favorites')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const container = document.getElementById('favorites-container');
                    const favorites = data.favorites.slice(0, 4); // Prendre seulement les 4 premiers
                    
                    if (favorites.length > 0) {
                        let html = '<div class="row g-3">';
                        favorites.forEach(favorite => {
                            html += `
                                <div class="col-md-6">
                                    <div class="border rounded p-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-heart text-danger me-2"></i>
                                            <h6 class="fw-bold mb-0">${favorite.item_name}</h6>
                                        </div>
                                        <p class="text-muted small mb-2">
                                            ${favorite.type == 'ecole' ? 'École' : 'Concours'} ajouté à vos favoris
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-primary">${favorite.item_category.charAt(0).toUpperCase() + favorite.item_category.slice(1)}</span>
                                            <small class="text-muted">${favorite.item_description.substring(0, 30)}${favorite.item_description.length > 30 ? '...' : ''}</small>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        html += '</div>';
                        container.innerHTML = html;
                    } else {
                        container.innerHTML = `
                            <div class="text-center py-4">
                                <i class="fas fa-heart text-muted fa-3x mb-3"></i>
                                <h6 class="text-muted">Aucun favori pour le moment</h6>
                                <p class="text-muted small">Ajoutez des écoles et concours à vos favoris pour les voir ici</p>
                            </div>
                        `;
                    }
                }
            })
            .catch(error => {
                console.error('Erreur lors de la mise à jour des favoris:', error);
            });
    }

    // Écouter les événements de mise à jour des favoris
    window.addEventListener('favoriteUpdated', function() {
        updateFavorites();
    });

    // Mettre à jour les favoris toutes les 30 secondes
    setInterval(updateFavorites, 30000);
});
</script>
@endsection
