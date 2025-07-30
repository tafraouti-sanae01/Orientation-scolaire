@extends('layouts.app')
@section('title', 'Complète ton profil')

@section('content')
    <style>
        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .step {
            flex: 1;
            text-align: center;
            position: relative;
        }

        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 0;
            width: 100%;
            height: 2px;
            background: #e0e0e0;
            z-index: 0;
            transform: translateY(-50%);
        }

        .step.active .circle {
            background: #43e97b;
            color: #fff;
            border: none;
        }

        .circle {
            display: inline-block;
            width: 36px;
            height: 36px;
            line-height: 36px;
            border-radius: 50%;
            background: #f0f0f0;
            color: #43e97b;
            font-weight: bold;
            margin-bottom: 0.5rem;
            border: 2px solid #43e97b;
            z-index: 1;
            position: relative;
        }
    </style>
    <div class="container py-5">
        <div class="mx-auto bg-white rounded-4 shadow p-4" style="max-width: 600px;">
            <!-- Stepper -->
            <div class="stepper mb-4">
                <div class="step {{ $step == 1 ? 'active' : '' }}">
                    <div class="circle">1</div>
                    <div class="small">Niveau Bac</div>
                </div>
                <div class="step {{ $step == 2 ? 'active' : '' }}">
                    <div class="circle">2</div>
                    <div class="small">Langue Bac</div>
                </div>
                <div class="step {{ $step == 3 ? 'active' : '' }}">
                    <div class="circle">3</div>
                    <div class="small">Filière Bac</div>
                </div>
                <div class="step {{ $step == 4 ? 'active' : '' }}">
                    <div class="circle">4</div>
                    <div class="small">Préférences</div>
                </div>
                <div class="step {{ $step == 5 ? 'active' : '' }}">
                    <div class="circle">5</div>
                    <div class="small">Informations</div>
                </div>
            </div>
            <!-- Formulaire -->
            <form method="POST" action="{{ url('/student/config') }}">
                @csrf
                @if($step == 1)
                    <h4 class="mb-4 text-primary fw-bold">Niveau du Baccalauréat</h4>
                    <p class="text-muted mb-4">Chosissez le niveau de votre baccalauréat !</p>
                    <div class="mb-3">
                        <select class="form-select" id="bac_level" name="bac_level" required>
                            <option value="1ère année" {{ (isset($data['bac_level']) && $data['bac_level'] == '1ère année') ? 'selected' : '' }}>1ère année Baccalauréat</option>
                            <option value="2ème année" {{ (isset($data['bac_level']) && $data['bac_level'] == '2ème année') ? 'selected' : '' }}>2ème année Baccalauréat</option>
                            <option value="bac+1" {{ (isset($data['bac_level']) && $data['bac_level'] == 'bac+1') ? 'selected' : '' }}>Bac+1</option>
                            <option value="bac+2" {{ (isset($data['bac_level']) && $data['bac_level'] == 'bac+2') ? 'selected' : '' }}>Bac+2</option>
                            <option value="bac+3" {{ (isset($data['bac_level']) && $data['bac_level'] == 'bac+3') ? 'selected' : '' }}>Bac+3</option>
                            <option value="autres" {{ (isset($data['bac_level']) && $data['bac_level'] == 'autres') ? 'selected' : '' }}>Autres</option>
                        </select>
                    </div>
                @elseif($step == 2)
                    <h4 class="mb-4 text-primary fw-bold">Langue du Baccalauréat</h4>
                    <p class="text-muted mb-4">Chosissez la langue de votre baccalauréat !</p>
                    <div class="mb-3">
                        <select class="form-select" id="bac_lang" name="bac_lang" required>
                            <option value="Français" {{ (isset($data['bac_lang']) && $data['bac_lang'] == 'Français') ? 'selected' : '' }}>BIOF(option Français)</option>
                            <option value="Arabe" {{ (isset($data['bac_lang']) && $data['bac_lang'] == 'Arabe') ? 'selected' : '' }}>Option Arabe</option>
                        </select>
                    </div>
                @elseif($step == 3)
                    <h4 class="mb-4 text-primary fw-bold">Filière de votre Baccalauréat ?</h4>
                    <p class="text-muted mb-4">Chosissez la filière de votre Baccalauréat !</p>
                    <div class="mb-3">
                        <select class="form-select" id="bac_field" name="bac_field" required>
                            <option value="Math A" {{ (isset($data['bac_field']) && $data['bac_field'] == 'Math A') ? 'selected' : '' }}>Sciences Math A</option>
                            <option value="Math B" {{ (isset($data['bac_field']) && $data['bac_field'] == 'Math B') ? 'selected' : '' }}>Sciences Math B</option>
                            <option value="Sciences Physiques" {{ (isset($data['bac_field']) && $data['bac_field'] == 'Sciences Physiques') ? 'selected' : '' }}>Sciences Physiques</option>
                            <option value="SVT" {{ (isset($data['bac_field']) && $data['bac_field'] == 'SVT') ? 'selected' : '' }}>SVT</option>
                            <option value="Lettres" {{ (isset($data['bac_field']) && $data['bac_field'] == 'Lettres') ? 'selected' : '' }}>Lettres</option>
                            <option value="Sciences humaines" {{ (isset($data['bac_field']) && $data['bac_field'] == 'Sciences humaines') ? 'selected' : '' }}>Sciences humaines</option>
                            <option value="Sciences économique" {{ (isset($data['bac_field']) && $data['bac_field'] == 'Sciences économique') ? 'selected' : '' }}>Sciences économique</option>
                            <option value="Autre filière du bac" {{ (isset($data['bac_field']) && $data['bac_field'] == 'Autre filière du bac') ? 'selected' : '' }}>Autre filière du bac</option>
                        </select>
                    </div>
                @elseif($step == 4)
                    <h4 class="mb-4 text-primary fw-bold">Quels sont vos préférences ?</h4>
                    <p class="text-muted mb-4">Choisissez vos préférences !</p>
                    
                    <!-- Type d'université -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <label class="form-label fw-bold">Préférez-vous étudier dans une université publique, privée, ou pensez-vous aux deux comme options possibles ?</label>
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="university_type" id="public" value="public" {{ (isset($data['university_type']) && $data['university_type']=='public') ? 'checked' : '' }}>
                                <label class="form-check-label" for="public">Public</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="university_type" id="private" value="private" {{ (isset($data['university_type']) && $data['university_type']=='private') ? 'checked' : '' }}>
                                <label class="form-check-label" for="private">Privé</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="university_type" id="both" value="both" {{ (isset($data['university_type']) && $data['university_type']=='both') ? 'checked' : '' }}>
                                <label class="form-check-label" for="both">Les deux</label>
                            </div>
                        </div>
                    </div>

                    <!-- Services d'intérêt -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <label class="form-label fw-bold">Quels sont les services qui t'intéressent ?</label>
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" id="public_schools" value="public_schools" {{ (isset($data['services']) && in_array('public_schools', $data['services'])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="public_schools">Inscription aux écoles publiques</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" id="private_schools" value="private_schools" {{ (isset($data['services']) && in_array('private_schools', $data['services'])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="private_schools">Inscription aux écoles privées</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" id="guidance" value="guidance" {{ (isset($data['services']) && in_array('guidance', $data['services'])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="guidance">Orientation avec un conseiller</label>
                            </div>
                        </div>
                    </div>

                    <!-- Budget mensuel -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <label class="form-label fw-bold">Quel est votre budget (par mois) maximale pour vos études supérieures ?</label>
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="budget" id="less_5000" value="less_5000" {{ (isset($data['budget']) && $data['budget']=='less_5000') ? 'checked' : '' }}>
                                <label class="form-check-label" for="less_5000">Moins de 5000Dhs/Mois</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="budget" id="5000_10000" value="5000_10000" {{ (isset($data['budget']) && $data['budget']=='5000_10000') ? 'checked' : '' }}>
                                <label class="form-check-label" for="5000_10000">Entre 5000 et 10000Dhs/Mois</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="budget" id="more_10000" value="more_10000" {{ (isset($data['budget']) && $data['budget']=='more_10000') ? 'checked' : '' }}>
                                <label class="form-check-label" for="more_10000">Plus de 10000 Dhs/Mois</label>
                            </div>
                        </div>
                    </div>

                    <!-- Villes préférées -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <label for="cities" class="form-label fw-bold">Quelles sont les villes où souhaitez-vous étudier ?</label>
                        <input type="text" class="form-control" id="cities" name="cities" value="{{ $data['cities'] ?? '' }}" placeholder="Exemple : Casablanca, Rabat, Marrakech">
                        <small class="text-muted">Séparez les villes par une virgule si vous en avez plusieurs.</small>
                    </div>

                    <!-- Langues préférées -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <label class="form-label fw-bold">Quels sont les langues que vous préférez ?</label>
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" id="public_schools" value="public_schools" {{ (isset($data['services']) && in_array('public_schools', $data['services'])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="public_schools">Français</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" id="private_schools" value="private_schools" {{ (isset($data['services']) && in_array('private_schools', $data['services'])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="private_schools">Arabe</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" id="guidance" value="guidance" {{ (isset($data['services']) && in_array('guidance', $data['services'])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="guidance">Anglais</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" id="guidance" value="guidance" {{ (isset($data['services']) && in_array('guidance', $data['services'])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="guidance">Espagnol</label>
                            </div>
                        </div>
                    </div>
                @elseif($step == 5)
                    <h4 class="mb-4 text-primary fw-bold">Vos informations ?</h4>
                    <p class="text-muted mb-4">Remplissez vos informations pour personnaliser votre expérience sur notre plateforme !</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nom *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] ?? '' }}" required placeholder="Votre nom">
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom *</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $data['prenom'] ?? '' }}" required placeholder="Votre prénom">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail *</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $data['email'] ?? Auth::user()->email }}" required placeholder="Votre e-mail">
                        </div>
                        <div class="col-md-6">
                            <label for="school" class="form-label">Nom de votre établissement actuel</label>
                            <input type="text" class="form-control" id="school" name="school" value="{{ $data['school'] ?? '' }}" placeholder="Nom de l'établissement ici...">
                        </div>
                        <div class="col-md-6">
                            <label for="age" class="form-label">Âge *</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ $data['age'] ?? '' }}" required placeholder="Exemple : 17">
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">Votre ville *</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $data['city'] ?? '' }}" required placeholder="Sélectionnez votre ville...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Genre *</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="homme" value="homme" {{ (isset($data['gender']) && $data['gender']=='homme') ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="homme">Homme</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="femme" value="femme" {{ (isset($data['gender']) && $data['gender']=='femme') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="femme">Femme</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Type école *</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="school_type" id="prive" value="prive" {{ (isset($data['school_type']) && $data['school_type']=='prive') ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="prive">Privé</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="school_type" id="public" value="public" {{ (isset($data['school_type']) && $data['school_type']=='public') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="public">Public</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="bac_obtenu" class="form-label">As-tu obtenu ton Baccalauréat ? *</label>
                            <input type="text" class="form-control" id="bac_obtenu" name="bac_obtenu" value="{{ $data['bac_obtenu'] ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tuteur" class="form-label">Nom de votre Tuteur légal (Parents ou autres) *</label>
                            <input type="text" class="form-control" id="tuteur" name="tuteur" value="{{ $data['tuteur'] ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tuteur_phone" class="form-label">Téléphone de votre Tuteur légal (Parents ou autres)</label>
                            <input type="text" class="form-control" id="tuteur_phone" name="tuteur_phone" value="{{ $data['tuteur_phone'] ?? '' }}" placeholder="Téléphone de votre tuteur">
                        </div>
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    @if($step > 1)
                        <button type="submit" name="prev" value="1" class="btn btn-outline-secondary">Retour</button>
                    @else
                        <span></span>
                    @endif
                    <button type="submit" class="btn btn-success">
                        {{ $step == 5 ? 'Terminer' : 'Suivant' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection