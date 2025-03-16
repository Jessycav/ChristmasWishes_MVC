<?php
ob_start(); //Stocke les informations temporairement
?>

<section id="page">
    <div class="container">
        <!--Titre centré-->
        <div class="container-header row">
            <div class="col-12 text-center">
                <h2>Mon espace client</h2>
            </div>
            <hr>
        </div>
        <!--Connexion et inscription-->
        <div class="row sm-g-4">
            <!--Section connexion-->
            <div class="col-md-6">            
                <div class="form-wrapper">
                    <div class="form-section">
                        <h3>CONNEXION</h3>
                        <!--Espace de connexion-->
                        <form method="POST" action="<?=ROOT?>monCompte/connexion">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                                <label for="floatingInput"><i class="fa-solid fa-envelope me-2"></i>Adresse email</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                                <label for="floatingPassword"><i class="fa-solid fa-key me-2"></i>Mot de passe</label>
                            </div>
                            <div class="col-12">
                                <a href="<?=ROOT?>monCompte/dashboard"><button type="submit" name="login" class="btn">Se connecter</button></a>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
            <div class="col-md-6">            
                <div class="form-wrapper">
                    <div class="form-section">
                        <h3>INSCRIPTION</h3>
                        <!--Espace d'inscription-->
                        <form method="POST" action="<?=ROOT?>monCompte/inscription">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="user_firstname" placeholder="First name" aria-label="First name">
                                <label for="floatingInput"><i class="fa-solid fa-user me-2"></i>Prénom</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="user_lastname" placeholder="Last name" aria-label="Last name">
                                <label for="floatingInput"><i class="fa-solid fa-user me-2"></i>Nom</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput"><i class="fa-solid fa-envelope me-2"></i>Adresse email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword"><i class="fa-solid fa-key me-2"></i>Mot de passe</label>
                            </div>
                            <div class="col-12">
                                <a href="<?=ROOT?>monCompte/authentification"><button type="submit" name="register" class="btn">S'inscrire</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</section>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once __DIR__ . "/../views/components/layout.php";
?>