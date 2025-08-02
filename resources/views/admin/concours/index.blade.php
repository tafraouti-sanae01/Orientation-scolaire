@extends('layouts.app')
@section('title', 'Gestion des concours')

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
                    <h2 class="fw-bold text-dark mb-1">Gestion des concours</h2>
                    <p class="text-muted mb-0">Liste de tous les concours disponibles</p>
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.concours.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Ajouter un concours
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Tableau des concours -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">🏆 Liste des concours</h5>
                        <div class="d-flex gap-2">
                            <input type="text" id="searchConcours" class="form-control" placeholder="Rechercher un concours..." style="width: 250px;">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom du concours</th>
                                    <th>Catégorie</th>
                                    <th>Inscriptions</th>
                                    <th>Épreuves</th>
                                    <th>Site</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($concours as $concoursItem)
                                <tr>
                                    <td>{{ $concoursItem['id'] }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-trophy text-success"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $concoursItem['name'] }}</div>
                                                <small class="text-muted">{{ Str::limit($concoursItem['description'], 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @switch($concoursItem['category'])
                                            @case('ingenieur')
                                                <span class="badge bg-primary">Ingénierie</span>
                                                @break
                                            @case('commerce')
                                                <span class="badge bg-success">Commerce</span>
                                                @break
                                            @case('sante')
                                                <span class="badge bg-danger">Santé</span>
                                                @break
                                            @case('education')
                                                <span class="badge bg-info">Éducation</span>
                                                @break
                                            @case('formation')
                                                <span class="badge bg-warning">Formation</span>
                                                @break
                                            @case('specialise')
                                                <span class="badge bg-secondary">Spécialisé</span>
                                                @break
                                            @default
                                                <span class="badge bg-light text-dark">{{ $concoursItem['category'] }}</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $concoursItem['inscription'] }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">{{ $concoursItem['epreuve'] }}</span>
                                    </td>
                                    <td>
                                        @if($concoursItem['site'] == 'amci.ma')
                                            <a href="https://www.amci.ma" target="_blank" class="text-primary">{{ $concoursItem['site'] }}</a>
                                        @elseif($concoursItem['site'] == 'cursussup.gov.ma')
                                            <a href="https://www.cursussup.gov.ma" target="_blank" class="text-primary">{{ $concoursItem['site'] }}</a>
                                        @else
                                            <span class="text-muted">{{ $concoursItem['site'] }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.concours.edit', $concoursItem['id']) }}" class="btn btn-sm btn-outline-primary" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-info" title="Voir détails" onclick="showDetails({{ $concoursItem['id'] }})">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <form action="{{ route('admin.concours.delete', $concoursItem['id']) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce concours ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour afficher les détails -->
<div class="modal fade" id="detailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails du concours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detailsContent">
                <!-- Le contenu sera chargé dynamiquement -->
            </div>
        </div>
    </div>
</div>

<style>
.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1) !important;
}

.table th {
    border-top: none;
    font-weight: 600;
    color: #495057;
}

.btn-group .btn {
    border-radius: 0.375rem !important;
}

.btn-group .btn:first-child {
    border-top-left-radius: 0.375rem !important;
    border-bottom-left-radius: 0.375rem !important;
}

.btn-group .btn:last-child {
    border-top-right-radius: 0.375rem !important;
    border-bottom-right-radius: 0.375rem !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Recherche en temps réel
    const searchInput = document.getElementById('searchConcours');
    const tableRows = document.querySelectorAll('tbody tr');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

function showDetails(concoursId) {
    const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
    document.getElementById('detailsContent').innerHTML = '<p class="text-center">Chargement des détails...</p>';
    modal.show();
    
    // Simuler le chargement des détails
    setTimeout(() => {
        document.getElementById('detailsContent').innerHTML = `
            <div class="text-center">
                <i class="fas fa-info-circle text-muted fa-3x mb-3"></i>
                <h6 class="text-muted">Fonctionnalité en cours de développement</h6>
                <p class="text-muted small">Les détails complets du concours seront affichés ici</p>
            </div>
        `;
    }, 1000);
}
</script>
@endsection 