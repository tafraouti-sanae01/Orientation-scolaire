@extends('layouts.app')
@section('title', 'Gestion des Écoles Étrangères')

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
                        <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.students*') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.students') }}">
                            <i class="fas fa-users me-2"></i>Étudiants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.concours*') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.concours') }}">
                            <i class="fas fa-trophy me-2"></i>Concours
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.ecoles*') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.ecoles') }}">
                            <i class="fas fa-university me-2"></i>Écoles
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ request()->routeIs('admin.foreign-schools*') ? 'bg-primary' : '' }}"
                            href="{{ route('admin.foreign-schools.index') }}">
                            <i class="fas fa-globe me-2"></i>Écoles Étrangères
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contenu principal -->
            <div class="col-md-10 col-12 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark mb-1">🌍 Écoles Étrangères</h2>
                        <p class="text-muted mb-0">Gestion des écoles étrangères partenaires</p>
                    </div>
                    <div class="d-flex gap-2">
                        
                        <a href="{{ route('admin.foreign-schools.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Ajouter une école
                        </a>
                    </div>
                </div>

                <!-- Table des écoles -->
                <div class="card border-0 shadow-sm">
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
                            <table class="table table-hover align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0">Nom</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0">Pays</th>
                                        <th class="border-0">Ville</th>
                                        <th class="border-0">Type</th>
                                        <th class="border-0">Frais annuels</th>
                                        <th class="border-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($schools as $school)
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="rounded-circle bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center"
                                                         style="width: 40px; height: 40px;">
                                                    <i class="fas fa-university text-secondary"></i>
                                                </div>
                                                    <strong>{{ $school->name }}</strong>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $school->email }}
                                            </td>
                                            <td>{{ $school->country }}</td>
                                            <td>{{ $school->city }}</td>
                                            <td><span class="badge bg-info bg-opacity-10 text-info">{{ $school->type }}</span></td>
                                            <td>
                                                @if($school->is_free)
                                                    <span class="badge bg-success">Gratuit</span>
                                                @else
                                                    <span class="badge bg-primary">Payant</span>
                                                @endif
                                            </td>
                                            <td>
                                                 <div class="btn-group" role="group">
                                            <a href="{{ route('admin.foreign-schools.edit', $school->id) }}" class="btn btn-sm btn-outline-primary" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.foreign-schools.delete', $school->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette école ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-5">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-school fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted mb-0">Aucune école étrangère n'a été ajoutée.</p>
                                                    <a href="{{ route('admin.foreign-schools.create') }}" class="btn btn-sm btn-primary mt-3">
                                                        Ajouter une école
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Navigation améliorée -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted">
                                Affichage de {{ $schools->firstItem() ?? 0 }} à {{ $schools->lastItem() ?? 0 }} sur {{ $schools->total() }} résultats
                            </div>
                            <div class="d-flex gap-2">
                                @if($schools->hasPages())
                                    <nav aria-label="Navigation des écoles">
                                        <ul class="pagination pagination-sm mb-0">
                                            <!-- Bouton Précédent -->
                                            @if($schools->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $schools->previousPageUrl() }}">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </a>
                                                </li>
                                            @endif

                                            <!-- Pages numérotées -->
                                            @foreach($schools->getUrlRange(1, $schools->lastPage()) as $page => $url)
                                                @if($page == $schools->currentPage())
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
                                            @if($schools->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $schools->nextPageUrl() }}">
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

    <!-- Scripts -->
    @push('scripts')
    <script>
        function deleteSchool(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette école ?')) {
                fetch(`/admin/foreign-schools/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }
        }

        function toggleStatus(element) {
            const schoolId = element.dataset.schoolId;
            fetch(`/admin/foreign-schools/${schoolId}/toggle-status`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(response => {
                if (!response.ok) {
                    element.checked = !element.checked;
                    alert('Une erreur est survenue');
                }
            });
        }
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
    @endpush

    <style>
        .table th {
            font-weight: 600;
        }
        .badge {
            font-weight: 500;
        }
        .form-switch .form-check-input {
            cursor: pointer;
        }
        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
    </style>
@endsection