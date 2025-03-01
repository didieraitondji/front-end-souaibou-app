<div class="" style="position: fixed; top:0; left:0; right:0;">
    <?php
    // Vérifier si l'utilisateur est sur l'accueil (ex: domaine.com/ ou domaine.com/index.php)
    if ($_SERVER['REQUEST_URI'] == "/" || strpos($_SERVER['REQUEST_URI'], "index.php") !== false) {
        echo '
    <marquee behavior="scroll" direction="left" scrollamount="5" style="color: white; font-weight: bold; background:rgb(73, 55, 43); padding: 5px 20px;">
        📢 Vous êtes un BAR, une Buvette, un Restaurant ? Inscrivez-vous pour profiter de nos offres promotionnelles et de nombreux avantages de partenariat ! 🎉
    </marquee>';
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand fw-bold" href="/">
                <img src="/assets/images/logo.png" class="p-1 border rounded rounded-circle" width="35px" alt="Logo SOUAIBOU DISTRIBUTION">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="/store/">Boutique</a></li>
                    <li class="nav-item"><a class="nav-link about" href="/about/">à propos</a></li>
                </ul>

                <!-- OMOTUNDE Kalala -->

                <div class="d-flex">
                    <?php
                    if (isset($_SESSION['client_connect']) && $_SESSION['client_connect'] === 1) { ?>
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle rounded-circle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill-check"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/admin/profil/">Profil Utilisateur</a></li>
                                    <!-- <li><a class="dropdown-item" href="#!">Activitées</a></li> -->
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="/admin/controls/logout.php">Se déconnecter</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php
                    } else { ?>
                        <a href="/user/login/" class="btn btn-success fw-bold mx-1" type="submit">
                            Se connecter
                        </a>
                        <a href="/user/signin/" class="btn btn-primary fw-bold mx-1" type="submit">
                            Créer
                        </a>
                    <?php } ?>

                    <button class="btn btn-outline-secondary mx-1" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>