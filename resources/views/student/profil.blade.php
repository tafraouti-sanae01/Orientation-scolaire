@extends('layouts.app')
@section('title', 'Mon Profil')

@section('content')
    <div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
        <div class="row">
            <!-- Menu latéral -->
            @include('components.student-sidebar')
            <!-- Contenu principal -->
            <div class="col-md-10 px-4 py-4">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">MON PROFIL</h4>
                    <div>
                        <a href="{{ route('student.profil.edit') }}" class="btn btn-primary">Modifier le profil</a>
                    </div>
                </div>

                <!-- Informations personnelles -->
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">Informations personnelles</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Nom</label>
                                    <p class="fw-bold">{{ Auth::user()->name ?? 'Non renseigné' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Prénom</label>
                                    <p class="fw-bold">{{ Auth::user()->prenom ?? 'Non renseigné' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Email</label>
                                    <p class="fw-bold">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Âge</label>
                                    <p class="fw-bold">{{ Auth::user()->age ?? 'Non renseigné' }} ans</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Ville</label>
                                    <p class="fw-bold">{{ Auth::user()->city ?? 'Non renseigné' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Genre</label>
                                    <p class="fw-bold">{{ Auth::user()->gender ?? 'Non renseigné' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations académiques -->
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">Informations académiques</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">École</label>
                                    <p class="fw-bold">{{ Auth::user()->school ?? 'Non renseigné' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Type d'école</label>
                                    <p class="fw-bold">{{ Auth::user()->school_type ?? 'Non renseigné' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Niveau Bac</label>
                                    <p class="fw-bold">{{ Auth::user()->bac_level ?? 'Non renseigné' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-muted">Bac obtenu</label>
                                    <p class="fw-bold">{{ Auth::user()->bac_obtenu ?? 'Non renseigné' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection