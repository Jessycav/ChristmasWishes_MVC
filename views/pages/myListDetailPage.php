<?php
ob_start();
?>


<div id="page-content-wrapper" class="container-fluid d-flex align-items-center my-4">
    <div class="row">
        <h2 class="text-align-center text-uppercase fs-2 m-0">Ma liste en détail</h2>
        <hr>
        <div class="col-12 text-center new-list-btn">
            <input type="submit" class="btn" name="addGift" data-bs-toggle="modal" data-bs-target="#AddNewGiftModal" value="+ Nouveau cadeau">
            <!-- Fenêtre modale -->
            <div class="modal fade" id="AddNewGiftModal" tabindex="-1" aria-labelledby="AddNewGiftModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="AddNewGiftModalLabel">Ajouter une nouveau cadeau</h5>
                            <button type="button" class="btn ms-auto" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= ROOT ?>monCompte/gestionListe/nouveauCadeau">
                                <input type="hidden" name="wishlist_id" value="<?= $_POST['wishlist_id'] ?>">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" name="gift_title" placeholder="Title" aria-label="Title" required>
                                    <label for="floatingInput">Titre</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" name="gift_description" placeholder="Description" aria-label="Description" required>
                                    <label for="floatingInput">Description</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" name="gift_link" placeholder="Link" aria-label="Link">
                                    <label for="floatingInput">Lien d'achat</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" name="gift_image" placeholder="Image" aria-label="First name">
                                    <label for="floatingInput">Image</label>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success text-center">Ajouter ce cadeau</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Lien</th>
                    <th>Image</th>
                    <th>Actions</th>
                </thead>
                <tbody> 
                    <?php if(!empty($datas)): ?>
                        <tr class="align-middle">
                            <?php foreach($datas as $data): ?>
                                <td><?= html_entity_decode($data['gift_title']) ?></td>
                                <td><?= html_entity_decode($data['gift_description']) ?></td>
                                <td><?= html_entity_decode($data['gift_link']) ?></td>
                                <td><?= html_entity_decode($data['gift_image']) ?></td>
                                <td>
                                    <form action="<?= ROOT ?>monCompte/gestionListe/modifierCadeau" method="POST">
                                        <input type="hidden" value="<?= $data['gift_id'] ?>" name="gift_id">
                                        <button class="btn" type="submit"><i class="fa-solid fa-pen-to-square"></i></button>                                        
                                    </form>
                                    <form action="<?= ROOT ?>monCompte/gestionListe/supprimerCadeau" method="POST">
                                        <input type="hidden" value="<?= $data['gift_id'] ?>" name="gift_id">
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
        <a href="<?= ROOT ?>monCompte/mesListes"><button class="btn" type="submit" name="submit">Retour à mes listes</button></a>
    </div>
</div>


<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>
