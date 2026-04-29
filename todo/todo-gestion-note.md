
## ✅ TODO Détaillé — Développement CI4

### 🏗️ 1. Configuration du projet

- [ ] Configurer `.env` : base de données, baseURL, environment
- [ ] Configurer `app/Config/Database.php`
- [ ] Configurer `app/Config/App.php` (baseURL, indexPage = '')
- [ ] Configurer `.htaccess` pour supprimer `index.php` de l'URL
- [ ] Vérifier la connexion BDD avec `db:table` en CLI

---

### 🔐 2. Authentification

**Filtre**
- [ ] Créer `app/Filters/AuthFilter.php` — redirige vers `/login` si pas de session
- [ ] Enregistrer le filtre dans `app/Config/Filters.php`

**Modèle**
- [ ] Créer `app/Models/UserModel.php`
  - [ ] `findByUsername($username)` → retourne l'user ou null

**Contrôleur**
- [ ] Créer `app/Controllers/AuthController.php`
  - [ ] `index()` → affiche le formulaire login avec valeurs par défaut pré-remplies dans les `value=""`
  - [ ] `login()` → vérifie credentials avec `password_verify()`, crée la session, redirige vers `/etudiants`
  - [ ] `logout()` → détruit la session, redirige vers `/login`

**Vue**
- [ ] Créer `app/Views/auth/login.php`
  - [ ] Formulaire avec `value="admin"` et `value="admin123"` déjà remplis
  - [ ] Affichage des erreurs de connexion

---

### 🗺️ 3. Routes

- [ ] Éditer `app/Config/Routes.php`

```php
$routes->get('/',        'AuthController::index');
$routes->get('/login',   'AuthController::index');
$routes->post('/login',  'AuthController::login');
$routes->get('/logout',  'AuthController::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    // Etudiants
    $routes->get('etudiants',              'EtudiantController::index');
    $routes->get('etudiants/(:num)',       'EtudiantController::show/$1');
    // Notes
    $routes->get('notes/create',           'NoteController::create');
    $routes->post('notes/store',           'NoteController::store');
});
```

---

### 📦 4. Modèles

**`ParcoursModel`**
- [ ] `getAll()` → liste des parcours

**`SemestreModel`**
- [ ] `getAll()` → liste des semestres

**`EtudiantModel`**
- [ ] `getAll()` → tous les étudiants avec le libellé parcours (JOIN)
- [ ] `find($id)` → un étudiant avec son parcours

**`UeModel`**
- [ ] `getByParcours($parcours_id, $semestre_id)` → UE d'un parcours + semestre (JOIN `parcours_ue`)
- [ ] `getObligatoires($parcours_id, $semestre_id)` → UE obligatoires uniquement
- [ ] `getOptionsGroupees($parcours_id, $semestre_id)` → UE optionnelles groupées par `groupe_option_id`
- [ ] `getForSelectEtudiant($etudiant_id)` → UE disponibles pour un étudiant (selon son parcours + niveau)

**`NoteModel`**
- [ ] `insert($data)` → insère une note (sans vérifier doublon, plusieurs saisies OK)
- [ ] `getMaxParMatiere($etudiant_id)` → `SELECT ue_id, MAX(note) as note_max GROUP BY ue_id`
- [ ] `getNotesSemestre($etudiant_id, $semestre_id)` → notes max par UE pour un semestre donné

---

### 👤 5. Gestion des étudiants

**Contrôleur `EtudiantController`**
- [ ] `index()` → récupère tous les étudiants, passe à la vue
- [ ] `show($id)` → récupère l'étudiant + calcule et passe les notes formatées à la vue

**Vue `etudiants/index.php`**
- [ ] Tableau liste : numéro, nom, prénom, parcours, niveau
- [ ] Chaque ligne cliquable → lien vers `etudiants/{id}`

**Vue `etudiants/show.php`**
- [ ] Afficher nom + parcours + niveau en entête
- [ ] **Si niveau = S3** : afficher tableau S3 uniquement
- [ ] **Si niveau = S4** : afficher tableau S4 avec le bon parcours
- [ ] **Si niveau = L2** : afficher S3 + S4 + bloc moyenne générale
- [ ] Lien retour vers la liste

---

### 📝 6. Saisie des notes

**Contrôleur `NoteController`**
- [ ] `create()` → affiche le formulaire
- [ ] `store()` → valide (note entre 0 et 20, étudiant et UE requis) → insère → redirige vers le même formulaire avec message succès

**Vue `notes/create.php`**
- [ ] Select étudiant (tous les étudiants)
- [ ] Select UE (filtré dynamiquement selon l'étudiant sélectionné)
  - Option A : rechargement de page avec `?etudiant_id=X`
  - Option B : requête AJAX vers un endpoint `/notes/getUes/{etudiant_id}`
- [ ] Champ note `/20`
- [ ] Bouton "Enregistrer" → message de confirmation, formulaire reste ouvert pour saisie suivante

**Endpoint AJAX (optionnel mais recommandé)**
- [ ] `NoteController::getUes($etudiant_id)` → retourne JSON des UE disponibles

---

### 🧮 7. Logique de calcul des notes (à mettre dans un Service ou dans `EtudiantController::show`)

Créer `app/Services/NoteCalculator.php` (ou méthode privée dans le contrôleur) :

**Étape 1 — Récupérer les notes max par UE**
```php
// SELECT ue_id, MAX(note) as note_max FROM notes
// WHERE etudiant_id = $id GROUP BY ue_id
```

**Étape 2 — Pour les UE obligatoires**
- [ ] Prendre directement la note max de chaque UE

**Étape 3 — Pour les groupes d'options**
- [ ] Parmi toutes les UE du groupe, retenir celle qui a la `note_max` la plus élevée
- [ ] Ignorer les autres UE du même groupe

**Étape 4 — Calcul de la moyenne pondérée**
```
moyenne = SUM(note_max × credits) / SUM(credits)
```
- [ ] `calculerMoyenneSemestre($etudiant_id, $semestre_id)` → retourne `['moyenne', 'credits', 'details']`
- [ ] `calculerMoyenneL2($etudiant_id)` → retourne moyenne S3, moyenne S4, moyenne générale `(S3+S4)/2`

---

### 🎨 8. Layout & Design

**Layout principal `app/Views/layouts/main.php`**
- [ ] Navbar avec : logo/titre, lien "Étudiants", lien "Saisir une note", lien "Déconnexion"
- [ ] Zone `<?= $this->renderSection('content') ?>`
- [ ] Include du CSS compilé

**SCSS**
- [ ] Récupérer le fichier SCSS du prof
- [ ] Installer `sass` : `npm install -g sass`
- [ ] Compiler : `sass assets/scss/main.scss public/css/theme.css`
- [ ] Ou ajouter un script npm watch pour le développement

**Chaque vue étend le layout**
```php
<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
  ...
<?= $this->endSection() ?>
```

---

### 🧪 9. Tests & vérifications

- [ ] Login avec valeurs par défaut pré-remplies → fonctionne
- [ ] Saisir 2 fois une note pour la même UE → le MAX est bien pris dans l'affichage
- [ ] Affichage étudiant S3 → tableau S3 uniquement
- [ ] Affichage étudiant S4 dev → tableau S4 option dev avec bonne UE optionnelle retenue
- [ ] Affichage étudiant S4 bddres → idem option bddres
- [ ] Affichage étudiant S4 web → idem option web
- [ ] Affichage étudiant L2 → S3 + S4 + moyenne générale correcte
- [ ] Route sans session → redirige vers `/login`
- [ ] Note hors [0-20] → message d'erreur de validation

---

### 📁 Structure finale des fichiers

```
app/
├── Config/
│   ├── Routes.php          ← à modifier
│   └── Filters.php         ← enregistrer AuthFilter
├── Controllers/
│   ├── AuthController.php
│   ├── EtudiantController.php
│   └── NoteController.php
├── Filters/
│   └── AuthFilter.php
├── Models/
│   ├── UserModel.php
│   ├── ParcoursModel.php
│   ├── SemestreModel.php
│   ├── EtudiantModel.php
│   ├── UeModel.php
│   └── NoteModel.php
├── Services/
│   └── NoteCalculator.php
└── Views/
    ├── layouts/main.php
    ├── auth/login.php
    ├── etudiants/
    │   ├── index.php
    │   └── show.php
    └── notes/
        └── create.php
assets/
└── scss/main.scss
public/
└── css/theme.css
```

---

**Ordre suggéré pour les 4h :**

| Durée | Tâche |
|-------|-------|
| 15 min | Config `.env` + routes + layout de base |
| 30 min | Auth (filtre + contrôleur + vue login) |
| 30 min | Liste étudiants + vue index |
| 45 min | Saisie de notes + formulaire |
| 1h | Affichage notes S3/S4/L2 + NoteCalculator |
| 30 min | Design SCSS |
| 30 min | Tests & corrections |