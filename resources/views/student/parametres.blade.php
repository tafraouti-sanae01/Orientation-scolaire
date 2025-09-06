@extends('layouts.app')
@section('title', 'Paramètres')

@section('content')
    <div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
        <div class="row">
            <!-- Menu latéral -->
            @include('components.student-sidebar')
            <!-- Contenu principal -->
            <div class="col-md-10 px-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">PARAMÈTRES</h4>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <!-- Sécurité du compte -->
                        <div class="card mb-4">
                            <div class="card-header bg-white">
                                <h5 class="fw-bold mb-0">Sécurité du compte</h5>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                
                                <form method="POST" action="{{ route('student.parametres.password') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Changer le mot de passe</label>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Ancien mot de passe" required>
                                                @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nouveau mot de passe" required>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmer le nouveau mot de passe" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Suppression du compte -->
                        <div class="card border-danger">
                            <div class="card-header bg-danger text-white">
                                <h5 class="fw-bold mb-0">Zone dangereuse</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Une fois que vous supprimez votre compte, il n'y a pas de retour en
                                    arrière. Soyez certain.</p>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                    Supprimer mon compte
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('student.parametres.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                        <p class="text-danger"><strong>Cette action est irréversible !</strong></p>
                        <div class="mb-3">
                            <label for="delete_password" class="form-label">Entrez votre mot de passe pour confirmer</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="delete_password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection