<?php

// fonction pour ajouter une Catégorie
function addCategorie($body = null, $token = null, $method = 'POST'): array|false
{
    global $addCategorieUrl;
    $data = callApi($addCategorieUrl, $body, $method, $token);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour récupérer tous les Catégories
function allCategories($token = null): array|false
{
    global $getAllCategoriesUrl;
    $data = callApi($getAllCategoriesUrl);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}


// fonction pour récupérer une Catégorie dont on connais l'id
function categorie($id): array|false
{
    global $getCategorieUrl;
    $url = $getCategorieUrl . "/" . $id;
    $data = callApi($url);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}

// fonction pour mettre à jour un Catégorie 
function updateCategorie($id, $body): array|false
{
    global $updateCategorieUrl;
    $url = $updateCategorieUrl . "/" . $id;
    $data = callApi($url, $body, 'PUT', null);

    if ($data === false) {
        return false;
    } else {
        return $data["data"];
    }
}

// fonction pour supprimer un Categorie 
function deleteCategorie($id): array|false
{
    global $deleteCategorieUrl;
    $url = $deleteCategorieUrl . "/" . $id;
    $data = callApi($url, null, 'DELETE', null);

    if ($data === false) {
        return false;
    } else {
        return $data;
    }
}
