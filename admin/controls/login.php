<?php

include_once __DIR__ . '/../../config/config.php';

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
    redirect("/admin/");
} else {
    $data = $appelApi['data'];

    if ($data['user_type'] == "admin") {
        session_start();
        $_SESSION['user_data'] = $data;
        $_SESSION['bienvenu'] = "Hello cher " . $data['first_name'];
        redirect("/admin/dashboard/");
    } else {
        redirect("/");
    }
}
