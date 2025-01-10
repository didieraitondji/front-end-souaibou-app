<div class="bg-light p-4 rounded-3" id="addcSection">
    <h2 class="mb-4">Ajouter une Nouvelle Catégorie</h2>
    <hr>
    <form method="post" action="/admin/controls/addcategorie.php" enctype="multipart/form-data">
        <div class="row">
            <!-- Première colonne -->
            <div class="col-md-6 px-4">
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Nom de la Catégorie</label>
                    <input type="text" class="form-control" id="categoryName" placeholder="Entrez le nom de la catégorie" name="nom_categorie" required>
                </div>
                <div class="mb-3">
                    <label for="categoryDescription" class="form-label">Description de la Catégorie</label>
                    <textarea class="form-control" id="categoryDescription" rows="4" placeholder="Entrez la description de la catégorie" name="c_description" required></textarea>
                </div>

            </div>

            <!-- Deuxième colonne -->
            <div class="col-md-6 px-4">
                <div class="mb-3">
                    <label for="categoryImage" class="form-label">Image de la Catégorie</label>
                    <input type="file" class="form-control" name="c_image" id="categoryImage" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="categoryStatus" class="form-label">Statut de la Catégorie</label>
                    <select class="form-select" id="categoryStatus" name="statut_categorie" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter la Catégorie</button>
            </div>
        </div>
        <div id="liste"> </div>
    </form>
</div>