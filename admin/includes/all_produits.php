<div id="liste">
    <div class="bg-light py-4 px-4 rounded-3" id="listepSection">
        <h2 class="mb-4">Tout les Produits</h2>
        <hr>

        <?php
        $tousProduits = allProduits()['data'];

        if (count($tousProduits) == 0) { ?>
            <div class=" py-5 text-info text-center">
                <span> <i class="fa-solid fa-triangle-exclamation"></i> Vous n'avez aucun produit enrégistré !</span>
            </div>
        <?php } else { ?>
            <div class="row gx-4 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center bg-white p-2">
                <?php foreach ($tousProduits as $item) {
                ?>

                    <div class="col mb-2 mt-2">
                        <div class="card h-100">
                            <?php
                            if ($item["est_en_promotion"] == 1 &&  promotionActive($item['date_fin_promotion']) && !promotionActive($item['date_debut_promotion'])) {
                                echo '<div class="badge bg-dark text-info position-absolute" style="top: 0.5rem; right: 0.5rem">en promotion</div>';
                            }
                            ?>
                            <div class="product-image-container">
                                <img src="<?php echo $item['p_image']; ?>" alt="Ordinateur Portable" class="card-img-top">
                                <div class="badge bg-dark text-white position-relative" style="bottom: 0.5rem; left: 0.5rem;">
                                    <?php echo categorie($item['id_categorie'])['data']['nom_categorie']; ?>
                                </div>
                            </div>

                            <!-- Détails du produit -->
                            <div class="card-body p-2">
                                <div class="text-center">
                                    <h5 class="fw-bolder"> <?php echo $item["nom_produit"]; ?> </h5>
                                    <p class="text-muted px-2"> <?php echo $item['p_description']; ?> </p>
                                </div>
                                <!-- quantité en stock -->
                                <div class="text-center">
                                    <div class=" text-bg-warning d-inline-block text-center rounded-5 px-2 ">
                                        <?php echo 'Stock : ' . $item['quantite_stock']; ?>
                                    </div>
                                </div>
                                <!-- le prix du produit -->
                                <div class="text-center pt-3">
                                    <p>
                                        <?php
                                        if ($item["est_en_promotion"] == 1 && promotionActive($item['date_fin_promotion']) && !promotionActive($item['date_debut_promotion'])) {
                                            echo '<span class="text-decoration-line-through">XOF ' . $item['prix'] . '</span>';
                                            echo '<span class="fw-bold text-success"> XOF ' . $item['prix_promotionnel'] . '</span>';
                                        } else {
                                            echo '<span class="fw-bold text-success"> XOF ' . $item['prix'] . '</span>';
                                        }
                                        ?>
                                    </p>
                                </div>
                                <?php
                                if ($item["est_en_promotion"] == 1 && promotionActive($item['date_fin_promotion']) && !promotionActive($item['date_debut_promotion'])) {
                                    echo '<div class=" text-center "> <div class=" text-bg-warning d-inline-block text-center rounded-5 px-2 fst-italic fw-bold" style="font-size: 0.7rem;">' . 'Fin de la promotion : ' . donneDate($item['date_fin_promotion']) . '</div></div>';
                                }
                                ?>
                            </div>

                            <div class="card-footer pb-0">
                                <!-- les boutons d'action -->
                                <div class=" d-flex flex-row justify-content-center align-items-center py-2">
                                    <div class="px-2">
                                        <a href="/admin//controls/deleteproduit.php/?ref=<?php echo $item['id_produit']; ?>" class="btn btn-outline-danger btn-sm" onclick=" confirmDeletion(event)">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                    <div class="px-2">
                                        <a href="#" class="btn btn-outline-primary btn-sm">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                    </div>
                                    <div class="px-2">
                                        <a href="#" class="btn btn-outline-primary btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr class=" pb-0 mb-0 mt-0">
                                <div class=" w-100 text-center text-bg-light rounded rounded-bottom-5 text-info fst-italic fw-bold" style="font-size: 0.7rem;"> <?php echo "Ajouté le " . donneDate($item['created_at']); ?> </div>
                            </div>
                        </div>
                    </div>

            <?php


                }
            } ?>
            </div>
    </div>
</div>