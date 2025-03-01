<div class="bg-light p-4 rounded-3 pb-5" id="addcSection">
    <h2 class="mb-4">Nouvelle Catégorie</h2>
    <hr>

    <form method="post" action="/admin/controls/addcategorie.php" enctype="multipart/form-data">
        <div class="row">
            <!-- Première colonne -->
            <div class="col-md-6 px-4">
                <!-- Champ Type -->
                <div class="mb-4">
                    <label for="productType" class="form-label fw-bold text-primary">
                        <i class="fas fa-tags me-2"></i>Type de produit
                    </label>
                    <select class="form-select shadow-sm" id="productType" name="id_type_produit" required>
                        <option selected disabled>Choisissez le type d'appartenance</option>
                        <?php
                        $data = allTypeProduits()["data"];
                        foreach ($data as $type) {
                            echo '<option value="' . $type['id_type'] . '">' . $type['nom_type'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!-- Champ Nom de la Catégorie -->
                <div class="mb-4">
                    <label for="categoryName" class="form-label fw-bold text-primary">
                        <i class="fas fa-folder me-2"></i>Nom de la Catégorie
                    </label>
                    <input type="text" class="form-control shadow-sm" id="categoryName" placeholder="Entrez le nom de la catégorie" name="nom_categorie" required>
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div class="col-md-6 px-4">
                <!-- Champ Statut de la Catégorie -->
                <div class="mb-4">
                    <label for="categoryStatus" class="form-label fw-bold text-primary">
                        <i class="fas fa-toggle-on me-2"></i>Statut de la Catégorie
                    </label>
                    <select class="form-select shadow-sm" id="categoryStatus" name="statut_categorie" required>
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <!-- Champ Description de la Catégorie -->
                <div class="mb-4">
                    <label for="categoryDescription" class="form-label fw-bold text-primary">
                        <i class="fas fa-align-left me-2"></i>Description de la Catégorie
                    </label>
                    <textarea class="form-control shadow-sm" id="categoryDescription" rows="3" placeholder="Entrez la description de la catégorie" name="c_description" required></textarea>
                </div>

                <!-- Bouton de soumission -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                        <i class="fas fa-plus-circle me-2"></i>Ajouter la Catégorie
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div id="liste"> </div>
</div>