<?php
ob_start(); //Stocke les informations temporairement
?>

<section id="page">
    <div class="container">
        <div class="container-header row">
            <div class="col-12 text-center">
                <h2>Ma liste en détail</h2>
            </div>
            <hr>
        </div>
        <div class="wishlist">
            <div class="row mt-2">
                <!-- Première carte -->
                <div class="col-12 mb-2">
                    <div class="card d-flex flex-md-row align-items-center">
                        <!-- Image -->
                        <div class="col-md-2">
                            <img src="https://www.king-jouet.com/fstrz/r/s/images.king-jouet.com/6/gu887021_6.jpg?frz-v=4213" class="img-fluid rounded-start" style="max-width: 100px;">
                        </div>
                        <!-- Contenu -->
                        <div class="col-md-8 text-center mt-2 mt-md-0">
                            <h5 class="card-title">[Numéro] Micro lumineux Pat'Patrouille</h5>
                            <div class="card-body">
                                <p class="card-text">Avec le micro lumineux Pat'Patrouille votre enfant va se transformer en chanteur !</p>
                                <p class="card-url">Lien</p>
                            </div>
                        </div>
                        <!-- Bouton -->
                        <div class="col-md-2 text-center mt-2 mt-md-0">
                            <button class="btn offer-button w-100" data-status="available">Offrir ce cadeau</button>
                        </div>
                    </div>
                </div>
                <!-- Fin de la première carte -->
                <div class="col-12 mb-2">
                    <div class="card d-flex flex-md-row align-items-center">
                        <!-- Image -->
                        <div class="col-md-2">
                            <img src="https://www.king-jouet.com/fstrz/r/s/images.king-jouet.com/6/gu887021_6.jpg?frz-v=4213" class="img-fluid rounded-start" style="max-width: 100px;">
                        </div>
                        <!-- Contenu -->
                        <div class="col-md-8 text-center mt-2 mt-md-0">
                            <h5 class="card-title">[Numéro] Micro lumineux Pat'Patrouille</h5>
                            <div class="card-body">
                                <p class="card-text">Avec le micro lumineux Pat'Patrouille votre enfant va se transformer en chanteur !</p>
                                <p class="card-url">Lien</p>
                            </div>
                        </div>
                        <!-- Bouton -->
                        <div class="col-md-2 text-center mt-2 mt-md-0">
                            <button class="btn offer-button w-100" data-status="offered">Déjà offert</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("app/views/components/layout.php");
?>