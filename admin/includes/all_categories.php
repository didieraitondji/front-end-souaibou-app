<div class="bg-light py-4 px-4 rounded-3" id="listecSection">
    <h2 class="mb-4">Toutes les catégories disponibles</h2>
    <hr>

    <?php
    $toutesCategories = allCategories()['data'];

    if (count($toutesCategories) == 0) { ?>
        <div class=" py-5 text-info text-center">
            <span> <i class="fa-solid fa-triangle-exclamation"></i> Vous n'avez aucune catégorie de produit enrégistré !</span>
        </div>
    <?php } else { ?>
        <div class="row gx-4 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center bg-white p-2">
            <?php foreach ($toutesCategories as $item) {
            ?>

                <div class="col mb-2 mt-2">
                    <div class="card h-100">

                        <div class="product-image-container">
                            <img src="<?php echo $item['c_image']; ?>" alt="<?php echo $item['nom_categorie']; ?>" class="card-img-top">
                        </div>

                        <!-- Détails du produit -->
                        <div class="card-body p-2">
                            <div class="text-center">
                                <h5 class="fw-bolder"> <?php echo $item["nom_categorie"]; ?> </h5>
                                <p class="text-muted px-2"> <?php echo $item['c_description']; ?> </p>
                            </div>

                            <!-- quantité en stock -->
                            <div class="text-center">
                                <div class=" text-bg-warning d-inline-block text-center rounded-5 px-2 ">
                                    <?php echo $item['statut_categorie']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer pb-0">
                            <!-- les boutons d'action -->
                            <div class=" d-flex flex-row justify-content-center align-items-center py-2">
                                <div class="px-2">
                                    <a href="/admin//controls/deletecategorie.php/?ref=<?php echo $item['id_categorie']; ?>" class="btn btn-outline-danger btn-sm" onclick=" confirmDeletion(event)">
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
                            <div class=" w-100 text-center text-bg-light rounded rounded-bottom-5 text-info fst-italic fw-bold" style="font-size: 0.7rem;"> <?php echo "Depuis le " . donneDate($item['created_at']); ?> </div>
                        </div>
                    </div>
                </div>

        <?php


            }
        } ?>
        </div>
</div>