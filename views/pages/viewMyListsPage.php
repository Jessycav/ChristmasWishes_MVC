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
                    <table class="table">
                        <thead>
                            <th>Année</th>
                            <th>Prénom du destinataire</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php 
                            //Boucle sur la variable result
                            foreach($myWishlists as $myWishlist) {
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($myWishlist['wishlist_year']) ?></td>
                                    <td><?= htmlspecialchars($myWishlist['wishlist_recipient']) ?></td>
                                    <td>
                                        <a href="user_list_detail.php?wishlist_id=<?= $myWishlist['wishlist_id'] ?>"><i class="fa-solid fa-eye"></i></a>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>                        
                    <div class="col-12 text-center new-list-btn">
                        <input type="submit" class="btn" name="newList" data-bs-toggle="modal" data-bs-target="#AddNewListModal" value="+ Nouvelle liste">
                        <!-- Fenêtre modale -->
                        <div class="modal fade" id="AddNewListModal" tabindex="-1" aria-labelledby="AddNewListModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addWishlist">Ajouter une nouvelle liste</h5>
                                        <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="createWishlist">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" name="wishlist_year" placeholder="Year" aria-label="Year">
                                                <label for="floatingInput">Année</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" name="wishlist_recipient" placeholder="First name" aria-label="First name">
                                                <label for="floatingInput">Prénom</label>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success text-center" name="add_list">Ajouter la liste</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>