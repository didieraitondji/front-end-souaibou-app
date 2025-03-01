<div class="bg-light py-4 px-4 rounded-3" id="listecSection">
    <h2 class="mb-4">Catégories Renseignées</h2>
    <hr>

    <?php
    $toutesCategories = allCategories()['data'];

    if (count($toutesCategories) == 0) { ?>
        <div class="py-5 text-info text-center">
            <span><i class="fa-solid fa-triangle-exclamation"></i> Vous n'avez aucune catégorie de produit enregistrée !</span>
        </div>
    <?php } else { ?>
        <div class="table-responsive bg-white p-2 rounded-3 shadow-sm">
            <table class="table table-bordered table-hover text-left">
                <thead class="table-dark">
                    <tr>
                        <th class=" text-left">Type</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th class=" text-center">Statut</th>
                        <th class=" text-center">Date de création</th>
                        <th class=" text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($toutesCategories as $item) { ?>
                        <tr>
                            <td class=" text-left"><?php echo typeProduit($item['id_type_produit'])["data"]["nom_type"]; ?></td>
                            <td> <i class=" fas fa-folder text-primary" style="font-size: 1.1rem;"></i> <?php echo $item['nom_categorie']; ?></td>
                            <td><?php echo tronquerDescription($item['c_description']); ?></td>
                            <td class=" text-center">
                                <span class="badge bg-warning text-dark"> <?php echo $item['statut_categorie']; ?> </span>
                            </td>
                            <td class=" text-center"><?php echo "" . donneDate($item['created_at']); ?></td>
                            <td class=" text-center">
                                <a href="/admin/controls/deletecategorie.php/?ref=<?php echo $item['id_categorie']; ?>" class="btn btn-outline-danger btn-sm" onclick="confirmDeletion(event)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewCategoryModal<?php echo $item['id_categorie']; ?>">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?php echo $item['id_categorie']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal pour visualiser la catégorie -->
                        <div class="modal fade" id="viewCategoryModal<?php echo $item['id_categorie']; ?>" tabindex="-1" aria-labelledby="viewCategoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg"> <!-- Modale large -->
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white"> <!-- En-tête coloré -->
                                        <h5 class="modal-title" id="viewCategoryModalLabel">Détails de la catégorie</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <!-- Carte pour le nom de la catégorie et le type de produit associé-->
                                        <div class="row mb-3">
                                            <!-- Colonne pour le nom -->
                                            <div class="col-md-6 mb-3 mb-md-0"> <!-- Responsive : empilement sur petits écrans -->
                                                <div class="card h-100 shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <strong>Nom de la catégorie</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"> <?php echo $item['nom_categorie']; ?> </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Colonne du type de produit associé -->
                                            <div class="col-md-6">
                                                <div class="card h-100 shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <strong> Type de Produit Associé </strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"><?php echo typeProduit($item['id_type_produit'])["data"]["nom_type"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Carte pour la description -->
                                        <div class="card mb-3 shadow-sm">
                                            <div class="card-header bg-light">
                                                <strong>Description</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"><?php echo $item['c_description']; ?></p>
                                            </div>
                                        </div>

                                        <!-- Ligne pour statut et date de création -->
                                        <div class="row mb-3">
                                            <!-- Colonne pour le statut -->
                                            <div class="col-md-6 mb-3 mb-md-0"> <!-- Responsive : empilement sur petits écrans -->
                                                <div class="card h-100 shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <strong>Statut</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text">
                                                            <span class="badge bg-warning text-dark"><?php echo $item['statut_categorie']; ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Colonne pour la date de création -->
                                            <div class="col-md-6">
                                                <div class="card h-100 shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <strong>Date de création</strong>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text"><?php echo donneDate($item['created_at']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal pour modifier la catégorie -->
                        <div class="modal fade" id="editCategoryModal<?php echo $item['id_categorie']; ?>" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCategoryModalLabel">Modifier la catégorie</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/controls/updatecategorie.php" method="POST">
                                            <input type="hidden" name="id_categorie" value="<?php echo $item['id_categorie']; ?>">
                                            <div class="mb-3">
                                                <label for="nom_categorie" class="form-label">Nom de la catégorie</label>
                                                <input type="text" class="form-control" id="nom_categorie" name="nom_categorie" value="<?php echo $item['nom_categorie']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="productType" class="form-label">Type</label>
                                                <select class="form-select" id="productType" name="id_type_produit" required>
                                                    <option disabled>Choisissez le type d'appartenance</option>
                                                    <?php

                                                    $data = allTypeProduits()["data"];

                                                    foreach ($data as $type) {

                                                        if ($type['id_type'] == $item['id_type_produit']) {
                                                            echo '<option value="' . $type['id_type'] . '" selected >' . $type['nom_type'] . '</option>';
                                                        } else {
                                                            echo '<option value="' . $type['id_type'] . '">' . $type['nom_type'] . '</option>';
                                                        }
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="c_description" class="form-label">Description</label>
                                                <textarea class="form-control" id="c_description" name="c_description" rows="3" required><?php echo $item['c_description']; ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="statut_categorie" class="form-label">Statut</label>
                                                <select class="form-select" id="statut_categorie" name="statut_categorie" required>
                                                    <option value="Active" <?php echo $item['statut_categorie'] == 'Active' ? 'selected' : ''; ?>>Active</option>
                                                    <option value="Inactive" <?php echo $item['statut_categorie'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>