<div class="col-md-2 d-none d-md-block bg-white shadow-sm p-0" style="min-height: 100vh;">
    

    <!-- Menu de navigation -->
    <nav class="p-3">
        <ul class="nav flex-column">
            <!-- Accueil -->
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 {{ request()->routeIs('dashboard') ? 'active bg-primary text-white shadow-sm' : 'text-dark hover-bg-light' }}" 
                   href="{{ route('dashboard') }}">
                    <i class="fas fa-home me-3 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-primary' }}" style="width: 16px;"></i>
                    <span class="fw-medium">Accueil</span>
                    @if(request()->routeIs('dashboard'))
                        <i class="fas fa-chevron-right ms-auto text-white opacity-75"></i>
                    @endif
                </a>
            </li>
<hr>
            <!-- Section Orientation -->
            <li class="nav-item mb-3">
                <div class="px-3 mb-2">
                    <small class="text-muted fw-bold text-uppercase">Orientation</small>
                </div>
            </li>

            <!-- Écoles et universités -->
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 {{ request()->routeIs('student.ecoles') ? 'active bg-primary text-white shadow-sm' : 'text-dark hover-bg-light' }}" 
                   href="{{ route('student.ecoles') }}">
                    <i class="fas fa-university me-3 {{ request()->routeIs('student.ecoles') ? 'text-white' : 'text-primary' }}" style="width: 16px;"></i>
                    <span class="fw-medium">Écoles et universités</span>
                    @if(request()->routeIs('student.ecoles'))
                        <i class="fas fa-chevron-right ms-auto text-white opacity-75"></i>
                    @endif
                </a>
            </li>

            <!-- Écoles étrangères -->
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 {{ request()->routeIs('student.ForeignSchool') ? 'active bg-primary text-white shadow-sm' : 'text-dark hover-bg-light' }}" 
                   href="{{ route('student.ForeignSchool') }}">
                    <i class="fas fa-globe me-3 {{ request()->routeIs('student.ForeignSchool') ? 'text-white' : 'text-primary' }}" style="width: 16px;"></i>
                    <span class="fw-medium">Écoles étrangères</span>
                    @if(request()->routeIs('student.ForeignSchool'))
                        <i class="fas fa-chevron-right ms-auto text-white opacity-75"></i>
                    @endif
                </a>
            </li>

            <!-- Concours -->
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 {{ request()->routeIs('student.concours') ? 'active bg-primary text-white shadow-sm' : 'text-dark hover-bg-light' }}" 
                   href="{{ route('student.concours') }}">
                    <i class="fas fa-trophy me-3 {{ request()->routeIs('student.concours') ? 'text-white' : 'text-primary' }}" style="width: 16px;"></i>
                    <span class="fw-medium">Concours</span>
                    @if(request()->routeIs('student.concours'))
                        <i class="fas fa-chevron-right ms-auto text-white opacity-75"></i>
                    @endif
                </a>
            </li>
            <hr>
            <!-- Section Compte -->
            <li class="nav-item mb-3">
                <div class="px-3 mb-2">
                    <small class="text-muted fw-bold text-uppercase">Mon Compte</small>
                </div>
            </li>

            <!-- Mon Profil -->
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 {{ request()->routeIs('student.profil*') ? 'active bg-primary text-white shadow-sm' : 'text-dark hover-bg-light' }}" 
                   href="{{ route('student.profil') }}">
                    <i class="fas fa-user me-3 {{ request()->routeIs('student.profil*') ? 'text-white' : 'text-primary' }}" style="width: 16px;"></i>
                    <span class="fw-medium">Mon Profil</span>
                    @if(request()->routeIs('student.profil*'))
                        <i class="fas fa-chevron-right ms-auto text-white opacity-75"></i>
                    @endif
                </a>
            </li>
            <!-- Paramètres -->
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center py-2 px-3 rounded-3 {{ request()->routeIs('student.parametres') ? 'active bg-primary text-white shadow-sm' : 'text-dark hover-bg-light' }}" 
                   href="{{ route('student.parametres') }}">
                    <i class="fas fa-cog me-3 {{ request()->routeIs('student.parametres') ? 'text-white' : 'text-primary' }}" style="width: 16px;"></i>
                    <span class="fw-medium">Paramètres</span>
                    @if(request()->routeIs('student.parametres'))
                        <i class="fas fa-chevron-right ms-auto text-white opacity-75"></i>
                    @endif
                </a>
            </li>
        </ul>

        <!-- Indicateur de progression -->
        <div class="mt-4 p-3 bg-light rounded-3">
            <div class="d-flex align-items-center mb-2">
                <i class="fas fa-chart-line text-success me-2"></i>
                <small class="fw-bold text-dark">Progression</small>
            </div>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">75% du profil complété</small>
        </div>
    </nav>
</div>

<style>
.nav-link.hover-bg-light:hover {
    background-color: #f8f9fa !important;
    transition: all 0.2s ease;
}

.nav-link.active {
    transform: translateX(4px);
    transition: all 0.2s ease;
}

@keyframes pulse {
    0% {
        opacity: 1;
        transform: scale(1);
    }
    50% {
        opacity: 0.7;
        transform: scale(1.1);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}
</style>
