@extends('layouts.app')
@section('title', 'Mon espace étudiant')

@section('content')
<div class="container-fluid" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">
    <div class="row">
        <!-- Menu latéral -->
        @include('components.student-sidebar')
        
        <!-- Contenu principal -->
        <div class="col-md-10 px-4 py-4">
            <!-- En-tête amélioré avec salutation -->
            <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                <div>
                        <h2 class="fw-bold mb-2 text-gradient">Bonjour, {{ Auth::user()->name ?? 'Étudiant' }} {{ Auth::user()->prenom ?? '' }} ! </h2>
                    <p class="text-muted mb-0">Bienvenue dans votre espace d'orientation personnalisé</p>
                </div>
                <div class="text-end">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-user-graduate text-success fs-4"></i>
                            </div>
                            <div>
                                <p class="text-muted small mb-0">Dernière connexion</p>
                                <p class="fw-bold mb-0">{{ now()->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques principales -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bold text-primary mb-1">{{ $totalSchools }}</h3>
                                    <p class="text-muted mb-0 small">Écoles disponibles</p>
                                </div>
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="fas fa-university text-primary fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bold text-success mb-1">{{ $totalConcours }}</h3>
                                    <p class="text-muted mb-0 small">Concours actifs</p>
                                </div>
                                <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="fas fa-trophy text-success fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bold text-info mb-1">{{ Auth::user()->favorites()->count() }}</h3>
                                    <p class="text-muted mb-0 small">Favoris</p>
                                </div>
                                <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="fas fa-heart text-info fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="fw-bold text-warning mb-1">75%</h3>
                                    <p class="text-muted mb-0 small">Profil complété</p>
                                </div>
                                <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="fas fa-user-check text-warning fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides améliorées -->
            <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
                <h5 class="fw-bold mb-4 text-dark"> Actions rapides</h5>
                <div class="row g-4">
                        <div class="col-md-3">
                        <a href="{{ route('student.ecoles') }}" class="card text-decoration-none h-100 border-0 shadow-sm hover-lift">
                            <div class="card-body text-center p-4">
                                <div class="bg-gradient-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                    <i class="fas fa-university text-white fs-3"></i>
                                    </div>
                                <h6 class="fw-bold mb-2">Découvrir les écoles</h6>
                                    <p class="text-muted small mb-0">Explorez {{ $totalSchools }}+ établissements</p>
                                <div class="mt-3">
                                    <span class="badge bg-primary bg-opacity-10 text-primary">Accéder</span>
                                </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                        <a href="{{ route('student.concours') }}" class="card text-decoration-none h-100 border-0 shadow-sm hover-lift">
                            <div class="card-body text-center p-4">
                                <div class="bg-gradient-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                    <i class="fas fa-trophy text-white fs-3"></i>
                                    </div>
                                <h6 class="fw-bold mb-2">Voir les concours</h6>
                                    <p class="text-muted small mb-0">{{ $totalConcours }} concours disponibles</p>
                                <div class="mt-3">
                                    <span class="badge bg-success bg-opacity-10 text-success">Accéder</span>
                                </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                        <a href="{{ route('student.ForeignSchool') }}" class="card text-decoration-none h-100 border-0 shadow-sm hover-lift">
                            <div class="card-body text-center p-4">
                                <div class="bg-gradient-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                    <i class="fas fa-globe text-white fs-3"></i>
                                    </div>
                                <h6 class="fw-bold mb-2">Écoles étrangères</h6>
                                <p class="text-muted small mb-0">Opportunités internationales</p>
                                <div class="mt-3">
                                    <span class="badge bg-info bg-opacity-10 text-info">Accéder</span>
                                </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                        <a href="{{ route('student.profil') }}" class="card text-decoration-none h-100 border-0 shadow-sm hover-lift">
                            <div class="card-body text-center p-4">
                                <div class="bg-gradient-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                    <i class="fas fa-user text-white fs-3"></i>
                                    </div>
                                <h6 class="fw-bold mb-2">Mon profil</h6>
                                <p class="text-muted small mb-0">Gérez vos informations</p>
                                <div class="mt-3">
                                    <span class="badge bg-warning bg-opacity-10 text-warning">Accéder</span>
                                </div>
                                </div>
                            </a>
                    </div>
                </div>
            </div>

            <!-- Contenu principal -->
            <div class="row">
                <!-- Statistiques détaillées -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 p-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-chart-pie text-primary"></i>
                                </div>
                                <h5 class="fw-bold mb-0 text-dark"> Statistiques par domaine</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            @foreach($categoryStats as $category => $stats)
                                @if($stats['count'] > 0)
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-{{ $loop->index % 6 == 0 ? 'primary' : ($loop->index % 6 == 1 ? 'success' : ($loop->index % 6 == 2 ? 'danger' : ($loop->index % 6 == 3 ? 'warning' : ($loop->index % 6 == 4 ? 'info' : 'secondary')))) }} bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                                <i class="fas fa-tag text-{{ $loop->index % 6 == 0 ? 'primary' : ($loop->index % 6 == 1 ? 'success' : ($loop->index % 6 == 2 ? 'danger' : ($loop->index % 6 == 3 ? 'warning' : ($loop->index % 6 == 4 ? 'info' : 'secondary')))) }}"></i>
                                            </div>
                                            <span class="fw-medium">{{ $stats['name'] }}</span>
                                        </div>
                                        <span class="fw-bold text-dark">{{ $stats['count'] }} école{{ $stats['count'] > 1 ? 's' : '' }}</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-{{ $loop->index % 6 == 0 ? 'primary' : ($loop->index % 6 == 1 ? 'success' : ($loop->index % 6 == 2 ? 'danger' : ($loop->index % 6 == 3 ? 'warning' : ($loop->index % 6 == 4 ? 'info' : 'secondary')))) }}" style="width: {{ $stats['percentage'] }}%"></div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            
                            @if($totalSchools == 0)
                                <div class="text-center py-4">
                                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                        <i class="fas fa-university text-muted fa-2x"></i>
                                    </div>
                                    <h6 class="text-muted">Aucune école disponible</h6>
                                    <p class="text-muted small">Les écoles seront bientôt ajoutées à la plateforme</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Conseils d'orientation -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 p-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-lightbulb text-success"></i>
                                </div>
                                <h5 class="fw-bold mb-0 text-dark"> Conseils d'orientation</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-info border-0 mb-3" style="background: rgba(13, 202, 240, 0.1);">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-lightbulb text-info me-3 mt-1"></i>
                                    <div>
                                        <strong class="text-info">Conseil du jour:</strong>
                                        <p class="mb-0 small">Commencez par explorer les écoles qui correspondent à vos centres d'intérêt.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-success border-0 mb-3" style="background: rgba(25, 135, 84, 0.1);">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                                    <div>
                                        <strong class="text-success">Prochaine étape:</strong>
                                        <p class="mb-0 small">Complétez votre profil pour recevoir des recommandations personnalisées.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-warning border-0" style="background: rgba(255, 193, 7, 0.1);">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-clock text-warning me-3 mt-1"></i>
                                    <div>
                                        <strong class="text-warning">Rappel:</strong>
                                        <p class="mb-0 small">Les inscriptions aux concours commencent bientôt. Préparez vos dossiers !</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section favoris et échéances -->
            <div class="row">
                <!-- Vos favoris -->
                <div class="col-md-8 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 p-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                        <i class="fas fa-heart text-danger"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0 text-dark"> Vos favoris</h5>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-primary">Voir tout</a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div id="favorites-container">
                                @php
                                    $favorites = Auth::user()->favorites()->orderBy('created_at', 'desc')->take(4)->get();
                                @endphp
                                
                                @if($favorites->count() > 0)
                                    <div class="row g-3">
                                        @foreach($favorites as $favorite)
                                            <div class="col-md-6">
                                                <div class="border rounded-3 p-3 hover-lift">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i class="fas fa-heart text-danger me-2"></i>
                                                        <h6 class="fw-bold mb-0">{{ $favorite->item_name }}</h6>
                                                    </div>
                                                    <p class="text-muted small mb-2">
                                                        {{ $favorite->type == 'ecole' ? 'École' : 'Concours' }} ajouté à vos favoris
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="badge bg-primary bg-opacity-10 text-primary">{{ ucfirst($favorite->item_category) }}</span>
                                                        <small class="text-muted">{{ Str::limit($favorite->item_description, 30) }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                            <i class="fas fa-heart text-muted fa-2x"></i>
                                        </div>
                                        <h6 class="text-muted">Aucun favori pour le moment</h6>
                                        <p class="text-muted small">Ajoutez des écoles et concours à vos favoris pour les voir ici</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Calendrier des échéances -->
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 p-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-calendar-alt text-warning"></i>
                                </div>
                                <h5 class="fw-bold mb-0 text-dark"> Échéances importantes</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="timeline">
                                <div class="timeline-item mb-4">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-danger"></div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Concours CNC</h6>
                                            <p class="text-muted small mb-0">Inscriptions: 20 Mai 2025</p>
                                            <span class="badge bg-danger bg-opacity-10 text-danger small">Urgent</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item mb-4">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-warning"></div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Concours ENCG</h6>
                                            <p class="text-muted small mb-0">Inscriptions: 20 Juin 2025</p>
                                            <span class="badge bg-warning bg-opacity-10 text-warning small">Proche</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item mb-4">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-info"></div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Concours ENSA</h6>
                                            <p class="text-muted small mb-0">Inscriptions: 20 Juin 2025</p>
                                            <span class="badge bg-info bg-opacity-10 text-info small">À venir</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="d-flex">
                                        <div class="timeline-marker bg-success"></div>
                                        <div class="ms-3">
                                            <h6 class="fw-bold mb-1">Concours ENSAM</h6>
                                            <p class="text-muted small mb-0">Inscriptions: 20 Juin 2025</p>
                                            <span class="badge bg-success bg-opacity-10 text-success small">Disponible</span>
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

.progress {
    border-radius: 10px;
}

.progress-bar {
    border-radius: 10px;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des compteurs
    const counters = document.querySelectorAll('h3');
    counters.forEach(counter => {
        const target = parseInt(counter.textContent);
        if (!isNaN(target)) {
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
        }
    });

    // Fonction pour mettre à jour les favoris
    function updateFavorites() {
        fetch('/favorites')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const container = document.getElementById('favorites-container');
                    const favorites = data.favorites.slice(0, 4);
                    
                    if (favorites.length > 0) {
                        let html = '<div class="row g-3">';
                        favorites.forEach(favorite => {
                            html += `
                                <div class="col-md-6">
                                    <div class="border rounded-3 p-3 hover-lift">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-heart text-danger me-2"></i>
                                            <h6 class="fw-bold mb-0">${favorite.item_name}</h6>
                                        </div>
                                        <p class="text-muted small mb-2">
                                            ${favorite.type == 'ecole' ? 'École' : 'Concours'} ajouté à vos favoris
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-primary bg-opacity-10 text-primary">${favorite.item_category.charAt(0).toUpperCase() + favorite.item_category.slice(1)}</span>
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
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-heart text-muted fa-2x"></i>
                                </div>
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