# 🏥 Annuaire Pharmaceutique Régional — Groupe 7

## 📁 Contenu de ce dossier (thème enfant)

```
annuaire-pharma-enfant/
├── style.css        ← Identité du thème + tous les styles CSS
├── functions.php    ← Fonctionnalités PHP (CPT, menus, polices...)
└── README.md        ← Ce fichier
```

---

## ⚙️ Installation étape par étape (XAMPP + WordPress)

### Étape 1 — Cloner le projet

```bash
cd C:\xampp\htdocs\
git clone https://github.com/VOTRE-DEPOT/annuaire-pharma.git
```

### Étape 2 — Copier le thème enfant dans WordPress

Copier le dossier `annuaire-pharma-enfant` ici :
```
C:\xampp\htdocs\annuaire-pharma\wp-content\themes\annuaire-pharma-enfant\
```

### Étape 3 — Activer le thème dans WordPress

1. Ouvre `http://localhost/annuaire-pharma/wp-admin`
2. Va dans **Apparence → Thèmes**
3. Clique sur **Activer** sous "Annuaire Pharma Enfant"

> ⚠️ Le thème parent **Twenty Twenty-Four** doit aussi être installé (il l'est par défaut avec WordPress).

---

## 📄 Pages à créer dans le tableau de bord WP

Aller dans **Pages → Ajouter**, créer ces pages vides :

| Titre de la page | Slug suggéré     | Responsable      |
|-----------------|-----------------|-----------------|
| Accueil          | `/`              | Étudiant 2       |
| Annuaire         | `/pharmacies`    | Étudiant 2       |
| Faire un don     | `/don`           | **Étudiant 3**   |
| Blog             | `/blog`          | **Étudiant 3**   |
| Contact          | `/contact`       | Étudiant 2 + 3   |
| Confidentialité  | `/confidentialite` | Étudiant 4    |

---

## 🔀 Workflow GitHub (à respecter par tous)

```bash
# 1. Toujours partir de main à jour
git checkout main
git pull origin main

# 2. Créer sa branche de travail
git checkout -b feature/nom-de-la-fonctionnalite

# 3. Travailler, puis commit régulièrement
git add .
git commit -m "feat: description courte de ce que tu as fait"

# 4. Pousser et ouvrir une Pull Request
git push origin feature/nom-de-la-fonctionnalite
# → Ouvrir la PR sur GitHub, demander une review à l'équipe
```

---

## 👥 Rappel des responsabilités

| Étudiant | Fichiers principaux à modifier |
|---------|-------------------------------|
| Étudiant 1 | GitHub, README, WAMP/XAMPP config |
| Étudiant 2 | `style.css` (design), pages Accueil/Annuaire/Contact |
| **Étudiant 3** | **`functions.php` (CPT Mission), plugin GiveWP, articles blog, newsletter, formulaire contact** |
| Étudiant 4 | Yoast SEO, UpdraftPlus, sécurité wp-config.php |

---

## 🌐 Accès local

- **Site** : http://localhost/annuaire-pharma
- **Admin** : http://localhost/annuaire-pharma/wp-admin
