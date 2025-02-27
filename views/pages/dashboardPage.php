<?php
ob_start(); //Stocke les informations temporairement
?>

<section id="dashboard">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 d-flex justify-content-between">
                        <h2>DASHBOARD</h2>
                        <hr>
                        <h2 class="pull-left">BIENVENUE SUR VOTRE ESPACE CLIENT</h2>
                        <a href="create.php" class="btn btn-success"><i class="bi bi-plus"></i> Ajouter</a>
                    </div>
                    <!-- Sidebar-->
                    <nav class="col-md-4 col-lg-2 sidebar">
                        <div class="text-center">
                            <div class="profile-img"><i class="fa-solid fa-circle-user"></i></div>
                        </div>
                        <a href="<?= ROOT ?>monCompte/profil">Mon profil</a>
                        <a href="<?= ROOT ?>monCompte/mesListes">Mes listes</a>
                        <a href="logout">Se déconnecter</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>