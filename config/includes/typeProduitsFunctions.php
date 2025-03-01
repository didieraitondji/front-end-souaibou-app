<?php

// fonction pour ajouter un TypeProduit
function addTypeProduit($body = null, $token = null, $method = 'POST'): array|false
{
    global $addTypeProduitUrl;
    $data = callApi($addTypeProduitUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les TypeProduits
function allTypeProduits($token = null): array|false
{
    global $getAllTypeProduitsUrl;
    $data = callApi($getAllTypeProduitsUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer un TypeProduit dont on connaît l'id
function typeProduit($id): array|false
{
    global $getTypeProduitUrl;
    $url = $getTypeProduitUrl . "/" . $id;
    $data = callApi($url);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour mettre à jour un TypeProduit
function updateTypeProduit($id, $body): array|false
{
    global $updateTypeProduitUrl;
    $url = $updateTypeProduitUrl . "/" . $id;
    $data = callApi($url, $body, 'PUT', null);

    if ($data === false) {
        return false;
    } else {
        return $data["data"];
    }
}

// fonction pour supprimer un TypeProduit
function deleteTypeProduit($id): array|false
{
    global $deleteTypeProduitUrl;
    $url = $deleteTypeProduitUrl . "/" . $id;
    $data = callApi($url, null, 'DELETE', null);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}
