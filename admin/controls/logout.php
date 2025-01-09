<?php
session_start();

include_once __DIR__ . "/../../config/config.php";

$data = logoutUser($_SESSION['user_data']['id_users']);

session_destroy();
redirect('/admin/');
