<?php

// fonction pour ajouter un Livraison
function addLivraison($body = null, $token = null, $method = 'POST'): array|false
{
    global $addLivraisonUrl;
    $data = callApi($addLivraisonUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les Livraisons
function allLivraisons($token = null): array|false
{
    global $getAllLivraisonsUrl;
    $data = callApi($getAllLivraisonsUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}


// fonction pour récupérer un Livraison dont on connais l'id
function livraison($id): array|false
{
    global $getLivraisonUrl;
    $url = $getLivraisonUrl . "/" . $id;
    $data = callApi($url);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour mettre à jour un Livraison
function updateLivraison($id, $body): array|false
{
    global $updateLivraisonUrl;
    $url = $updateLivraisonUrl . "/" . $id;
    $data = callApi($url, $body, 'PUT', null);

    if ($data === false) {
        return false;
    } else {
        return $data["data"];
    }
}

// fonction pour supprimer un Livraison
function deleteLivraison($id): array|false
{
    global $deleteLivraisonUrl;
    $url = $deleteLivraisonUrl . "/" . $id;
    $data = callApi($url, null, 'DELETE', null);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}
