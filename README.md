# 🎓 Youdemy - Plateforme de cours en ligne

Bienvenue dans **Youdemy**, une plateforme de cours en ligne révolutionnaire conçue pour offrir une expérience d'apprentissage interactive et personnalisée pour les étudiants et les enseignants. 📚✨

---

## 🌟 Contexte du projet

**Youdemy** a pour objectif de faciliter l'échange de connaissances en fournissant des outils intuitifs pour la gestion et la consommation de contenu éducatif. Que vous soyez étudiant ou enseignant, Youdemy s'adapte à vos besoins pour une expérience optimale d'apprentissage et d'enseignement. 💻

---

## 🚀 Fonctionnalités Requises

### 🖥️ Partie Front Office

#### 👤 Visiteur

- ✅ Accès au catalogue des cours avec **pagination**.
- 🔍 **Recherche** de cours par mots-clés.
- 📝 Création d’un compte avec le choix du rôle : **Étudiant** ou **Enseignant**.

#### 🎓 Étudiant

- 🗂️ Visualisation du catalogue des cours.
- 📖 Consultation des détails des cours (description, contenu, enseignant, etc.).
- 📝 Inscription à un cours après authentification.
- 📚 Accès à une section **"Mes cours"** regroupant les cours rejoints.

#### 🧑‍🏫 Enseignant

- ➕ Ajout de nouveaux cours avec des détails comme :
  - **Titre**, description, contenu (vidéo ou document), tags, et catégorie.
- ⚙️ Gestion des cours :
  - Modification, suppression et consultation des inscriptions.
- 📊 Accès à une section **Statistiques** sur les cours :
  - Nombre d’étudiants inscrits.
  - Nombre de cours, etc.

### 🔒 Partie Back Office

#### 🛠️ Administrateur

- 👩‍💼 Validation des comptes enseignants.
- 👥 Gestion des utilisateurs :
  - Activation, suspension ou suppression.
- 📑 Gestion des contenus :
  - Cours, catégories et tags.
  - Insertion en masse de tags pour plus d'efficacité.
- 📈 Accès à des **statistiques globales** :
  - Nombre total de cours.
  - Répartition par catégorie.
  - Le cours avec le plus d'étudiants.
  - Les **Top 3 enseignants**.


---

## 💻 Exigences Techniques

| Exigence                          | Détail                                                                           |
|-----------------------------------|---------------------------------------------------------------------------------|
| 🛠️ **OOP**                       | Respect des principes : encapsulation, héritage, polymorphisme.                |
| 🗄️ **Base de données**           | Relationnelle avec gestion des relations : one-to-many, many-to-many.           |
| 🕒 **Sessions PHP**               | Gestion des utilisateurs connectés.                                             |
| 🔒 **Validation des données**     | Sécurisation des entrées utilisateur pour garantir la sécurité.                 |

---

## 🛠️ Technologies Utilisées

- **Langages** : PHP, HTML, CSS, JavaScript.
- **Base de données** : MySQL.
- **Frameworks** : Tailwind css.

---

## 📊 Aperçu des Fonctionnalités

| Fonctionnalité      | Visiteur | Étudiant | Enseignant | Administrateur |
|---------------------|----------|----------|------------|----------------|
| Accès au catalogue  | ✅        | ✅        | ✅          | ✅              |
| Recherche de cours  | ✅        | ✅        | ✅          | ✅              |
| Ajout de cours      | ❌        | ❌        | ✅          | ❌              |
| Gestion des cours   | ❌        | ❌        | ✅          | ✅              |
| Statistiques        | ❌        | ❌        | ✅          | ✅              |


---

## 📥 **Installation**

### Prérequis
- PHP 8.0 ou supérieur
- Serveur Web (Apache ou Nginx)
- Base de données MySQL ou MariaDB
- Composer (pour la gestion des dépendances PHP)

Suivez ces étapes pour configurer le projet localement :

1. 🛠️ Installez PHP et [XAMPP](https://www.apachefriends.org/index.html).
2. 🔄 Clonez le dépôt dans le répertoire `htdocs` de XAMPP :
   ```bash
   git clone https://github.com/Sala7-dine/Youdemy.git
   ```

3. 🔼 Accédez au répertoire du projet :
   ```bash
   cd C:\xampp\htdocs\Youdemy
   ```

4. 🚀 Lancez XAMPP et démarrez le serveur Apache.

5. 🔍 Accédez à l'application via votre navigateur à l'adresse suivante :
   ```
   http://localhost/Youdemy
   ```

---
