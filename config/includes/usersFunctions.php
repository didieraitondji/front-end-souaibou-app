<?php
// fonction pour ajouter un utilisateur
function addUser($body = null, $token = null, $method = 'POST'): array|false
{
    global $addUserUrl;
    $data = callApi($addUserUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour connecter un utilisateur
function loginUser($body = null, $token = null, $method = 'POST'): array|false
{
    global $loginUserUrl;
    $data = callApi($loginUserUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour déconnecter un utilisateur
function logoutUser($body = null, $token = null, $method = 'POST'): array|false
{
    global $logoutUserUrl;
    $data = callApi($logoutUserUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour vérifier si un utilisateur est connecté
function isLoginUser($body = null, $token = null, $method = 'POST'): array|false
{
    global $isLoginUserUrl;
    $data = callApi($isLoginUserUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les utilisateurs
function allUsers($token = null): array|false
{
    global $getAllUsersUrl;
    $data = callApi($getAllUsersUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les utilisateurs actif
function activatedUsers($token = null): array|false
{
    global $getActivatedUsersUrl;
    $data = callApi($getActivatedUsersUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer les utilisateur non actif
function notActivatedUsers($token = null): array|false
{
    global $getNotActivatedUsersUrl;
    $data = callApi($getNotActivatedUsersUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer un utilisateur dont on connais l'id
function user($id): array|false
{
    global $getUserUrl;
    $url = $getUserUrl . "/" . $id;
    $data = callApi($url);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour mettre à jour un utilisateur 
function updateUser($id, $body): array|false
{
    global $updateUserUrl;
    $url = $updateUserUrl . "/" . $id;
    $data = callApi($url, $body, 'PUT', null);

    if ($data === false) {
        return false;
    } else {
        return $data["data"];
    }
}

// fonction pour supprimer un utilisateur 
function deleteUser($id): array|false
{
    global $deleteUserUrl;
    $url = $deleteUserUrl . "/" . $id;
    $data = callApi($url, null, 'DELETE', null);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}
