<?php
session_start();

include_once __DIR__ . "/../../config/config.php";

if (isset($_SESSION['user_data']) && $_SESSION['user_data']['user_type'] == "admin") {
    $televerser = televerserImage('p_image');
    $p_image = "";
    if ($televerser[0]) {
        $p_image = $televerser[2];
    } else {
        $p_image = "/assets/images/default.png";
    }

    $body = [
        "id_users" => $_SESSION['user_data']['id_users'],
        "nom_produit" => $_POST['nom_produit'],
        "p_description" => $_POST['p_description'],
        "id_categorie" => $_POST['id_categorie'],
        "prix" => $_POST['prix'],
        "quantite_stock" => $_POST['quantite_stock'],
        "est_en_promotion" => $_POST['est_en_promotion'],
        "prix_promotionnel" => $_POST['prix_promotionnel'],
        "date_debut_promotion" => $_POST['date_debut_promotion'],
        "date_fin_promotion" => $_POST['date_fin_promotion'],
        "p_image" => $p_image
    ];

    try {
        $stock = addProduit($body)['status'];
        if ($stock == "success") {
            $_SESSION['info'] = "Produit ajouter avec succès !";
            redirect("/admin/produits/#liste");
        } else {
            $_SESSION['info'] = "Erreur lors de l'ajout du produit !";
            redirect("/admin/produits/#add");
        }
    } catch (Exception $e) {
        $_SESSION['info'] = "Erreur lors de l'ajout du produit !";
        redirect("/admin/produits/#liste");
    }
} else {
    redirect("/admin/");
}
