<?php
session_start();

include_once __DIR__ . "/../../config/config.php";

if (isset($_SESSION['user_data']) && $_SESSION['user_data']['user_type'] == "admin") {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Profil | Admin SOUAIBOU DISTRIBUTION </title>
        <link rel="stylesheet" href="/assets/css/styles_admin.css">
        <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <?php include_once __DIR__ . "/../includes/admin_header.php" ?>
        <div id="layoutSidenav">
            <?php include_once __DIR__ . "/../includes/admin_left_menu.php" ?>
            <div id="layoutSidenav_content">
                <div class=" p-4 text-black">
                    
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/scripts_admin.js"></script>
    </body>

    </html>
<?php } else {
    redirect("/admin/");
}
?>