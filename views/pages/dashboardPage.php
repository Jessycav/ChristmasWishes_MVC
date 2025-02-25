<?php
ob_start(); //Stocke les informations temporairement
?>

<section id="page">
    <div class="container">
        <div class="container-header row">
            <div class="col-12 text-center">
                <h2>DASHBOARD</h2>
                <hr>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!--Main content-->
                <div class="col-md-9 col-lg-100 px-4"> 
                    <div class="col-md-8 col-lg-100 px-4">
                        <h2>BIENVENUE SUR VOTRE ESPACE CLIENT</h2>
                        <hr>
                    </div>
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
</section>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/layout.php");
?>