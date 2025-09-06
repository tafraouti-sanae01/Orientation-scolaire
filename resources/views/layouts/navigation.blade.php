<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="Tawjih Logo" width="40" height="40" class="me-3 rounded">
            <div>
                <span class="fw-bold fs-4 text-dark">Tawjih</span>
                <div class="d-flex align-items-center">
                    <span class="badge bg-success text-white" style="font-size: 10px;">ORIENTATION</span>
                </div>
            </div>
        </a>

        <!-- Navigation Links (Desktop) -->
        <div class="navbar-nav me-auto d-none d-lg-flex">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold text-primary' : 'text-muted' }}" href="{{ route('dashboard') }}">
                <i class="fas fa-home me-2"></i>Accueil
            </a>
            <a class="nav-link {{ request()->routeIs('student.ecoles') ? 'active fw-semibold text-primary' : 'text-muted' }}" href="{{ route('student.ecoles') }}">
                <i class="fas fa-university me-2"></i>Écoles
            </a>
            <a class="nav-link {{ request()->routeIs('student.ForeignSchool') ? 'active fw-semibold text-primary' : 'text-muted' }}" href="{{ route('student.ForeignSchool') }}">
                <i class="fas fa-globe me-2"></i>Écoles Étrangères
            </a>
            <a class="nav-link {{ request()->routeIs('student.concours') ? 'active fw-semibold text-primary' : 'text-muted' }}" href="{{ route('student.concours') }}">
                <i class="fas fa-trophy me-2"></i>Concours
            </a>
        </div>

        <!-- Right side -->
        <div class="d-flex align-items-center">
            <!-- User Menu -->
            <div class="dropdown">
                <button class="btn btn-link text-dark d-flex align-items-center p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                        <span class="text-white fw-medium">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                    </div>
                    <div class="d-none d-md-block text-start">
                        <div class="small fw-medium">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                        <div class="small text-muted">{{ Auth::user()->email }}</div>
                    </div>
                    <i class="fas fa-chevron-down text-muted ms-2"></i>
                </button>

                <!-- User dropdown -->
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <div class="dropdown-item d-flex align-items-center p-3 border-bottom">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                <span class="text-white fw-medium">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                            </div>
                            <div>
                                <div class="fw-medium">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                                <div class="small text-muted">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('student.profil') }}">
                        <i class="fas fa-user me-3 text-muted"></i>
                        Mon Profil
                    </a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('student.parametres') }}">
                        <i class="fas fa-cog me-3 text-muted"></i>
                        Paramètres
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                <i class="fas fa-sign-out-alt me-3"></i>
                                Se déconnecter
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Mobile menu button -->
            <button class="navbar-toggler d-lg-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fas fa-home me-3"></i>Accueil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.ecoles') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('student.ecoles') }}">
                    <i class="fas fa-university me-3"></i>Écoles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.ForeignSchool') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('student.ForeignSchool') }}">
                    <i class="fas fa-globe me-3"></i>Écoles Étrangères
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.concours') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('student.concours') }}">
                    <i class="fas fa-trophy me-3"></i>Concours
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('student.profil*') ? 'active fw-semibold text-primary' : '' }}" href="{{ route('student.profil') }}">
                    <i class="fas fa-user me-3"></i>Mon Profil
                </a>
            </li>
        </ul>

        <!-- Mobile user menu -->
        <div class="border-top pt-3 mt-3">
            <div class="d-flex align-items-center px-3 mb-3">
                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                    <span class="text-white fw-medium">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                </div>
                <div>
                    <div class="fw-medium">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                    <div class="small text-muted">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="{{ route('student.parametres') }}">
                        <i class="fas fa-cog me-3"></i>
                        Paramètres
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link d-flex align-items-center text-danger border-0 bg-transparent">
                            <i class="fas fa-sign-out-alt me-3"></i>
                            Se déconnecter
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
.navbar-nav .nav-link:hover {
    color: #0d6efd !important;
}

.navbar-nav .nav-link.active {
    color: #0d6efd !important;
    background-color: rgba(13, 110, 253, 0.1);
    border-radius: 0.375rem;
}
</style>
