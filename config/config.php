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


// fonction pour faire la redirection
function redirect($url, $statusCode = 302)
{
    // Assurez-vous que les en-têtes n'ont pas déjà été envoyés
    if (!headers_sent()) {
        header('Location: ' . $url, true, $statusCode);
        exit;
    } else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        exit;
    }
}

function donneDate($date)
{
    $dateTime = new DateTime($date);

    $formattedDate = $dateTime->format('d F Y');

    $months = [
        'January' => 'janv.',
        'February' => 'fév.',
        'March' => 'mars',
        'April' => 'avr.',
        'May' => 'mai',
        'June' => 'juin',
        'July' => 'juil.',
        'August' => 'août',
        'September' => 'sep.',
        'October' => 'oct.',
        'November' => 'nov.',
        'December' => 'déc.'
    ];

    $formattedDate = str_replace(array_keys($months), array_values($months), $formattedDate);

    return $formattedDate;
}

function promotionActive($dateFinPromotion)
{
    $dateFin = new DateTime($dateFinPromotion);
    $dateActuelle = new DateTime();
    return $dateActuelle < $dateFin;
}

function televerserImage($fileInputName, $uploadDir = '/assets/images/')
{
    // Chemin absolu basé sur la racine du serveur
    $absoluteUploadDir = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;

    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] == 0) {
        $file = $_FILES[$fileInputName];

        // Informations sur le fichier
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        // Extraire l'extension du fichier
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Générer un nom de fichier unique avec horodatage
        $uniqueFileName = time() . '_' . uniqid() . '.' . $fileExtension;

        // Vérifiez si le répertoire existe, sinon créez-le
        if (!is_dir($absoluteUploadDir)) {
            mkdir($absoluteUploadDir, 0777, true);
        }

        // Définir le chemin complet pour enregistrer l'image
        $uploadPath = $absoluteUploadDir . $uniqueFileName;

        // Déplacez le fichier temporaire vers le répertoire de destination
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            return [true, $uploadDir . $uniqueFileName, "L'image a été téléchargée avec succès."];
        } else {
            return [false, null, "Erreur lors du téléchargement de l'image."];
        }
    } else {
        $error = $_FILES[$fileInputName]['error'] ?? 'Aucun fichier téléchargé.';
        return [false, null, "Erreur : " . $error];
    }
}


function supprimerFichier($filePath)
{
    // Construire le chemin absolu du fichier en utilisant la racine du document
    $absoluteFilePath = $_SERVER['DOCUMENT_ROOT'] . $filePath;

    // Vérifier si le fichier existe
    if (file_exists($absoluteFilePath)) {
        // Tentative de suppression du fichier
        if (unlink($absoluteFilePath)) {
            return [true, "Le fichier a été supprimé avec succès."];
        } else {
            return [false, "Erreur lors de la suppression du fichier."];
        }
    } else {
        return [false, "Fichier introuvable."];
    }
}
