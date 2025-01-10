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
        <title> Catégories | Admin SOUAIBOU DISTRIBUTION </title>
        <link rel="stylesheet" href="/assets/css/styles_admin.css">
        <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .categories {
                color: #FFD700;
            }
        </style>
    </head>

    <body class="sb-nav-fixed">
        <?php include_once __DIR__ . "/../includes/admin_header.php" ?>
        <div id="layoutSidenav">
            <?php include_once __DIR__ . "/../includes/admin_left_menu.php" ?>
            <div id="layoutSidenav_content">
                <div id="add" class="p-4"></div>
                <div class=" px-2 py-4 text-black">
                    <div class="container">
                        <!-- Ajout d'une catégorie  -->
                        <?php include_once __DIR__ . "/../includes/add_categories.php" ?>
                        <br>
                        <br>
                        <!-- Tout les profuits -->
                        <?php include_once __DIR__ . "/../includes/all_categories.php" ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/scripts_admin.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const currentUrl = window.location.pathname;
                const produitsLink = document.querySelector('a[href="/admin/categories/"]');
                const produitsCollapse = document.getElementById("collapseCategories");


                if (currentUrl.startsWith("/admin/categories/")) {
                    produitsLink.classList.remove('collapsed');
                    produitsLink.setAttribute('aria-expanded', 'true');
                    produitsCollapse.classList.add('show');
                    produitsLink.classList.add('active-link-p')
                }
            });

            document.addEventListener("DOMContentLoaded", function() {
                applyStyleOnScroll("#addcSection", "#addcButton", "subStyle");
            });

            document.addEventListener("DOMContentLoaded", function() {
                applyStyleOnScroll("#listecSection", "#listecButton", "subStyle");
            });
        </script>
    </body>

    </html>
<?php } else {
    redirect("/admin/");
}
?>