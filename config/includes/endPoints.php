<?php
// definitions des endpoints pour les opérations sur l'api.

// pour les utilisateurs
$addUserUrl = $apiUrl . "/user"; // Ajouter un utilisateur.
$loginUserUrl = $apiUrl . "/user/login"; // Connecter un utilisateur.
$logoutUserUrl = $apiUrl . "/user/logout"; // Déconnecter un utilisateur.
$isLoginUserUrl = $apiUrl . "/user/is_login"; // Vérifier si un utilisateur est connecté.
$getAllUsersUrl = $apiUrl . "/users";
$getActivatedUsersUrl = $apiUrl . "/users/is_activated";
$getNotActivatedUsersUrl = $apiUrl . "/users/is_not_activated";
$getUserUrl = $apiUrl . "/user"; // Ajoutez un ID spécifique à la fin lors de l'appel
$updateUserUrl = $apiUrl . "/user";
$deleteUserUrl = $apiUrl . "/user"; // Ajoutez un ID spécifique à la fin lors de l'appel

// pour les produits
$addProduitUrl = $apiUrl . "/produit"; // Ajouter un produit.
$getAllProduitsUrl = $apiUrl . "/produits";
$getProduitUrl = $apiUrl . "/produit"; // Ajoutez un ID spécifique à la fin lors de l'appel
$updateProduitUrl = $apiUrl . "/produit";
$deleteProduitUrl = $apiUrl . "/produit"; // Ajoutez un ID spécifique à la fin lors de l'appel

// pour les commandes
$addCommandeUrl = $apiUrl . "/commande"; // Ajouter une commande.
$getAllCommandesUrl = $apiUrl . "/commandes";
$getCommandeUrl = $apiUrl . "/commande"; // Ajoutez un ID spécifique à la fin lors de l'appel
$updateCommandeUrl = $apiUrl . "/commande";
$deleteCommandeUrl = $apiUrl . "/commande"; // Ajoutez un ID spécifique à la fin lors de l'appel

// pour les livreurs
$AddLivreurUrl = $apiUrl . "/livreur"; // ajouter un livreur.
$loginLivreurUrl = $apiUrl . "/livreur/login"; // Connecter un livreur.
$logoutLivreurUrl = $apiUrl . "/livreur/logout"; // Déconnecter un livreur.
$isLoginLivreurUrl = $apiUrl . "/livreur/is_login"; // Vérifier si un livreur est connecté.
$getAllLivreursUrl = $apiUrl . "/livreurs";
$getActivatedLivreursUrl = $apiUrl . "/livreurs/is_activated";
$getNotActivatedLivreursUrl = $apiUrl . "/livreurs/is_not_activated";
$getLivreurUrl = $apiUrl . "/livreur"; // Ajoutez un ID spécifique à la fin lors de l'appel
$updateLivreurUrl = $apiUrl . "/livreur";
$deleteLivreurUrl = $apiUrl . "/livreur"; // Ajoutez un ID spécifique à la fin lors de l'appel

// pour les livraisons
$addLivraisonUrl = $apiUrl . "/livraison"; // Ajouter une livraison.
$getAllLivraisonsUrl = $apiUrl . "/livraisons";
$getLivraisonUrl = $apiUrl . "/livraison"; // Ajoutez un ID spécifique à la fin lors de l'appel
$updateLivraisonUrl = $apiUrl . "/livraison";
$deleteLivraisonUrl = $apiUrl . "/livraison"; // Ajoutez un ID spécifique à la fin lors de l'appel

// pour les catégories
$addCategorieUrl = $apiUrl . "/categorie"; // Ajouter une catégorie.
$getAllCategoriesUrl = $apiUrl . "/categories";
$getCategorieUrl = $apiUrl . "/categorie"; // Ajoutez un ID spécifique à la fin lors de l'appel
$updateCategorieUrl = $apiUrl . "/categorie";
$deleteCategorieUrl = $apiUrl . "/categorie"; // Ajoutez un ID spécifique à la fin lors de l'appel