<?php
include_once __DIR__ . '/../../config/config.php';

$first_name = $_POST['first_name'] ?? null;
$last_name = $_POST['last_name'] ?? null;
$sexe = $_POST['sexe'] ?? null;
$email = $_POST['email'] ?? null;
$telephone = implode("", explode(" ", $_POST['telephone'])) ?? null;
$users_password = $_POST['users_password'] ?? null;
$rue = $_POST['rue'] ?? null;
$ville = $_POST['ville'] ?? null;
$code_postal = $_POST['code_postal'] ?? null;
$pays = $_POST['pays'] ?? 'Bénin';
$notification_option = $_POST['notification_option'] ?? null;

if ($first_name && $last_name && $email && $users_password) {

    $body = [
        "first_name" => $first_name,
        "last_name" => $last_name,
        "sexe" => $sexe,
        "email" => $email,
        "telephone" => "+229" . $telephone,
        "password" => $users_password,
        "rue" => $rue,
        "ville" => $ville,
        "code_postal" => $code_postal,
        "pays" => $pays,
        "notification_option" => $notification_option
    ];

    $body2 = [
        "telephone" => "+229" . $telephone,
        "password" => $users_password
    ];

    $appelApi = addUser($body);

    if ($appelApi['status'] == "error") {
        $message = $appelApi['message'];
        session_start();
        $_SESSION["error"] = $message;
        $_SESSION["telephone"] = $telephone;
        $_SESSION["password"] = $password;
        $_SESSION['client_connect'] = 0;
        redirect("/user/signin/");
    } else {
        $data = loginUser($body2)['data'];

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
