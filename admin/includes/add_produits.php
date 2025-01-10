<div class="bg-light p-4 rounded-3" id="addpSection">
    <h2 class="mb-4">Ajouter un Nouveau Produit</h2>
    <hr>
    <form method="post" action="/admin/controls/addproduit.php" enctype="multipart/form-data">
        <div class="row">
            <!-- Première colonne -->
            <div class="col-md-6 px-4">
                <div class="mb-3">
                    <label for="productName" class="form-label">Nom du Produit</label>
                    <input type="text" class="form-control" id="productName" placeholder="Entrez le nom du produit" name="nom_produit" required>
                </div>
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Catégorie</label>
                    <select class="form-select" id="productCategory" name="id_categorie" required>
                        <option selected disabled>Choisissez une catégorie</option>
                        <?php
                        $data = allCategories()["data"];

                        foreach ($data as $categorie) {
                            echo '<option value="' . $categorie['id_categorie'] . '">' . $categorie['nom_categorie'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Prix</label>
                    <input type="number" min="0" step="0.01" class="form-control" id="productPrice" placeholder="Entrez le prix du produit" name="prix" required>
                </div>
                <div class="mb-3">
                    <label for="productStock" class="form-label">Quantité en Stock</label>
                    <input type="number" min="0" class="form-control" id="productStock" placeholder="Entrez la quantité en stock" name="quantite_stock" required>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Image du Produit</label>
                    <input type="file" class="form-control" name="p_image" id="productImage" accept="image/*">
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div class="col-md-6 px-4">
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="productDescription" rows="2" placeholder="Entrez la description du produit" name="p_description" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="productPromotion" class="form-label">En Promotion</label>
                    <select class="form-select" id="productPromotion" required onchange="togglePromotionFields()" name="est_en_promotion">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>

                <!-- Champs de promotion cachés par défaut -->
                <div id="promotionFields" style="display: none;">
                    <div class="mb-3">
                        <label for="promotionalPrice" class="form-label">Prix Promotionnel</label>
                        <input type="number" step="0.01" class="form-control" id="promotionalPrice" placeholder="Entrez le prix promotionnel" name="prix_promotionnel">
                    </div>
                    <div class="mb-3">
                        <label for="promotionDates" class="form-label">Dates de Promotion</label>
                        <div class="d-flex">
                            <input type="datetime-local" class="form-control me-2" id="promotionStartDate" placeholder="Début" name="date_debut_promotion">
                            <input type="datetime-local" class="form-control" id="promotionEndDate" placeholder="Fin" name="date_fin_promotion">
                        </div>
                        <small id="error-message" class="text-danger" style="display: none;">La date de fin doit être supérieure à la date de début.</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-2 w-100">Ajouter le Produit</button>
            </div>
        </div>
    </form>
    <div id="liste"> </div>
</div>