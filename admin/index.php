<?php
session_start();

include_once __DIR__ . "/../config/config.php";
if (isset($_SESSION['user_data']) && $_SESSION['user_data']['user_type'] == "admin") {
    redirect("/admin/dashboard/");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Connexion</title>
        <link rel="stylesheet" href="/assets/css/styles.css">
        <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    </head>

    <body class="d-flex justify-content-center align-items-center vh-100 bg-light">

        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <img src="/assets/images/logo.png" alt="Logo" class="img-fluid" style="width: 100px;">
            </div>
            <h2 class="text-center mb-4">Connexion</h2>

            <form method="post" action="/admin/controls/login.php">
                <div class="mb-3">
                    <label for="phone" class="form-label">Numéro de téléphone</label>
                    <div class="input-group">
                        <span class="input-group-text">+229</span>
                        <?php
                        if (isset($_SESSION["phone"]) && $_SESSION["phone"] != "") { ?>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $_SESSION["phone"]; ?>" placeholder="Numéro de téléphone" required>
                        <?php } else {
                        ?>
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
                        <?php } else {
                        ?>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
                        <?php } ?>

                        <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()"><i class="bi bi-eye-slash"></i></button>
                    </div>
                </div>
                <div>
                    <p class=" text-warning text-center">
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

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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