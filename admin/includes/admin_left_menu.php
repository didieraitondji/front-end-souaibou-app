<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav pt-4">
                <div class="sb-sidenav-menu-heading">Vue Générale</div>
                <a class="nav-link" href="/admin/dashboard/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Tableau de bord
                </a>

                <hr>
                <div class="sb-sidenav-menu-heading">Gestion des Produits</div>

                <a class="nav-link collapsed" href="/admin/produits/" data-bs-toggle="collapse" data-bs-target="#collapseProduits" aria-expanded="false" aria-controls="collapseProduits">
                    <div class="sb-nav-link-icon"><i class="fa-brands fa-product-hunt"></i></div>
                    <span class="produits">Produits</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduits" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/admin/produits/#add"><span id="addpButton">Ajouter</span></a>
                        <a class="nav-link" href="/admin/produits/#liste"><span id="listepButton">Liste</span></a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="/admin/categories/" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    <span class="categories"> Catégories </span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategories" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/admin/categories/#add"><span id="addcButton">Ajouter</span></a>
                        <a class="nav-link" href="/admin/categories/#liste"><span id="listecButton">Liste</span></a>
                    </nav>
                </div>

                <hr>
                <div class="sb-sidenav-menu-heading">Gestion des Commandes</div>
                <a class="nav-link collapsed" href="/admin/commandes/" data-bs-toggle="collapse" data-bs-target="#collapseCommandes" aria-expanded="false" aria-controls="collapseCommandes">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-basket-shopping"></i></div>
                    <span class="commandes">Commandes</span>
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCommandes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/admin/commandes/"><span class="commandes">En cours</span></a>
                        <a class="nav-link" href="/admin/commandes/"><span class="commandes">Historique</span></a>
                        <a class="nav-link" href="/admin/commandes/"><span class="commandes">Statut</span></a>
                    </nav>
                </div>

                <hr>
                <div class="sb-sidenav-menu-heading">Gestion des Livraisons</div>
                <a class="nav-link collapsed" href="/admin/livraisons/" data-bs-toggle="collapse" data-bs-target="#collapseLivraisons" aria-expanded="false" aria-controls="collapseLivraisons">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-map-location"></i></div>
                    Livraison
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLivraisons" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/admin/livraisons/"><span id="editerlButton">Editer</span></a>
                        <a class="nav-link" href="/admin/livraisons/"><span id="historylButton">Historique</span></a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="/admin/livreurs/" data-bs-toggle="collapse" data-bs-target="#collapseLivreurs" aria-expanded="false" aria-controls="collapseLivreurs">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-nurse"></i></i></div>
                    Livreurs
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLivreurs" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/admin/livreurs/#add">Ajouter</a>
                        <a class="nav-link" href="/admin/livreurs/#liste">Liste</a>
                    </nav>
                </div>

                <hr>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Connecter en tant que :</div>
            <?php if (isset($_SESSION['user_data'])) {
                echo $_SESSION['user_data']['first_name'] . " " . $_SESSION['user_data']['last_name'];
            } ?>
        </div>
    </nav>
</div>