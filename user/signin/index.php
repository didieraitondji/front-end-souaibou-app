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
        <header class=" position-fixed top-0 w-100">
            <a onclick="window.location.href='/'" class="btn btn-primary rounded-0">
                <i class="bi bi-arrow-left"></i>
                <span class="me-2">Accueil</span>
            </a>
        </header>

        <div class=" position-fixed corps">
            <form method="post" action="./register.php" class="card p-4 shadow-sm" style="max-width: 800px; margin: auto;">
                <h3 class="text-center mb-4">Créer un compte</h3>

                <fieldset class="mb-4">
                    <legend>Informations Personnelles</legend>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">Prénom*</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Entrez votre prénom" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Nom*</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Entrez votre nom" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sexe" class="form-label">Sexe*</label>
                            <select id="sexe" name="sexe" class="form-select" required>
                                <option value="M">Masculin</option>
                                <option value="F">Féminin</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Entrez votre email">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mb-4">
                    <legend>Coordonnées</legend>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telephone" class="form-label">Téléphone*</label>
                            <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Entrez votre numéro de téléphone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rue" class="form-label">Rue</label>
                            <input type="text" id="rue" name="rue" class="form-control" placeholder="Entrez votre adresse">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" id="ville" name="ville" class="form-control" placeholder="Entrez votre ville">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="code_postal" class="form-label">Code postal</label>
                            <input type="text" id="code_postal" name="code_postal" class="form-control" placeholder="Entrez votre code postal">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pays" class="form-label">Pays</label>
                            <input type="text" id="pays" name="pays" disabled value="Bénin" class="form-control" placeholder="Entrez votre pays">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mb-4">
                    <legend>Paramètres du compte</legend>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="users_password" class="form-label">Mot de passe*</label>
                            <input type="password" id="users_password" name="users_password" class="form-control" placeholder="Entrez votre mot de passe" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="notification_option" class="form-label">Option de notification*</label>
                            <select id="notification_option" name="notification_option" class="form-select" required>
                                <option value="email">Email</option>
                                <option value="sms" selected>SMS</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Créer un compte</button>
                </div>
            </form>

            <?php include_once __DIR__ . "/../../includes/footer.php"; ?>
        </div>







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