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

## 🚀 Installation

### Prérequis
- PHP 8.2 ou supérieur
- Composer
- Node.js et npm
- SQLite (ou MySQL/PostgreSQL)

### Étapes d'installation

1. **Cloner le repository**
   ```bash
   git clone https://github.com/votre-username/orientation-scolaire.git
   cd orientation-scolaire
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

4. **Configuration de l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configuration de la base de données**
   ```bash
   # Pour SQLite (recommandé pour le développement)
   touch database/database.sqlite
   
   # Ou configurer MySQL/PostgreSQL dans le fichier .env
   ```

6. **Exécuter les migrations et seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Compiler les assets**
   ```bash
   npm run build
   # ou pour le développement
   npm run dev
   ```

8. **Lancer le serveur**
   ```bash
   php artisan serve
   ```

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
- **Eloquent ORM** : Gestion de base de données
- **Authentication** : Système d'authentification intégré
- **Migrations** : Gestion des schémas de base de données

### Frontend
- **Blade Templates** : Moteur de templates Laravel
- **Bootstrap 5** : Framework CSS
- **Tailwind CSS** : Framework CSS utilitaire
- **Alpine.js** : Framework JavaScript léger
- **Vite** : Build tool moderne

### Base de données
- **SQLite** : Base de données par défaut
- **MySQL/PostgreSQL** : Support pour bases de données relationnelles

### Outils de développement
- **Pest** : Framework de tests PHP
- **Laravel Pint** : Code style fixer
- **Laravel Pail** : Monitoring des logs

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

## 🧪 Tests

Exécuter les tests :
```bash
php artisan test
```

## 📈 Fonctionnalités à venir

- [ ] Système de messagerie entre étudiants
- [ ] Forum de discussion
- [ ] Tests d'orientation automatisés
- [ ] Application mobile
- [ ] Intégration avec les plateformes d'inscription
- [ ] Système de notifications push

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Fork le projet
2. Créer une branche pour votre fonctionnalité (`git checkout -b feature/nouvelle-fonctionnalite`)
3. Commit vos changements (`git commit -m 'Ajouter une nouvelle fonctionnalité'`)
4. Push vers la branche (`git push origin feature/nouvelle-fonctionnalite`)
5. Ouvrir une Pull Request

## 📝 Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 📞 Support

Pour toute question ou problème :
- Ouvrir une [issue](https://github.com/votre-username/orientation-scolaire/issues)
- Contacter l'équipe de développement

## 🙏 Remerciements

- Laravel Framework
- Bootstrap et Tailwind CSS
- Tous les contributeurs du projet

---

<p align="center">
  <strong>Fait avec ❤️ pour les étudiants marocains</strong>
</p>
