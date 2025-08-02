@extends('layouts.app')
@section('title', 'Gestion des étudiants')

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
                    <h2 class="fw-bold text-dark mb-1">Gestion des étudiants</h2>
                    <p class="text-muted mb-0">Liste de tous les étudiants inscrits</p>
                </div>
                <div class="text-end">
                    <span class="badge bg-primary p-2">{{ $students->total() }} étudiants</span>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Tableau des étudiants -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">👥 Liste des étudiants</h5>
                        <div class="d-flex gap-2">
                            <input type="text" id="searchStudents" class="form-control" placeholder="Rechercher un étudiant..." style="width: 250px;">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom complet</th>
                                    <th>Email</th>
                                    <th>Ville</th>
                                    <th>Âge</th>
                                    <th>École</th>
                                    <th>Date d'inscription</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-user text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $student->name }} {{ $student->prenom }}</div>
                                                <small class="text-muted">{{ $student->gender ?? 'Non spécifié' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        @if($student->city)
                                            <span class="badge bg-light text-dark">{{ $student->city }}</span>
                                        @else
                                            <span class="text-muted">Non spécifié</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($student->age)
                                            <span class="badge bg-info">{{ $student->age }} ans</span>
                                        @else
                                            <span class="text-muted">Non spécifié</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($student->school)
                                            <span class="badge bg-success">{{ $student->school }}</span>
                                        @else
                                            <span class="text-muted">Non spécifié</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $student->created_at->format('d/m/Y H:i') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-outline-primary" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-info" title="Voir les favoris" onclick="showFavorites({{ $student->id }})">
                                                <i class="fas fa-heart"></i>
                                            </button>
                                            <form action="{{ route('admin.students.delete', $student->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ? Cette action est irréversible.')">
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

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour afficher les favoris -->
<div class="modal fade" id="favoritesModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Favoris de l'étudiant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="favoritesContent">
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
    const searchInput = document.getElementById('searchStudents');
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

function showFavorites(studentId) {
    // Ici vous pouvez ajouter une requête AJAX pour récupérer les favoris de l'étudiant
    const modal = new bootstrap.Modal(document.getElementById('favoritesModal'));
    document.getElementById('favoritesContent').innerHTML = '<p class="text-center">Chargement des favoris...</p>';
    modal.show();
    
    // Simuler le chargement des favoris
    setTimeout(() => {
        document.getElementById('favoritesContent').innerHTML = `
            <div class="text-center">
                <i class="fas fa-heart text-muted fa-3x mb-3"></i>
                <h6 class="text-muted">Fonctionnalité en cours de développement</h6>
                <p class="text-muted small">Les favoris de l'étudiant seront affichés ici</p>
            </div>
        `;
    }, 1000);
}
</script>
@endsection 