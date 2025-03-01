<?php

/*
    ******************************************************************************************************

    Les inclusions et variables importantes

    ******************************************************************************************************
*/

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

// fichier contenant les fonctions utiles pour faire différentes opération sur les types de produits
include_once __DIR__ . '/includes/typeProduitsFunctions.php';


/*
    ******************************************************************************************************

    Déclation de quelques fonctions importante pour le fonctionnement de la plateforme

    ******************************************************************************************************
*/

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

// fonction pour donner la date
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

// fonction pour vérifier si une promotion est active ou pas
function promotionActive($dateFinPromotion)
{
    $dateFin = new DateTime($dateFinPromotion);
    $dateActuelle = new DateTime();
    return $dateActuelle < $dateFin;
}

// fonction pour téléverser une image dans le dossier /asset/images/
function televerserImage($fileInputName, $uploadDir = '/assets/images/', $nouvelleLargeur = 200, $nouvelleHauteur = 200)
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

        // Définir le chemin complet pour enregistrer l'image originale
        $uploadPath = $absoluteUploadDir . $uniqueFileName;

        // Déplacez le fichier temporaire vers le répertoire de destination
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            // Définir le chemin de l'image redimensionnée
            $resizedFileName = "resized_" . $uniqueFileName;
            $resizedUploadPath = $absoluteUploadDir . $resizedFileName;

            // Redimensionner l'image
            redimensionnerImage($uploadPath, $resizedUploadPath, $nouvelleLargeur, $nouvelleHauteur);

            return [
                true,
                $uploadDir . $uniqueFileName,
                $uploadDir . $resizedFileName,
                "L'image a été téléchargée et redimensionnée avec succès."
            ];
        } else {
            return [false, null, null, "Erreur lors du téléchargement de l'image."];
        }
    } else {
        $error = $_FILES[$fileInputName]['error'] ?? 'Aucun fichier téléchargé.';
        return [false, null, null, "Erreur : " . $error];
    }
}

// fonction pour redimensionner une Image.
/*function redimensionnerImage($source, $destination, $nouvelleLargeur, $nouvelleHauteur)
{
    // Obtenir les informations sur l'image source
    list($largeurOrigine, $hauteurOrigine, $type) = getimagesize($source);

    // Déterminer le type d'image et créer une image en mémoire
    switch ($type) {
        case IMAGETYPE_JPEG:
            $imageSource = imagecreatefromjpeg($source);
            break;
        case IMAGETYPE_PNG:
            $imageSource = imagecreatefrompng($source);
            break;
        case IMAGETYPE_GIF:
            $imageSource = imagecreatefromgif($source);
            break;
        default:
            die("Format d'image non supporté !");
    }

    // Créer une nouvelle image vide avec la nouvelle taille
    $imageDestination = imagecreatetruecolor($nouvelleLargeur, $nouvelleHauteur);

    // Conserver la transparence pour les images PNG et GIF
    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
        imagecolortransparent($imageDestination, imagecolorallocatealpha($imageDestination, 0, 0, 0, 127));
        imagealphablending($imageDestination, false);
        imagesavealpha($imageDestination, true);
    }

    // Redimensionner l'image
    imagecopyresampled(
        $imageDestination,
        $imageSource,
        0,
        0,
        0,
        0,
        $nouvelleLargeur,
        $nouvelleHauteur,
        $largeurOrigine,
        $hauteurOrigine
    );

    // Sauvegarder l'image redimensionnée selon son format
    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($imageDestination, $destination, 90); // 90% de qualité
            break;
        case IMAGETYPE_PNG:
            imagepng($imageDestination, $destination, 9); // Niveau de compression
            break;
        case IMAGETYPE_GIF:
            imagegif($imageDestination, $destination);
            break;
    }

    // Libérer la mémoire
    imagedestroy($imageSource);
    imagedestroy($imageDestination);
}*/

function redimensionnerImage($source, $destination, $nouvelleLargeur, $nouvelleHauteur)
{
    list($largeurOrigine, $hauteurOrigine, $type) = getimagesize($source);

    switch ($type) {
        case IMAGETYPE_JPEG:
            $imageSource = imagecreatefromjpeg($source);
            break;
        case IMAGETYPE_PNG:
            $imageSource = imagecreatefrompng($source);
            break;
        case IMAGETYPE_GIF:
            $imageSource = imagecreatefromgif($source);
            imagepalettetotruecolor($imageSource); // Améliore la qualité des GIFs
            break;
        default:
            die("Format d'image non supporté !");
    }

    $imageDestination = imagecreatetruecolor($nouvelleLargeur, $nouvelleHauteur);

    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
        imagecolortransparent($imageDestination, imagecolorallocatealpha($imageDestination, 0, 0, 0, 127));
        imagealphablending($imageDestination, false);
        imagesavealpha($imageDestination, true);
    }

    imageinterlace($imageDestination, true); // Améliore le rendu des JPEG

    imagecopyresampled(
        $imageDestination,
        $imageSource,
        0,
        0,
        0,
        0,
        $nouvelleLargeur,
        $nouvelleHauteur,
        $largeurOrigine,
        $hauteurOrigine
    );

    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($imageDestination, $destination, 100); // Qualité maximale
            break;
        case IMAGETYPE_PNG:
            imagepng($imageDestination, $destination, 0); // Pas de compression
            break;
        case IMAGETYPE_GIF:
            imagegif($imageDestination, $destination);
            break;
    }

    imagedestroy($imageSource);
    imagedestroy($imageDestination);
}


// cette fonction permet de retrouver le chemin original d'un fichier
function retrouverCheminOriginal($cheminRedimensionne)
{
    // Extraire le répertoire, le nom de fichier et l'extension
    $directory = pathinfo($cheminRedimensionne, PATHINFO_DIRNAME);
    $filename = pathinfo($cheminRedimensionne, PATHINFO_FILENAME);
    $extension = pathinfo($cheminRedimensionne, PATHINFO_EXTENSION);

    // Vérifier si le nom commence par "resized_" et le supprimer
    if (strpos($filename, "resized_") === 0) {
        $filename = substr($filename, 8); // Supprime "resized_" (8 caractères)
    }

    // Reconstruire le chemin du fichier original
    return $directory . "/" . $filename . "." . $extension;
}

// fonction pour tronquer la description.
function tronquerDescription($text, $length = 50)
{
    if (strlen($text) > $length) {
        $text = substr($text, 0, $length) . '...';
    }
    return $text;
}

// fonction pour supprimer un fichier
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
