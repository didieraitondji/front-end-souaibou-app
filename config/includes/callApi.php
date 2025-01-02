<?php

/**
 * Fonction pour effectuer une requête API
 *
 * @param string $url URL de l'API
 * @param string $method Méthode HTTP (GET, POST, PUT, DELETE)
 * @param string|null $token Jeton d'authentification (facultatif)
 * @param array|null $body Corps de la requête pour POST/PUT (facultatif)
 * @return array|false Données décodées en cas de succès, false en cas d'échec
 */
function callApi(string $url, array $body = null, string $method = 'GET', string $token = null): array|false
{
    // Construire les en-têtes HTTP
    $headers = [
        "Content-Type: application/json",
    ];
    if ($token) {
        $headers[] = "Authorization: Bearer $token";
    }

    // Préparer les options HTTP
    $httpOptions = [
        "http" => [
            "header" => implode("\r\n", $headers),
            "method" => strtoupper($method),
        ]
    ];

    // Ajouter le corps de la requête pour POST ou PUT
    if (in_array($method, ['POST', 'PUT']) && $body) {
        $httpOptions['http']['content'] = json_encode($body);
    }

    // Créer le contexte de la requête
    $context = stream_context_create($httpOptions);

    // Envoyer la requête et obtenir la réponse
    $response = @file_get_contents($url, false, $context);

    // Vérifier les erreurs
    if ($response === FALSE) {
        return false; // Retourne false en cas d'échec
    }

    // Décoder la réponse JSON
    return json_decode($response, true);
}
