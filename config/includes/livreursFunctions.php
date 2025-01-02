<?php

// fonction pour ajouter un livreur
function addLivreur($body = null, $token = null, $method = 'POST'): array|false
{
    global $AddLivreurUrl;
    $data = callApi($AddLivreurUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour connecter un livreur
function loginLivreur($body = null, $token = null, $method = 'POST'): array|false
{
    global $loginLivreurUrl;
    $data = callApi($loginLivreurUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour déconnecter un livreur
function logoutLivreur($body = null, $token = null, $method = 'POST'): array|false
{
    global $logoutLivreurUrl;
    $data = callApi($logoutLivreurUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour vérifier si un livreur est connecté
function isLoginLivreur($body = null, $token = null, $method = 'POST'): array|false
{
    global $isLoginLivreurUrl;
    $data = callApi($isLoginLivreurUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les livreurs
function allLivreurs($token = null): array|false
{
    global $getAllLivreursUrl;
    $data = callApi($getAllLivreursUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les livreurs actif
function activatedLivreurs($token = null): array|false
{
    global $getActivatedLivreursUrl;
    $data = callApi($getActivatedLivreursUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer les livreur non actif
function notActivatedLivreurs($token = null): array|false
{
    global $getNotActivatedLivreursUrl;
    $data = callApi($getNotActivatedLivreursUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer un livreur dont on connais l'id
function livreur($id): array|false
{
    global $getLivreurUrl;
    $url = $getLivreurUrl . "/" . $id;
    $data = callApi($url);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour mettre à jour un livreur 
function updateLivreur($id, $body): array|false
{
    global $updateLivreurUrl;
    $url = $updateLivreurUrl . "/" . $id;
    $data = callApi($url, $body, 'PUT', null);

    if ($data === false) {
        return false;
    } else {
        return $data["data"];
    }
}

// fonction pour supprimer un livreur 
function deleteLivreur($id): array|false
{
    global $deleteLivreurUrl;
    $url = $deleteLivreurUrl . "/" . $id;
    $data = callApi($url, null, 'DELETE', null);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}
