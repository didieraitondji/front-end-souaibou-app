<?php
session_start();

include_once __DIR__ . "/../../config/config.php";

if (isset($_SESSION['user_data']) && $_SESSION['user_data']['user_type'] == "admin") {
    $id = $_GET['ref'];
    try {
        $cheminReduit = categorie($id)['data']['c_image'];
        supprimerFichier(retrouverCheminOriginal($cheminReduit));
        supprimerFichier($cheminReduit);
        deleteCategorie($id);
        $_SESSION['info'] = "Catégorie supprimé avec succès !";
        redirect("/admin/categories/#liste");
    } catch (Exception $e) {
        $_SESSION['info'] = "Erreur lors de la suppression de la catégorie !";
        redirect("/admin/categories/#liste");
    }
} else {
    redirect("/admin/");
}
