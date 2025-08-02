@extends('layouts.app')
@section('title', 'Ecoles et universités')

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
                <h4 class="fw-bold">ÉCOLES ET UNIVERSITÉS</h4>
                <div>
                    <input type="text" id="searchEcoles" class="form-control" placeholder="Rechercher une école..." style="width: 300px;">
                </div>
            </div>

            <!-- Filtres par catégorie -->
            <div class="mb-4">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Toutes</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="ingenieur">Ingénierie</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="commerce">Commerce</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="sante">Santé</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="architecture">Architecture</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="technique">Technique</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="specialise">Spécialisé</button>
                </div>
            </div>

            <div class="mb-3 text-muted">Résultats: <span class="fw-bold" id="resultCount">0</span></div>
            
            <!-- Grille des écoles -->
            <div class="row g-4">
                @foreach([
                    [
                        'logo' => asset('images/ensa.png'),
                        'category' => 'ingenieur',
                        'name' => "ENSA - École Nationale des Sciences Appliquées",
                        'desc' => "Formation d'ingénieurs en sciences appliquées. Institution reconnue pour l'excellence académique et l'employabilité de ses diplômés.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "SM ≥12, PC ≥14.5, SVT/Tech ≥15"
                    ],
                    [
                        'logo' => asset('images/encg.png'),
                        'category' => 'commerce',
                        'name' => "ENCG - École Nationale de Commerce et de Gestion",
                        'desc' => "Formation en commerce et gestion. Institution reconnue pour son excellence dans la formation des cadres commerciaux et gestionnaires.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "SM/Eco ≥12, PC/SVT ≥14"
                    ],
                    [
                        'logo' => asset('images/ensam.png'),
                        'category' => 'ingenieur',
                        'name' => "ENSAM - École Nationale Supérieure d'Arts et Métiers",
                        'desc' => "Formation d'ingénieurs en arts et métiers. Institution avant-gardiste dans la formation des ingénieurs spécialisés.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "SM/Tech ≥12.25, PC/SVT/Pro ≥16.25"
                    ],
                    [
                        'logo' => asset('images/ena.png'),
                        'category' => 'architecture',
                        'name' => "ENA - École Nationale d'Architecture",
                        'desc' => "Formation en architecture. École d'excellence dans la formation des architectes et urbanistes de demain.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Rabat: 14.36, Tétouan: 14.45, Oujda: 13.95"
                    ],
                    [
                        'logo' => asset('images/fmpc.png'),
                        'category' => 'sante',
                        'name' => "FMP - Faculté de Médecine et Pharmacie",
                        'desc' => "Formation en médecine, pharmacie et médecine dentaire. Institution reconnue pour l'excellence de sa formation médicale.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "≈12/20 (75% national + 25% régional)"
                    ],
                    [
                        'logo' => asset('images/ispits.png'),
                        'category' => 'sante',
                        'name' => "ISPITS - Instituts Supérieurs des Professions Infirmières et Techniques de Santé",
                        'desc' => "Formation paramédicale. Institution dédiée à la formation des professionnels de santé paramédicaux.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/isit.png'),
                        'category' => 'specialise',
                        'name' => "ISIT - Institut Supérieur International de Tourisme",
                        'desc' => "Formation en tourisme international. Institution spécialisée dans la formation des professionnels du tourisme.",
                        'type' => "Public",
                        'universite' => "Université Abdelmalek Essaâdi",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/isic.png'),
                        'category' => 'specialise',
                        'name' => "ISIC - Institut Supérieur de l'Information et de la Communication",
                        'desc' => "Formation en information et communication. Institution reconnue pour l'excellence de sa formation en communication.",
                        'type' => "Public",
                        'universite' => "Université Mohammed V",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/ismac.png'),
                        'category' => 'specialise',
                        'name' => "ISMAC - Institut Supérieur des Métiers de l'Audiovisuel et du Cinéma",
                        'desc' => "Formation en audiovisuel et cinéma. Institution spécialisée dans la formation des professionnels de l'audiovisuel.",
                        'type' => "Public",
                        'universite' => "Université Mohammed V",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/inau.png'),
                        'category' => 'architecture',
                        'name' => "INAU - Institut National d'Aménagement et d'Urbanisme",
                        'desc' => "Formation en urbanisme et aménagement. Institution d'excellence dans la formation des urbanistes.",
                        'type' => "Public",
                        'universite' => "Université Mohammed V",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/istp.png'),
                        'category' => 'technique',
                        'name' => "ISTP - Institut Supérieur des Travaux Publics",
                        'desc' => "Formation en travaux publics. Institution spécialisée dans la formation des techniciens des travaux publics.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/ensck.png'),
                        'category' => 'technique',
                        'name' => "ENSCK - École Nationale Supérieure de Chimie de Kénitra",
                        'desc' => "Formation en chimie. Institution reconnue pour l'excellence de sa formation en sciences chimiques.",
                        'type' => "Public",
                        'universite' => "Université Ibn Tofail",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/iss.png'),
                        'category' => 'specialise',
                        'name' => "ISS - Institut des Sciences du Sport",
                        'desc' => "Formation en sciences du sport. Institution spécialisée dans la formation des professionnels du sport.",
                        'type' => "Public",
                        'universite' => "Université Sidi Mohammed Ben Abdellah",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/ims.png'),
                        'category' => 'specialise',
                        'name' => "IMS - Institut des Métiers du Sport",
                        'desc' => "Formation en métiers du sport. Institution dédiée à la formation des professionnels du sport et de l'animation.",
                        'type' => "Public",
                        'universite' => "Université Ibn Tofail",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/imm.png'),
                        'category' => 'technique',
                        'name' => "IMM - Institut des Mines de Marrakech",
                        'desc' => "Formation en mines. Institution spécialisée dans la formation des techniciens des mines et géologie.",
                        'type' => "Public",
                        'universite' => "Université Cadi Ayyad",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/est.png'),
                        'category' => 'technique',
                        'name' => "EST - École Supérieure de Technologie",
                        'desc' => "Formation technique (DUT). Institution reconnue pour la qualité de sa formation technique et technologique.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Variables selon région"
                    ],
                    [
                        'logo' => asset('images/fst.png'),
                        'category' => 'technique',
                        'name' => "FST - Faculté des Sciences et Techniques",
                        'desc' => "Formation en sciences et techniques. Institution d'excellence dans la formation scientifique et technique.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Variables selon spécialité"
                    ],
                    [
                        'logo' => asset('images/ens.png'),
                        'category' => 'specialise',
                        'name' => "ENS - École Normale Supérieure",
                        'desc' => "Formation des enseignants. Institution d'excellence dans la formation des futurs enseignants et formateurs.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/ensad.png'),
                        'category' => 'specialise',
                        'name' => "ENSAD - École Nationale Supérieure des Arts et du Design",
                        'desc' => "Formation en arts et design. Institution reconnue pour l'excellence de sa formation artistique et créative.",
                        'type' => "Public",
                        'universite' => "Université Hassan II",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/iav.png'),
                        'category' => 'ingenieur',
                        'name' => "IAV Hassan II - Institut Agronomique et Vétérinaire",
                        'desc' => "Formation en agronomie et médecine vétérinaire. Institution d'excellence dans les sciences agronomiques et vétérinaires.",
                        'type' => "Public",
                        'universite' => "Université Mohammed V",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/iscae.png'),
                        'category' => 'commerce',
                        'name' => "ISCAE Casablanca - Institut Supérieur de Commerce et d'Administration",
                        'desc' => "Formation en commerce et administration. Institution reconnue pour l'excellence de sa formation en commerce et gestion.",
                        'type' => "Public",
                        'universite' => "Université Hassan II",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/enam.png'),
                        'category' => 'ingenieur',
                        'name' => "ENAM - École Nationale d'Agriculture de Meknès",
                        'desc' => "Formation en agriculture et sciences agronomiques. Institution d'excellence dans la formation des ingénieurs agronomes.",
                        'type' => "Public",
                        'universite' => "Université Moulay Ismail",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/fmpc.png'),
                        'category' => 'sante',
                        'name' => "FMD - Faculté de Médecine Dentaire",
                        'desc' => "Formation en médecine dentaire. Institution reconnue pour l'excellence de sa formation en odontologie.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/fmpc.png'),
                        'category' => 'sante',
                        'name' => "Faculté de Pharmacie",
                        'desc' => "Formation en pharmacie. Institution d'excellence dans la formation des pharmaciens.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/cpge.png'),
                        'category' => 'ingenieur',
                        'name' => "CPGE - Classes Préparatoires aux Grandes Écoles",
                        'desc' => "Formation préparatoire aux grandes écoles d'ingénieurs. Institution d'excellence pour la préparation aux concours.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/bts.png'),
                        'category' => 'technique',
                        'name' => "BTS - Brevet de Technicien Supérieur",
                        'desc' => "Formation technique de niveau bac+2. Institution spécialisée dans la formation technique et professionnelle.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/isss.png'),
                        'category' => 'sante',
                        'name' => "ISSS - Institut Supérieur des Sciences de la Santé",
                        'desc' => "Formation en sciences de la santé. Institution spécialisée dans la formation des professionnels de santé.",
                        'type' => "Public",
                        'universite' => "Université Hassan Premier",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/ispm.png'),
                        'category' => 'specialise',
                        'name' => "ISPM - Institut Supérieur des Pêches Maritimes",
                        'desc' => "Formation en pêches maritimes. Institution spécialisée dans la formation des professionnels de la pêche.",
                        'type' => "Public",
                        'universite' => "Université Ibn Zohr",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/iftsau.png'),
                        'category' => 'architecture',
                        'name' => "IFTSAU - Institut de Formation aux Technologies de l'Urbanisme et de l'Architecture",
                        'desc' => "Formation en urbanisme et architecture technologique. Institution spécialisée dans l'aménagement urbain.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/imt.png'),
                        'category' => 'technique',
                        'name' => "IMT - Institut des Mines de Touissit",
                        'desc' => "Formation en mines et géologie. Institution spécialisée dans la formation des techniciens des mines.",
                        'type' => "Public",
                        'universite' => "Université Mohammed Premier",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/ifmbtp.png'),
                        'category' => 'technique',
                        'name' => "IFMBTP - Institut de Formation aux Métiers du BTP",
                        'desc' => "Formation en bâtiment et travaux publics. Institution spécialisée dans la formation des techniciens du BTP.",
                        'type' => "Public",
                        'universite' => "Université Sidi Mohammed Ben Abdellah",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/istaht.png'),
                        'category' => 'specialise',
                        'name' => "ISTAHT - Institut Supérieur de Technologie Hôtelière et Touristique",
                        'desc' => "Formation en hôtellerie et tourisme. Institution spécialisée dans la formation des professionnels de l'hôtellerie.",
                        'type' => "Public",
                        'universite' => "Multiples universités",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/inas.png'),
                        'category' => 'specialise',
                        'name' => "INAS - Institut National de l'Action Sociale",
                        'desc' => "Formation en action sociale. Institution spécialisée dans la formation des travailleurs sociaux.",
                        'type' => "Public",
                        'universite' => "Université Abdelmalek Essaâdi",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/lydex.png'),
                        'category' => 'specialise',
                        'name' => "LYDEX - Lycée d'Excellence",
                        'desc' => "Formation d'excellence pour les lycéens. Institution d'élite dans la formation secondaire.",
                        'type' => "Public",
                        'universite' => "Sans université",
                        'frais' => "Gratuit",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/fgses.png'),
                        'category' => 'commerce',
                        'name' => "FGSES - Faculté de Gouvernance, Économie et Sciences Sociales",
                        'desc' => "Formation en gouvernance, économie et sciences sociales. Institution d'excellence de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/gti.png'),
                        'category' => 'ingenieur',
                        'name' => "GTI - Green Tech Institute",
                        'desc' => "Formation en technologies vertes et durables. Institution innovante de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/um6p.png'),
                        'category' => 'sante',
                        'name' => "FMS - Faculté de Médecine et Sciences de la Santé",
                        'desc' => "Formation en médecine et sciences de la santé. Institution d'excellence médicale de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/um6p.png'),
                        'category' => 'sante',
                        'name' => "ISSB-P - Institut Supérieur des Sciences Biomédicales et Paramédicales",
                        'desc' => "Formation en sciences biomédicales et paramédicales. Institution spécialisée de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/um6p.png'),
                        'category' => 'commerce',
                        'name' => "SHBM - School of Hospitality Business and Management",
                        'desc' => "Formation en hôtellerie et management. Institution d'excellence hôtelière de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/um6p.png'),
                        'category' => 'ingenieur',
                        'name' => "EMINES - École des Mines Industrielles",
                        'desc' => "Formation en management industriel. Institution d'excellence en ingénierie de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/um6p.png'),
                        'category' => 'ingenieur',
                        'name' => "CS - Computer Science School",
                        'desc' => "Formation en informatique et sciences informatiques. Institution d'excellence en informatique de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/um6p.png'),
                        'category' => 'architecture',
                        'name' => "SAP+D - School of Architecture, Planning and Design",
                        'desc' => "Formation en architecture, urbanisme et design. Institution d'excellence architecturale de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ],
                    [
                        'logo' => asset('images/um6p.png'),
                        'category' => 'ingenieur',
                        'name' => "IST&I - Institut des Sciences, Technologies et Innovation",
                        'desc' => "Formation en sciences, technologies et innovation. Institution innovante de l'UM6P.",
                        'type' => "Semi-public",
                        'universite' => "UM6P - Université Mohammed VI Polytechnique",
                        'frais' => "Payant",
                        'seuils' => "Non publiés"
                    ]
                ] as $ecole)
                <div class="col-md-6 col-lg-4 ecole-item" data-category="{{ $ecole['category'] }}">
                    <div class="card shadow-sm h-100">
                        <div class="card-body position-relative">
                            <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle favorite-btn" 
                                    title="{{ in_array($ecole['name'], $userFavorites ?? []) ? 'Retirer des favoris' : 'Ajouter aux favoris' }}" 
                                    data-type="ecole"
                                    data-item-id="{{ $ecole['name'] }}"
                                    data-item-name="{{ $ecole['name'] }}"
                                    data-item-category="{{ $ecole['category'] }}"
                                    data-item-description="{{ $ecole['desc'] }}">
                                <svg width="20" height="20" fill="{{ in_array($ecole['name'], $userFavorites ?? []) ? '#dc3545' : '#6c757d' }}" class="{{ in_array($ecole['name'], $userFavorites ?? []) ? 'text-danger' : 'text-secondary' }}" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                            </button>
                            <div class="mb-3 text-center">
                                <img src="{{ $ecole['logo'] }}" alt="Logo école" style="max-height: 50px;">
                            </div>
                            <h5 class="card-title fw-bold">{{ $ecole['name'] }}</h5>
                            <p class="card-text text-muted small">{{ $ecole['desc'] }}</p>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-5 text-muted small">
                                    <i class="fas fa-key me-1"></i>Type :
                                </div>
                                <div class="col-7 text-end"><span class="badge bg-light text-primary">{{ $ecole['type'] }}</span></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted small">
                                    <i class="fas fa-building me-1"></i>Université :
                                </div>
                                <div class="col-7 text-end"><span class="badge bg-light text-secondary">{{ $ecole['universite'] }}</span></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 text-muted small">
                                    <i class="fas fa-gem me-1"></i>Frais :
                                </div>
                                <div class="col-7 text-end"><span class="badge bg-light text-warning">{{ $ecole['frais'] }}</span></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-5 text-muted small">
                                    <i class="fas fa-chart-line me-1"></i>Seuils :
                                </div>
                                <div class="col-7 text-end">
                                    <span class="badge bg-light text-info">{{ $ecole['seuils'] }}</span>
                                    <i class="fas fa-chevron-down ms-1 text-muted"></i>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary w-100">En savoir plus</a>
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
    const ecoleItems = document.querySelectorAll('.ecole-item');
    const searchInput = document.getElementById('searchEcoles');
    const resultCount = document.getElementById('resultCount');

    // Fonction de filtrage par catégorie
    function filterByCategory(category) {
        let visibleCount = 0;
        ecoleItems.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        resultCount.textContent = visibleCount;
    }

    // Fonction de recherche
    function searchEcoles(searchTerm) {
        const searchLower = searchTerm.toLowerCase();
        let visibleCount = 0;
        
        ecoleItems.forEach(item => {
            const card = item.querySelector('.card');
            const text = card.textContent.toLowerCase();
            
            if (text.includes(searchLower)) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        resultCount.textContent = visibleCount;
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
        
        if (searchTerm === '') {
            const activeFilter = document.querySelector('[data-filter].active');
            const filter = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
            filterByCategory(filter);
        } else {
            searchEcoles(searchTerm);
        }
    });

    // Initialiser le compteur
    filterByCategory('all');

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