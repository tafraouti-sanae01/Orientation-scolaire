@extends('layouts.app')
@section('title', 'Dashboard Admin')

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
                    <h2 class="fw-bold text-dark mb-1">Dashboard Administrateur</h2>
                    <p class="text-muted mb-0">Gestion de la plateforme Tawjih</p>
                </div>
                <div class="text-end">
                    <div class="badge bg-success p-2">Admin</div>
                    <p class="text-muted small mb-0 mt-1">Connecté en tant qu'administrateur</p>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">{{ $totalStudents }}</h4>
                                    <p class="mb-0 small">Étudiants inscrits</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-users fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-success text-white">
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
                <div class="col-md-4 mb-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">{{ $totalEcoles }}</h4>
                                    <p class="mb-0 small">Écoles disponibles</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-university fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-bold mb-3">⚡ Actions rapides</h5>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="{{ route('admin.students') }}" class="card text-decoration-none h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-users fa-2x text-primary"></i>
                                    </div>
                                    <h6 class="fw-bold">Gérer les étudiants</h6>
                                    <p class="text-muted small mb-0">Voir, modifier, supprimer</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.concours') }}" class="card text-decoration-none h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-trophy fa-2x text-success"></i>
                                    </div>
                                    <h6 class="fw-bold">Gérer les concours</h6>
                                    <p class="text-muted small mb-0">Ajouter, modifier, supprimer</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.ecoles') }}" class="card text-decoration-none h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-university fa-2x text-info"></i>
                                    </div>
                                    <h6 class="fw-bold">Gérer les écoles</h6>
                                    <p class="text-muted small mb-0">Ajouter, modifier, supprimer</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.concours.create') }}" class="card text-decoration-none h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                        <i class="fas fa-plus fa-2x text-warning"></i>
                                    </div>
                                    <h6 class="fw-bold">Nouveau concours</h6>
                                    <p class="text-muted small mb-0">Ajouter un concours</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Étudiants récents -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">👥 Étudiants récents</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Ville</th>
                                            <th>Date d'inscription</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentStudents as $student)
                                        <tr>
                                            <td>{{ $student->name }} {{ $student->prenom }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->city ?? 'Non spécifié' }}</td>
                                            <td>{{ $student->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.students.delete', $student->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">📊 Statistiques rapides</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Étudiants</span>
                                    <span class="fw-bold">{{ $totalStudents }}</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: 100%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Concours</span>
                                    <span class="fw-bold">{{ $totalConcours }}</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 100%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Écoles</span>
                                    <span class="fw-bold">{{ $totalEcoles }}</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-info" style="width: 100%"></div>
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
.card {
    transition: all 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1) !important;
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
});
</script>
@endsection 