# 🎓 Plateforme d'Orientation Scolaire Marocaine

<p align="center">
  <img src="public/images/logo.jpg" alt="Orientation Scolaire Logo" width="200">
</p>

<p align="center">
  <strong>L'orientation scolaire 100% marocaine</strong><br>
  Trouve ta voie après le Bac !
</p>

<p align="center">
  <a href="#fonctionnalités">Fonctionnalités</a> •
  <a href="#installation">Installation</a> •
  <a href="#utilisation">Utilisation</a> •
  <a href="#technologies">Technologies</a> •
  <a href="#contribution">Contribution</a>
</p>

---

## 📋 À propos du projet

Cette plateforme web est dédiée à l'orientation des étudiants marocains après l'obtention du baccalauréat. Elle permet aux étudiants de découvrir les filières et écoles qui correspondent le mieux à leurs aspirations, leurs résultats scolaires et leurs centres d'intérêt.

### 🎯 Objectifs

- **Simplifier l'orientation** : Aider les bacheliers à faire des choix éclairés
- **Centraliser l'information** : Regrouper toutes les informations sur les écoles et concours
- **Personnaliser les recommandations** : Proposer des options adaptées au profil de chaque étudiant
- **Faciliter la recherche** : Interface intuitive et recherche avancée

## ✨ Fonctionnalités

### 👨‍🎓 Pour les étudiants
- **Profil personnalisé** : Création et gestion d'un profil détaillé
- **Découverte d'écoles** : Exploration de plus de 200 établissements
- **Concours** : Consultation des concours disponibles avec dates et conditions
- **Écoles étrangères** : Découverte d'opportunités internationales
- **Système de favoris** : Sauvegarde des options préférées
- **Recommandations** : Suggestions personnalisées basées sur le profil

### 👨‍💼 Pour les administrateurs
- **Gestion des étudiants** : Administration des comptes utilisateurs
- **Gestion des écoles** : Ajout, modification et suppression d'établissements
- **Gestion des concours** : Administration des concours et échéances
- **Statistiques** : Tableaux de bord et analyses

## 🎮 Utilisation

### Pour les étudiants
1. **Inscription** : Créer un compte sur la plateforme
2. **Profil** : Compléter son profil avec ses informations et centres d'intérêt
3. **Exploration** : Découvrir les écoles et concours recommandés
4. **Favoris** : Sauvegarder les options qui vous intéressent
5. **Décision** : Comparer et choisir votre orientation

### Pour les administrateurs
1. **Connexion** : Accéder à l'interface d'administration
2. **Gestion** : Administrer les étudiants, écoles et concours
3. **Statistiques** : Consulter les tableaux de bord

## 🛠 Technologies utilisées

### Backend
- **Laravel 12** : Framework PHP moderne
- **Authentication** : Système d'authentification intégré
- **Migrations** : Gestion des schémas de base de données

### Frontend
- **Blade Templates** : Moteur de templates Laravel
- **Bootstrap 5** : Framework CSS
- **Tailwind CSS** : Framework CSS utilitaire
- **Alpine.js** : Framework JavaScript léger
- **Vite** : Build tool moderne

## 📊 Structure du projet

```
orientation-scolaire/
├── app/
│   ├── Http/Controllers/     # Contrôleurs
│   ├── Models/              # Modèles Eloquent
│   └── View/Components/     # Composants Blade
├── database/
│   ├── migrations/          # Migrations de base de données
│   ├── seeders/            # Seeders pour les données de test
│   └── factories/          # Factories pour les tests
├── resources/
│   ├── views/              # Templates Blade
│   ├── css/               # Styles CSS
│   └── js/                # JavaScript
├── public/
│   └── images/            # Images et assets
└── tests/                 # Tests automatisés
```

<p align="center">
  <strong>Fait avec ❤️ pour les étudiants marocains</strong>
</p>
