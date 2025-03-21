<?php
ob_start(); //Stocke les informations temporairement
?>

<section id="home">
    <div class="snowfall-container">
        <div class="snowflake"></div>
    </div>
    <div class="main">
        <h1>Ma liste de Noël</h1>
        <h2>Créez une liste de cadeaux de Noël personnalisée</h2>
        <br>
        <p>Grâce à ce site, créez gratuitement votre liste de Noël en y rassemblant toutes vos envies.</p>
        <br>
        <p>Partagez facilement votre wishlist avec vos proches !</p>      
        <a href="<?=ROOT?>monCompte/authentification"><button type="submit" class="btn">Commencer ma liste</button></a>
    </div>
</section>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once __DIR__ . '/../components/layout.php';
?>
