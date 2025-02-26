<?php
ob_start(); //Stocke les informations temporairement
?>

<section id="page">
    <div class="container">
        <div class="container-header row">
            <div class="col-12 text-center">
                <h2>Mes listes</h2>
                <hr>
            </div>
        </div>
        <div class="wishlist">
            <div class="row row-cols-lg-3">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="col-12 text-center new-list-btn">
                        <input type="submit" class="btn" name="newList" data-bs-toggle="modal" data-bs-target="#AddNewListModal" value="+ Nouvelle liste">
                    <!-- Fenêtre modale -->
                        <div class="modal fade" id="AddNewListModal" tabindex="-1" aria-labelledby="AddNewListModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AddNewListModalLabel">Ajouter une nouvelle liste</h5>
                                        <button type="button" class="btn-close ms-auto" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="<?=ROOT?>monCompte/gestionListe/nouvelleListe">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="floatingInput" name="wishlist_year" placeholder="Year" aria-label="Year" required>
                                                <label for="floatingInput">Année</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" name="wishlist_recipient" placeholder="First name" aria-label="First name" required>
                                                <label for="floatingInput">Prénom</label>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success text-center" name="createNewWishlist">Ajouter la liste</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <th>Année</th>
                            <th>Prénom du destinataire</th>
                            <th>Actions</th>
                        </thead>
                        <tbody> 
                            <?php if(!empty($myWishlists)): ?>
                                <tr>
                                    <?php foreach($myWishlists as $myWishlist): ?>
                                        <td><?= htmlspecialchars($myWishlist['wishlist_year']) ?></td>
                                        <td><?= htmlspecialchars($myWishlist['wishlist_recipient']) ?></td>
                                        <td>
                                            <form action="<?= ROOT ?>monCompte/gestionListe/DetailDeMaListe" method="POST">
                                                <input type="hidden" value="<?= $myWishlist['wishlist_id'] ?>" name="wishlist_id">
                                                <button class="btn" type="submit"><i class="fa-solid fa-eye"></i></button>
                                            </form>
                                            <form action="<?= ROOT ?>monCompte/gestionListe/modifierListe" method="POST">
                                                <input type="hidden" value="<?= $myWishlist['wishlist_id'] ?>" name="wishlist_id">
                                                <button class="btn" type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </form>
                                            <form action="<?= ROOT ?>monCompte/gestionListe/supprimerListe" method="POST">
                                                <input type="hidden" value="<?= $myWishlist['wishlist_id'] ?>" name="wishlist_id">
                                                <button class="btn" type="submit" name="submit"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php else: ?>
                                <p>Aucune liste de souhaits créée</p>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>