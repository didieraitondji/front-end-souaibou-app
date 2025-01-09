<?php
session_start();

include_once __DIR__ . "/../../config/config.php";

if (isset($_SESSION['user_data']) && $_SESSION['user_data']['user_type'] == "admin") {
    $id = $_GET['ref'];
    try {
        supprimerFichier(produit($id)['data']['p_image']);
        deleteProduit($id);
        $_SESSION['info'] = "Produit supprimé avec succès !";
        redirect("/admin/produits/#liste");
    } catch (Exception $e) {
        $_SESSION['info'] = "Erreur lors de la suppression du produit !";
        redirect("/admin/produits/#liste");
    }
} else {
    redirect("/admin/");
}
