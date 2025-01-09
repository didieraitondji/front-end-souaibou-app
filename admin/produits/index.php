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
        <title> Produits | Admin SOUAIBOU DISTRIBUTION </title>
        <link rel="stylesheet" href="/assets/css/styles_admin.css">
        <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <?php include_once __DIR__ . "/../includes/admin_header.php" ?>
        <div id="layoutSidenav">
            <?php include_once __DIR__ . "/../includes/admin_left_menu.php" ?>
            <div id="layoutSidenav_content">
                <div id="add" class="p-4"></div>
                <div class=" px-2 py-4 text-black">
                    <div class="container">
                        <!-- Ajout du produit  -->
                        <?php include_once __DIR__ . "/../includes/add_produits.php" ?>
                        <br>
                        <br>
                        <!-- Tout les profuits -->
                        <?php include_once __DIR__ . "/../includes/all_produits.php" ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/js/scripts_admin.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const currentUrl = window.location.pathname;
                const produitsLink = document.querySelector('a[href="/admin/produits/"]');
                const produitsCollapse = document.getElementById("collapseProduits");

                // Check if the current URL starts with "/admin/produits/"
                if (currentUrl.startsWith("/admin/produits/")) {
                    produitsLink.classList.remove('collapsed');
                    produitsLink.setAttribute('aria-expanded', 'true');
                    produitsCollapse.classList.add('show');
                    produitsLink.classList.add('active-link-p')
                }
            });

            function togglePromotionFields() {
                const promotionSelect = document.getElementById('productPromotion');
                const promotionFields = document.getElementById('promotionFields');

                const promotionalPrice = document.getElementById('promotionalPrice');
                const promotionStartDate = document.getElementById('promotionStartDate');
                const promotionEndDate = document.getElementById('promotionEndDate');

                if (promotionSelect.value === '1') {
                    promotionFields.style.display = 'block';
                    promotionalPrice.setAttribute("required", "");
                    promotionEndDate.setAttribute("required", "");
                    promotionStartDate.setAttribute("required", "");
                } else {
                    promotionFields.style.display = 'none';
                    promotionalPrice.removeAttribute("required");
                    promotionEndDate.removeAttribute("required");
                    promotionStartDate.removeAttribute("required");
                }
            }


            function confirmDeletion(event) {
                event.preventDefault();

                var userConfirmation = confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");

                if (userConfirmation) {
                    window.location.href = event.currentTarget.href;
                }
            }

            document.getElementById('promotionEndDate').addEventListener('change', function() {
                var startDate = document.getElementById('promotionStartDate').value;
                var endDate = document.getElementById('promotionEndDate').value;

                if (startDate && endDate && new Date(endDate) <= new Date(startDate)) {
                    document.getElementById('error-message').style.display = 'block';
                    this.value = ''; // Reset the end date
                } else {
                    document.getElementById('error-message').style.display = 'none';
                }
            });

            document.getElementById('promotionStartDate').addEventListener('change', function() {
                // Re-check the end date when the start date changes
                var startDate = this.value;
                var endDate = document.getElementById('promotionEndDate').value;

                if (endDate && new Date(endDate) <= new Date(startDate)) {
                    document.getElementById('error-message').style.display = 'block';
                    document.getElementById('promotionEndDate').value = ''; // Reset the end date
                } else {
                    document.getElementById('error-message').style.display = 'none';
                }
            });
        </script>
    </body>

    </html>
<?php } else {
    redirect("/admin/");
}
?>