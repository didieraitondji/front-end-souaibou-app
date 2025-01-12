<?php
session_start();

include_once __DIR__ . '/../../config/config.php';

if (isset($_SESSION['client_connect']) && $_SESSION['client_connect'] === 1) {
    redirect("/");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> SOUAIBOU DISTRIBUTION | Connexion Client </title>
        <link rel="stylesheet" href="/assets/css/styles.css">
        <link rel="stylesheet" href="/assets/css/accueil.css">
        <link rel="stylesheet" href="/assets/css/produits.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
    </head>

    <body>

        <a onclick="window.location.href='/'" class="btn btn-primary rounded-0">
            <i class="bi bi-arrow-left"></i>
            <span class="me-2">Accueil</span>
        </a>

        <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
            <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
                <div class="text-center mb-4">
                    <img src="/assets/images/logo.png" alt="Logo" class="img-fluid" style="width: 100px;">
                </div>
                <h2 class="text-center mb-4">Connexion</h2>

                <form method="post" action="./login.php">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Numéro de téléphone</label>
                        <div class="input-group">
                            <span class="input-group-text">+229</span>
                            <?php
                            if (isset($_SESSION["phone"]) && $_SESSION["phone"] != "") { ?>
                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $_SESSION["phone"]; ?>" placeholder="Numéro de téléphone" required>
                            <?php } else { ?>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Numéro de téléphone" required>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <div class="input-group">
                            <?php
                            if (isset($_SESSION["password"]) && $_SESSION["password"] != "") { ?>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" value="<?php echo $_SESSION["password"]; ?>" required>
                            <?php } else { ?>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
                            <?php } ?>

                            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()"><i class="bi bi-eye-slash"></i></button>
                        </div>
                    </div>
                    <div>
                        <p class="text-warning text-center">
                            <?php
                            if (isset($_SESSION["error"]) && $_SESSION["error"] != "") {
                                echo $_SESSION["error"];
                            }
                            $_SESSION["error"] = "";
                            session_destroy();
                            ?>
                        </p>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                </form>

                <!-- Ajout des liens -->
                <div class="text-center mt-3">
                    <a href="/user/forget/" class="text-decoration-none">Mot de passe oublié ?</a>
                </div>
                <div class="text-center mt-2">
                    <a href="/user/signin/" class="text-decoration-none">Créer un compte</a>
                </div>

            </div>
        </div>

        <?php include_once __DIR__ . "/../../includes/footer.php"; ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function togglePasswordVisibility() {
                const passwordField = document.getElementById('password');
                const passwordToggle = document.querySelector('.input-group button');
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    passwordToggle.innerHTML = '<i class="bi bi-eye"></i>';
                } else {
                    passwordField.type = 'password';
                    passwordToggle.innerHTML = '<i class="bi bi-eye-slash"></i>';
                }
            }
        </script>
    </body>

    </html>

<?php } ?>