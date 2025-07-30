@extends('layouts.app')

@section('title', 'Liste des concours')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Liste des concours</h2>
    <div class="mb-3">
        <input type="text" class="form-control form-control-lg" placeholder="Rechercher un concours">
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Concours National Commun (CNC)</h5>
                    <p class="card-text text-muted small">Le CNC permet l'accès aux grandes écoles d'ingénieurs marocaines. Il s'adresse aux étudiants des classes préparatoires scientifiques.</p>
                    <a href="#" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Concours ENCG</h5>
                    <p class="card-text text-muted small">Le concours d'accès à l'ENCG (École Nationale de Commerce et de Gestion) est ouvert aux bacheliers souhaitant intégrer une école de commerce publique.</p>
                    <a href="#" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>
        <!-- Ajoute d'autres concours ici -->
    </div>
</div>
@endsection 