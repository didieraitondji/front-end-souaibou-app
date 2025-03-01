<?php
session_start();

include_once __DIR__ . "/../../config/config.php";

if (isset($_SESSION['user_data']) && $_SESSION['user_data']['user_type'] == "admin") {
    $televerser = televerserImage('c_image');
    $c_image = "";
    if ($televerser[0]) {
        $c_image = $televerser[2];
    } else {
        $c_image = "/assets/images/defaultc.webp";
    }

    $id = $_POST['id_categorie'];
    $body = [
        "id_users" => $_SESSION['user_data']['id_users'],
        "nom_categorie" => $_POST['nom_categorie'],
        "c_description" => $_POST['c_description'],
        "statut_categorie" => $_POST['statut_categorie'],
        "id_type_produit" => $_POST['id_type_produit'],
        "c_image" => $c_image
    ];

    try {
        $stock = updateCategorie($id, $body)['status'];
        if ($stock == "success") {
            $_SESSION['info'] = "Catégorie modifiée avec succès !";
            redirect("/admin/categories/#liste");
        } else {
            $_SESSION['info'] = "Erreur lors de la modification de la catégorie !";
            redirect("/admin/categories/#add");
        }
    } catch (Exception $e) {
        $_SESSION['info'] = "Erreur lors de la modification de la catégorie !";
        redirect("/admin/categories/#liste");
    }
} else {
    redirect("/admin/");
}
