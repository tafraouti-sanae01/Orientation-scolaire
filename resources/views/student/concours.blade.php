@extends('layouts.app')
@section('title', 'Concours')

@section('content')
<div class="container-fluid" style="background: #f8f9fb; min-height: 100vh;">
    <div class="row">
        <!-- Menu latéral -->
        <div class="col-md-2 d-none d-md-block bg-white shadow-sm p-0" style="min-height: 100vh;">
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active text-primary' : '' }}" href="{{ route('dashboard') }}">Mon Plan Tawjih</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.ecoles') ? 'active text-primary' : '' }}" href="{{ route('student.ecoles') }}">Ecoles et universités</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.concours') ? 'active text-primary' : '' }}" href="{{ route('student.concours') }}">Concours</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.profil') ? 'active text-primary' : '' }}" href="{{ route('student.profil') }}">Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('student.parametres') ? 'active text-primary' : '' }}" href="{{ route('student.parametres') }}">Paramètres</a></li>
            </ul>
        </div>
        <!-- Contenu principal -->
        <div class="col-md-10 px-4 py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold">CONCOURS 2025</h4>
                <div>
                    <input type="text" id="searchConcours" class="form-control" placeholder="Rechercher un concours..." style="width: 300px;">
                </div>
            </div>

            <!-- Filtres par catégorie -->
            <div class="mb-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Tous</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="ingenieur">Ingénierie</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="commerce">Commerce</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="sante">Santé</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="education">Éducation</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="formation">Formation Professionnelle</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="specialise">Instituts Spécialisés</button>
                </div>
            </div>
            
            <!-- Grille des concours -->
            <div class="row g-4">
                @foreach([
                    [
                        'name' => 'CNC - Grandes Écoles d\'Ingénieurs',
                        'category' => 'ingenieur',
                        'inscription' => '20 juin - 10 juillet 2025',
                        'epreuve' => 'Mai 2025',
                        'description' => 'Concours National Commun - Réservé aux bacheliers de classes préparatoires (MP, TSI, PSI...)',
                        'filières' => 'EMI, ENSIAS, ENSEM, IAV, INPT, INSEA, ENSA...',
                        'places' => '185 MP, 44 TSI, 37 PSI (ENSIAS)',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Classes préparatoires MP, TSI, PSI',
                        'site' => 'amci.ma'
                    ],
                    [
                        'name' => 'ENCG - Écoles Nationales de Commerce et de Gestion',
                        'category' => 'commerce',
                        'inscription' => '20 juin - 10 juillet 2025',
                        'epreuve' => '21 juillet 2025',
                        'description' => 'Test écrit TAFEM - Présélection (75% bac national + 25% régional)',
                        'filières' => 'Management, Commerce, Gestion',
                        'places' => 'Variable selon l\'école',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac séries économiques, gestion ou scientifiques avec mention TB ou B (~14/20)',
                        'site' => 'cursussup.gov.ma'
                    ],
                    [
                        'name' => 'ENSA - Réseau des Écoles Nationales des Sciences Appliquées',
                        'category' => 'ingenieur',
                        'inscription' => '20 juin - 10 juillet 2025',
                        'epreuve' => '22 juillet 2025',
                        'description' => 'Présélection le 17 juillet, résultats le 25 juillet',
                        'filières' => 'Génie Informatique, Génie Civil, Génie Industriel...',
                        'places' => '200-320 étudiants selon la ville',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac scientifique',
                        'site' => 'cursussup.gov.ma'
                    ],
                    [
                        'name' => 'ENSAM - Écoles Nationales Supérieures d\'Arts et Métiers',
                        'category' => 'ingenieur',
                        'inscription' => '20 juin - 10 juillet 2025',
                        'epreuve' => '23 juillet 2025',
                        'description' => 'Écrit le 23 juillet, résultats le 26 juillet',
                        'filières' => 'Arts et Métiers, Ingénierie',
                        'places' => 'Variable selon l\'établissement',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac scientifique, technique ou professionnel',
                        'site' => 'Médias24'
                    ],
                    [
                        'name' => 'ENA - Écoles Nationales d\'Architecture',
                        'category' => 'ingenieur',
                        'inscription' => 'Jusqu\'au 15 juillet 2025',
                        'epreuve' => '27 juillet 2025',
                        'description' => 'Sélection sur dossier + épreuves écrites',
                        'filières' => 'Architecture',
                        'places' => 'Variable selon l\'école',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac toutes séries',
                        'site' => 'amci.ma'
                    ],
                    [
                        'name' => 'Médecine, Pharmacie, Médecine Dentaire',
                        'category' => 'sante',
                        'inscription' => '20 juin - 10 juillet 2025',
                        'epreuve' => '19 juillet 2025',
                        'description' => 'Écrit prévu le 19 juillet, résultats le 22 juillet',
                        'filières' => 'Médecine, Pharmacie, Médecine Dentaire',
                        'places' => 'Variable selon la filière',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Seuil bac minimum : 12-13/20 selon filière',
                        'site' => 'cursussup.gov.ma'
                    ],
                    [
                        'name' => 'IAV Hassan II - Cycle APESA',
                        'category' => 'ingenieur',
                        'inscription' => 'Jusqu\'au 11 juillet 2025',
                        'epreuve' => '20 juillet 2025',
                        'description' => 'Concours pour l\'année préparatoire APESA',
                        'filières' => 'Sciences Agronomiques',
                        'places' => 'Variable',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac en sciences/exactes/agrico',
                        'site' => 'Postbac'
                    ],
                    [
                        'name' => 'ISIC Rabat - Communication & Information',
                        'category' => 'specialise',
                        'inscription' => 'Jusqu\'au 13 juillet 2025',
                        'epreuve' => 'Septembre 2025',
                        'description' => 'Concours écrit et entretien en septembre',
                        'filières' => 'Communication, Information',
                        'places' => 'Variable',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac toutes séries',
                        'site' => 'amci.ma'
                    ],
                    [
                        'name' => 'ISADAC Rabat - Art Dramatique',
                        'category' => 'specialise',
                        'inscription' => 'Jusqu\'au 18 juillet 2025',
                        'epreuve' => 'Juillet 2025',
                        'description' => 'Concours écrit + portfolio + entretien oral',
                        'filières' => 'Art Dramatique',
                        'places' => 'Variable',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac toutes séries',
                        'site' => 'Postbac'
                    ],
                    [
                        'name' => 'ISMAC Rabat - Audiovisuel / Cinéma',
                        'category' => 'specialise',
                        'inscription' => 'Jusqu\'au 30 juin 2025',
                        'epreuve' => 'Juillet 2025',
                        'description' => 'Écrit + entretien',
                        'filières' => 'Audiovisuel, Cinéma',
                        'places' => 'Variable',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac toutes séries',
                        'site' => 'Postbac'
                    ],
                    [
                        'name' => 'IFMEREE - Énergies Renouvelables',
                        'category' => 'specialise',
                        'inscription' => 'Juin 2025',
                        'epreuve' => 'Fin juillet 2025',
                        'description' => 'Préinscription en juin, concours fin juillet',
                        'filières' => 'Énergies Renouvelables',
                        'places' => 'Variable',
                        'status' => 'Bientôt',
                        'color' => 'warning',
                        'conditions' => 'Bac scientifique',
                        'site' => 'Laformation'
                    ],
                    [
                        'name' => 'IFMBTP - Institut de Formation aux Métiers du BTP',
                        'category' => 'specialise',
                        'inscription' => 'Juillet 2025',
                        'epreuve' => 'Fin juillet 2025',
                        'description' => 'Sélection sur dossier + entretien oral, parfois test écrit',
                        'filières' => 'Bâtiment et Travaux Publics',
                        'places' => 'Variable selon l\'institut',
                        'status' => 'Bientôt',
                        'color' => 'warning',
                        'conditions' => 'Bac scientifique ou technique',
                        'site' => 'Postbac'
                    ],
                    [
                        'name' => 'IFMIA - Institut de Formation aux Métiers de l\'Industrie Automobile',
                        'category' => 'specialise',
                        'inscription' => 'Juillet 2025',
                        'epreuve' => 'Fin juillet 2025',
                        'description' => 'Sélection sur dossier + entretien oral, parfois test écrit',
                        'filières' => 'Industrie Automobile, Mécanique',
                        'places' => 'Variable selon l\'institut',
                        'status' => 'Bientôt',
                        'color' => 'warning',
                        'conditions' => 'Bac scientifique ou technique',
                        'site' => 'Postbac'
                    ],
                    [
                        'name' => 'IFTSAU - Institut de Formation aux Technologies de l\'Information',
                        'category' => 'specialise',
                        'inscription' => 'Juillet 2025',
                        'epreuve' => 'Fin juillet 2025',
                        'description' => 'Sélection sur dossier + entretien oral, parfois test écrit',
                        'filières' => 'Technologies de l\'Information, Informatique',
                        'places' => 'Variable selon l\'institut',
                        'status' => 'Bientôt',
                        'color' => 'warning',
                        'conditions' => 'Bac scientifique',
                        'site' => 'Postbac'
                    ],
                    [
                        'name' => 'ENS - Écoles Normales Supérieures',
                        'category' => 'education',
                        'inscription' => '29 juillet - 23 août 2025',
                        'epreuve' => '8-13 septembre 2025',
                        'description' => 'Licence en Éducation - Formation des enseignants primaire et secondaire',
                        'filières' => 'Éducation, Enseignement, Pédagogie',
                        'places' => 'Variable selon l\'ENS',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac 2025 ou 2024, âge ≤ 21 ans au 31/12/2025',
                        'site' => 'cursussup.gov.ma'
                    ],
                    [
                        'name' => 'ISPITS - Instituts Supérieurs des Professions Infirmières et Techniques de Santé',
                        'category' => 'sante',
                        'inscription' => 'Juillet 2025',
                        'epreuve' => '20-21 septembre 2025',
                        'description' => 'Concours national pour cycle licence - Ministère de la Santé',
                        'filières' => 'Infirmier, Orthophonie, Psychomotricité, Assistant Social',
                        'places' => '8600 places total',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Bac scientifique (orthophonie, psychomotricité, assistant social : aussi bac lettres modernes)',
                        'site' => 'ispits.sante.gov.ma'
                    ],
                    [
                        'name' => 'OFPPT - Office de la Formation Professionnelle et de la Promotion du Travail',
                        'category' => 'formation',
                        'inscription' => '5 mai - 29 juillet 2025',
                        'epreuve' => 'Test psychotechnique (selon niveau)',
                        'description' => 'Formation professionnelle publique - 4 niveaux : Spécialisation, Qualification, Technicien, Technicien Spécialisé',
                        'filières' => 'Métiers diversifiés, IFMSAS (santé), IFMIA, ISTA, INSTA...',
                        'places' => '414 800 places pédagogiques (275 000 en 1ère année)',
                        'status' => 'Ouvert',
                        'color' => 'success',
                        'conditions' => 'Niveau primaire à Bac selon formation, âge ≤ 30 ans, Bac ≥ 12/20 = admission directe',
                        'site' => 'myway.ac.ma'
                    ]
                ] as $concours)
                <div class="col-md-6 col-lg-4 concours-item" data-category="{{ $concours['category'] }}">
                    <div class="card shadow-sm h-100">
                        <div class="card-body position-relative">
                            <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle favorite-btn" 
                                    title="{{ in_array($concours['name'], $userFavorites ?? []) ? 'Retirer des favoris' : 'Ajouter aux favoris' }}" 
                                    data-type="concours"
                                    data-item-id="{{ $concours['name'] }}"
                                    data-item-name="{{ $concours['name'] }}"
                                    data-item-category="{{ $concours['category'] }}"
                                    data-item-description="{{ $concours['description'] }}">
                                <svg width="20" height="20" fill="{{ in_array($concours['name'], $userFavorites ?? []) ? '#dc3545' : '#6c757d' }}" class="{{ in_array($concours['name'], $userFavorites ?? []) ? 'text-danger' : 'text-secondary' }}" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            </button>
                            <h6 class="fw-bold text-primary mb-3">{{ $concours['name'] }}</h6>
                            <p class="card-text text-muted small mb-3">{{ $concours['description'] }}</p>
                            
                            <div class="row mb-3">
                                <div class="col-6">
                                    <div class="fw-bold text-success">{{ $concours['inscription'] }}</div>
                                    <div class="small text-muted">Inscriptions</div>
                                </div>
                                <div class="col-6">
                                    <div class="fw-bold text-warning">{{ $concours['epreuve'] }}</div>
                                    <div class="small text-muted">Épreuves</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <strong class="text-primary">Filières :</strong>
                                <div class="small text-muted">{{ $concours['filières'] }}</div>
                            </div>

                            <div class="mb-3">
                                <strong class="text-success">Places :</strong>
                                <div class="small text-muted">{{ $concours['places'] }}</div>
                            </div>

                                <div class="mb-3">
                                <strong class="text-info">Conditions :</strong>
                                <div class="small text-muted">{{ $concours['conditions'] }}</div>
                                </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Site : 
                                    @if($concours['site'] == 'amci.ma')
                                        <a href="https://www.amci.ma" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @elseif($concours['site'] == 'cursussup.gov.ma')
                                        <a href="https://www.cursussup.gov.ma" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @elseif($concours['site'] == 'dates-concours.ma')
                                        <a href="https://www.dates-concours.ma" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @elseif($concours['site'] == 'Médias24')
                                        <a href="https://www.medias24.com" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @elseif($concours['site'] == 'Postbac')
                                        <a href="https://www.postbac.ma" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @elseif($concours['site'] == 'Laformation')
                                        <a href="https://www.laformation.ma" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @elseif($concours['site'] == 'Université Cadi Ayyad')
                                        <a href="https://www.uca.ma" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @elseif($concours['site'] == 'ispits.sante.gov.ma')
                                        <a href="https://www.ispits.sante.gov.ma" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @elseif($concours['site'] == 'myway.ac.ma')
                                        <a href="https://www.myway.ac.ma/fr" target="_blank" class="text-primary">{{ $concours['site'] }}</a>
                                    @else
                                        <span class="text-muted">{{ $concours['site'] }}</span>
                            @endif
                                </small>
                                <a href="#" class="btn btn-outline-primary btn-sm">Plus d'infos</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('[data-filter]');
    const concoursItems = document.querySelectorAll('.concours-item');
    const searchInput = document.getElementById('searchConcours');

    // Fonction de filtrage par catégorie
    function filterByCategory(category) {
        concoursItems.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Fonction de recherche
    function searchConcours(searchTerm) {
        const searchLower = searchTerm.toLowerCase();
        
        concoursItems.forEach(item => {
            const card = item.querySelector('.card');
            const text = card.textContent.toLowerCase();
            
            if (text.includes(searchLower)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Événements pour les filtres par catégorie
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Mettre à jour les boutons actifs
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Réinitialiser la recherche
            searchInput.value = '';
            
            // Appliquer le filtre
            filterByCategory(filter);
        });
    });

    // Événement pour la recherche
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.trim();
        
        // Si la recherche est vide, afficher tous les éléments de la catégorie active
        if (searchTerm === '') {
            const activeFilter = document.querySelector('[data-filter].active');
            const filter = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
            filterByCategory(filter);
        } else {
            // Sinon, rechercher dans tous les éléments
            searchConcours(searchTerm);
        }
    });

    // Recherche en temps réel avec délai
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            const searchTerm = this.value.trim();
            
            if (searchTerm === '') {
                const activeFilter = document.querySelector('[data-filter].active');
                const filter = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
                filterByCategory(filter);
            } else {
                searchConcours(searchTerm);
            }
        }, 300);
    });

    // Gestion des favoris
    const favoriteButtons = document.querySelectorAll('.favorite-btn');
    
    favoriteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const type = this.getAttribute('data-type');
            const itemId = this.getAttribute('data-item-id');
            const itemName = this.getAttribute('data-item-name');
            const itemCategory = this.getAttribute('data-item-category');
            const itemDescription = this.getAttribute('data-item-description');
            
            // Envoyer la requête AJAX
            fetch('/favorites/toggle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    type: type,
                    item_id: itemId,
                    item_name: itemName,
                    item_category: itemCategory,
                    item_description: itemDescription
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'added') {
                    this.querySelector('svg').style.fill = '#dc3545';
                    this.title = 'Retirer des favoris';
                    // Recharger la page pour mettre à jour le dashboard
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                } else {
                    this.querySelector('svg').style.fill = '#6c757d';
                    this.title = 'Ajouter aux favoris';
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        });
    });
});
</script>
@endsection 