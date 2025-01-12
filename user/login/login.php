<?php

include_once __DIR__ . '/../../config/config.php';

if (isset($_POST['phone']) && isset($_POST['password'])) {
    $telephone = implode("", explode(" ", $_POST['phone']));
    $password = $_POST['password'];

    $body = [
        "telephone" => "+229" . $telephone,
        "password" => $password
    ];

    // donnees après connexion
    $appelApi = loginUser($body);

    if ($appelApi['status'] == "error") {
        $message = $appelApi['message'];
        session_start();
        $_SESSION["error"] = $message;
        $_SESSION["phone"] = $telephone;
        $_SESSION["password"] = $password;
        $_SESSION['client_connect'] = 0;
        redirect("/user/login/");
    } else {
        $data = $appelApi['data'];

        if ($data['user_type'] == "user") {
            session_start();
            $_SESSION['user_data'] = $data;
            $_SESSION['client_connect'] = 1;
            $_SESSION['bienvenu'] = "Hello cher " . $data['first_name'];
            redirect("/");
        } else {
            session_start();
            $_SESSION["error"] = "Erreur inconnue !";
            $_SESSION["phone"] = $telephone;
            $_SESSION["password"] = $password;
            $_SESSION['client_connect'] = 0;
            redirect("/user/login/");
        }
    }
} else {
    redirect("/");
}
