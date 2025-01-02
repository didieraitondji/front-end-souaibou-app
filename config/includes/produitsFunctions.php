<?php

// fonction pour ajouter un produit
function addProduit($body = null, $token = null, $method = 'POST'): array|false
{
    global $addProduitUrl;
    $data = callApi($addProduitUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les produits
function allProduits($token = null): array|false
{
    global $getAllProduitsUrl;
    $data = callApi($getAllProduitsUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}


// fonction pour récupérer un produit dont on connais l'id
function produit($id): array|false
{
    global $getProduitUrl;
    $url = $getProduitUrl . "/" . $id;
    $data = callApi($url);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour mettre à jour un produit 
function updateProduit($id, $body): array|false
{
    global $updateProduitUrl;
    $url = $updateProduitUrl . "/" . $id;
    $data = callApi($url, $body, 'PUT', null);

    if ($data === false) {
        return false;
    } else {
        return $data["data"];
    }
}

// fonction pour supprimer un produit 
function deleteProduit($id): array|false
{
    global $deleteProduitUrl;
    $url = $deleteProduitUrl . "/" . $id;
    $data = callApi($url, null, 'DELETE', null);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}
