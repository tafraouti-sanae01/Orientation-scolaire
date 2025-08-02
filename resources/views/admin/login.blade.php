<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Tawjih Orientation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .admin-icon {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-admin {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        .back-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .back-link:hover {
            color: white;
            transform: translateX(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <!-- Back to Home Link -->
                <div class="text-center mb-4">
                    <a href="{{ route('welcome') }}" class="back-link">
                        <i class="fas fa-arrow-left me-2"></i>Retour à l'accueil
                    </a>
                </div>

                <!-- Login Card -->
                <div class="card login-card border-0">
                    <div class="card-body p-5">
                        <!-- Admin Icon -->
                        <div class="admin-icon">
                            <i class="fas fa-shield-alt text-white fs-2"></i>
                        </div>

                        <!-- Header -->
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-dark mb-2">🔐 Admin Panel</h3>
                            <p class="text-muted mb-0">Accès réservé aux administrateurs</p>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            
                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-envelope me-2 text-primary"></i>Email
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', 'admin@gmail.com') }}" 
                                       required 
                                       autocomplete="email" 
                                       autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-dark">
                                    <i class="fas fa-lock me-2 text-primary"></i>Mot de passe
                                </label>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       value="{{ old('password', 'admin123') }}" 
                                       required 
                                       autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label text-muted" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-admin text-white fw-bold">
                                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                                </button>
                            </div>
                        </form>

                        <!-- Demo Credentials -->
                        <div class="mt-4 p-3 bg-light rounded-3">
                            <h6 class="fw-bold text-dark mb-2">
                                <i class="fas fa-info-circle text-info me-2"></i>Identifiants de démonstration
                            </h6>
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted">Email:</small><br>
                                    <code class="text-primary">admin@gmail.com</code>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Mot de passe:</small><br>
                                    <code class="text-primary">admin123</code>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="text-center mt-4">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>
                                Accès sécurisé - Panel d'administration Tawjih
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 