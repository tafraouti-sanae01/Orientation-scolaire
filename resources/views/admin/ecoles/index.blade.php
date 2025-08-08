@extends('layouts.app')
@section('title', 'Gestion des écoles')

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
                    <h2 class="fw-bold text-dark mb-1">Gestion des écoles</h2>
                    <p class="text-muted mb-0">Liste de toutes les écoles disponibles</p>
                </div>
                <div class="text-end">
                    <a href="{{ route('admin.ecoles.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Ajouter une école
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Statistiques rapides -->
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">{{ $ecoles->total() }}</h4>
                                    <small>Total écoles</small>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-university fa-2x"></i>
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
                                    <h4 class="mb-1">{{ $ecoles->where('type', 'Public')->count() }}</h4>
                                    <small>Écoles publiques</small>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-building fa-2x"></i>
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
                                    <h4 class="mb-1">{{ $ecoles->where('fees', 'Gratuit')->count() }}</h4>
                                    <small>Gratuites</small>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-graduation-cap fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tableau des écoles -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">🏫 Liste des écoles</h5>
                                            <div class="d-flex gap-2">
                        <input type="text" id="searchEcoles" class="form-control" placeholder="Rechercher une école..." style="width: 250px;">
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom de l'école</th>
                                    <th>Catégorie</th>
                                    <th>Type</th>
                                    <th>Université</th>
                                    <th>Frais</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ecoles as $ecole)
                                <tr>
                                    <td>{{ $ecole->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-university text-info"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $ecole->name }}</div>
                                                <small class="text-muted">{{ Str::limit($ecole->description, 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @switch($ecole->category)
                                            @case('ingenieur')
                                                <span class="badge bg-primary">Ingénierie</span>
                                                @break
                                            @case('commerce')
                                                <span class="badge bg-success">Commerce</span>
                                                @break
                                            @case('sante')
                                                <span class="badge bg-danger">Santé</span>
                                                @break
                                            @case('architecture')
                                                <span class="badge bg-warning">Architecture</span>
                                                @break
                                            @case('technique')
                                                <span class="badge bg-info">Technique</span>
                                                @break
                                            @case('specialise')
                                                <span class="badge bg-secondary">Spécialisé</span>
                                                @break
                                            @default
                                                <span class="badge bg-light text-dark">{{ $ecole->category }}</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($ecole->type == 'Public')
                                            <span class="badge bg-success">{{ $ecole->type }}</span>
                                        @elseif($ecole->type == 'Semi-public')
                                            <span class="badge bg-warning">{{ $ecole->type }}</span>
                                        @else
                                            <span class="badge bg-info">{{ $ecole->type }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ Str::limit($ecole->university, 20) }}</span>
                                    </td>
                                    <td>
                                        @if($ecole->fees == 'Gratuit')
                                            <span class="badge bg-success">{{ $ecole->fees }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ $ecole->fees }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.ecoles.edit', $ecole->id) }}" class="btn btn-sm btn-outline-primary" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.ecoles.delete', $ecole->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette école ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <!-- Navigation améliorée -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted">
                                Affichage de {{ $ecoles->firstItem() ?? 0 }} à {{ $ecoles->lastItem() ?? 0 }} sur {{ $ecoles->total() }} résultats
                            </div>
                            <div class="d-flex gap-2">
                                @if($ecoles->hasPages())
                                    <nav aria-label="Navigation des écoles">
                                        <ul class="pagination pagination-sm mb-0">
                                            <!-- Bouton Précédent -->
                                            @if($ecoles->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $ecoles->previousPageUrl() }}">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </a>
                                                </li>
                                            @endif

                                            <!-- Pages numérotées -->
                                            @foreach($ecoles->getUrlRange(1, $ecoles->lastPage()) as $page => $url)
                                                @if($page == $ecoles->currentPage())
                                                    <li class="page-item active">
                                                        <span class="page-link">{{ $page }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            <!-- Bouton Suivant -->
                                            @if($ecoles->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $ecoles->nextPageUrl() }}">
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
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

.pagination .page-link {
    color: #495057;
    border-color: #dee2e6;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-2px);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Recherche en temps réel
    const searchInput = document.getElementById('searchEcoles');
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
</script>
@endsection 