## Objectif du TP

L’objectif de ce TP est de mettre en pratique la création et la gestion des **formulaires Symfony**, leur validation côté serveur, ainsi que leur intégration avec **Twig** et **Bootstrap**.

### Structure du travail réalisé

Le travail est organisé autour des éléments suivants :
- Création d’un formulaire Symfony avec `AbstractType`
- Configuration des champs du formulaire
- Ajout de contraintes de validation
- Intégration de Bootstrap
- Traitement et validation du formulaire dans le contrôleur
- Affichage personnalisé du formulaire avec Twig


# Aperçu du projet

**Fichier :** `src/Form/ProduitType.php`

La classe `ProduitType` hérite de `AbstractType`.  
La méthode `buildForm()` a été redéfinie afin de construire le formulaire.

Dans cette méthode :
- Chaque champ est défini avec un **FieldType** approprié
- Des **classes Bootstrap** sont ajoutées via l’attribut `attr`
- Des **contraintes de validation** sont appliquées (`Range`, `min`, `max`)

### Intégration de Bootstrap avec Twig

**Fichier :** `config/packages/twig.yaml`
Le thème Bootstrap a été intégré afin d’uniformiser le style des formulaires :


### Traitement et validation du formulaire dans le contrôleur
**Fichier :** `src/Controller/CartController.php`
Dans le contrôleur :

- Le formulaire est créé à partir de ProduitType
- Les données de la requête sont récupérées avec handleRequest()
- Une condition permet de vérifier si le formulaire est soumis et valide

### Affichage du formulaire avec Twig
**Fichier :** `templates/cart/index.html.twig`
Le formulaire est affiché champ par champ à l’aide de form_row()

![Page produit](screenshots/Pasted%20image.png)
![Page produit](screenshots/Screenshot%20from%202025-12-27%2021-19-58.png)
