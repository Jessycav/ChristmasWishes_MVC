<?php
ob_start(); //Stocke les informations temporairement
?>

<div id="page-content-wrapper" class="container-fluid d-flex align-items-center my-4">
    <div class="row">
        <h2 class="text-align-center text-uppercase fs-2 m-0">Mon profil</h2>
        <hr>
        <div class="col-md-8 col-lg-10">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">Informations personnelles</h4>
                    <hr>
                    <?php if (!empty($datasUser)): ?>
                    <p class="card-text">Prénom : <?= htmlspecialchars($datasUser['user_firstname']) ?></p>
                    <p class="card-text">Nom : <?= htmlspecialchars($datasUser['user_lastname']) ?></p>
                    <p class="card-text">Adresse mail : <?= htmlspecialchars($datasUser['email']) ?></p>
                    <?php else: ?>
                        <p>Aucune information trouvée</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h3>Changer mon mot de passe</h3>
                    <form class="row g-3" id="account-form" method="POST" name="changePassword" action="user_account.php">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="current_password" id="floatingPassword" placeholder="Mot de passe" required>
                            <label for="floatingPassword"><i class="fa-solid fa-key"></i> Mot de passe actuel</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="new_password" id="floatingPassword" placeholder="Mot de passe" required>
                            <label for="floatingPassword"><i class="fa-solid fa-key"></i> Nouveau mot de passe</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="confirm_password" id="floatingPassword" placeholder="Confirmation du nouveau mot de passe" required>
                            <label for="floatingPassword"><i class="fa-solid fa-key"></i> Confirmation du mot de passe</label>
                        </div>
                        <div class="col-12 text-center">
                            <input type="submit" class="btn w-auto" name="changePassword" data-bs-toggle="modal" data-bs-target="#changePasswordModal" value="Changer le mot de passe">
                            <!-- Fenêtre modale -->
                            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Le mot de passe a été modifié</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn close" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <a href="<?= ROOT ?>monCompte/logout"><button class="btn">Se déconnecter</button></a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once __DIR__ . '/../components/userLayout.php';
?>