<?php
ob_start(); //Stocke les informations temporairement
?>

<div id="page-content-wrapper" class="container-fluid d-flex align-items-center my-4">
    <div class="row">
        <i class="fa fa-user-circle fa-3x"><h2 class="text-align-center fs-2 m-0">BIENVENUE SUR VOTRE ESPACE CLIENT</h2></i>
        <div class="container-fluid py-4">
            <div class="card mt-4 mb-3">
                <div class="card-body">
                    <h5 class="card-title">Nombre de listes créées</h5>
                    <p class="card-text display-4">
                        <?= htmlspecialchars($wishlistCount); ?>
                    </p>
                </div>
            </div>
        </div>   
    </div>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>