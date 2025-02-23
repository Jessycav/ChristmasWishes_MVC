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
                        <form method="POST" action="login">
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
                        <form method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="firstname" placeholder="First name" aria-label="First name">
                                <label for="floatingInput"><i class="fa-solid fa-user me-2"></i>Prénom</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="lastname" placeholder="Last name" aria-label="Last name">
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
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword"><i class="fa-solid fa-key me-2"></i>Confirmation du mot de passe</label>
                            </div>
                            <div class="form-floating col-12">
                                <!-- Bouton fenêtre modale -->
                                <a href="<?=ROOT?>authentification"><button type="submit" class="btn" name="register" data-bs-toggle="modal" data-bs-target="#exampleModal">S'inscrire</button></a>

                                <!-- Fenêtre modale -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Votre inscription est enregistrée !</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-bs-dismiss="modal">Fermer</button>
                                                <a href="<?=ROOT?>monCompte/dashboard"><button type="button" class="btn">Voir mon compte</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
require_once("./views/components/layout.php");
?>