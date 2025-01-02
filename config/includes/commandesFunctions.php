<?php

// fonction pour ajouter un Commande
function addCommande($body = null, $token = null, $method = 'POST'): array|false
{
    global $addCommandeUrl;
    $data = callApi($addCommandeUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les Commandes
function allCommandes($token = null): array|false
{
    global $getAllCommandesUrl;
    $data = callApi($getAllCommandesUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}


// fonction pour récupérer un Commande dont on connais l'id
function commande($id): array|false
{
    global $getCommandeUrl;
    $url = $getCommandeUrl . "/" . $id;
    $data = callApi($url);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour mettre à jour un Commande 
function updateCommande($id, $body): array|false
{
    global $updateCommandeUrl;
    $url = $updateCommandeUrl . "/" . $id;
    $data = callApi($url, $body, 'PUT', null);

    if ($data === false) {
        return false;
    } else {
        return $data["data"];
    }
}

// fonction pour supprimer un Commande
function deleteCommande($id): array|false
{
    global $deleteCommandeUrl;
    $url = $deleteCommandeUrl . "/" . $id;
    $data = callApi($url, null, 'DELETE', null);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}
