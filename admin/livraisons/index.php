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
        <title> Livraisons | Admin SOUAIBOU DISTRIBUTION </title>
        <link rel="stylesheet" href="/assets/css/styles_admin.css">
        <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .livraisons {
                color: #FFD700;
            }
        </style>
    </head>

    <body class="sb-nav-fixed">
        <?php include_once __DIR__ . "/../includes/admin_header.php" ?>
        <div id="layoutSidenav">
            <?php include_once __DIR__ . "/../includes/admin_left_menu.php" ?>
            <div id="layoutSidenav_content">
                <div class=" p-4 text-black">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sunt exercitationem reiciendis consectetur amet iste deleniti, unde eaque sint eligendi, rem fugiat delectus aliquid? Porro quasi nisi mollitia iste? Explicabo.
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/scripts_admin.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const currentUrl = window.location.pathname;
                const produitsLink = document.querySelector('a[href="/admin/livraisons/"]');
                const produitsCollapse = document.getElementById("collapseLivraisons");


                if (currentUrl.startsWith("/admin/livraisons/")) {
                    produitsLink.classList.remove('collapsed');
                    produitsLink.setAttribute('aria-expanded', 'true');
                    produitsCollapse.classList.add('show');
                }
            });

            document.addEventListener("DOMContentLoaded", function() {
                applyStyleOnScroll("#editerlSection", "#editerlButton", "subStyle");
            });
            document.addEventListener("DOMContentLoaded", function() {
                applyStyleOnScroll("#historylSection", "#historylButton", "subStyle");
            });
        </script>
    </body>

    </html>
<?php } else {
    redirect("/admin/");
}
?>