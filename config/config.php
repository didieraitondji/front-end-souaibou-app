<?php

// url de l'API.
$apiUrl = "http://souaibou-api.net";

// inclusion des fichiers utils pour les fonctions

// fichier contenant la fonction d'appel à l'API
include_once __DIR__ . '/includes/callApi.php';

// fichier contenant les variables globales sur les endpoints
include_once __DIR__ . '/includes/endPoints.php';

// fichier contenant les fonctions utiles pour faire différentes opération sur les utilisateurs
include_once __DIR__ . '/includes/usersFunctions.php';

// fichier contenant les fonctions utiles pour faire différentes opération sur les livreurs
include_once __DIR__ . '/includes/livreursFunctions.php';

// fichier contenant les fonctions utiles pour faire différentes opération sur les produits
include_once __DIR__ . '/includes/produitsFunctions.php';

// fichier contenant les fonctions utiles pour faire différentes opération sur les commandes
include_once __DIR__ . '/includes/commandesFunctions.php';

// fichier contenant les fonctions utiles pour faire différentes opération sur les livraisons
include_once __DIR__ . '/includes/livraisonsFunctions.php';

// fichier contenant les fonctions utiles pour faire différentes opération sur les catégories
include_once __DIR__ . '/includes/categoriesFunctions.php';
