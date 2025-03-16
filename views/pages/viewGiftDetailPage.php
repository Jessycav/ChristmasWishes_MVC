<?php
ob_start();
?>

<div id="page-content-wrapper" class="container-fluid d-flex align-items-center my-4">
    <div class="row">
        <h2 class="text-align-center text-uppercase fs-2 m-0">Ma liste en détail</h2>
        <hr>
        <div class="card d-flex flex-md-column align-items-center">
            <?php if (!empty($oneGift)): ?>
            <h5>Nom du cadeau : <?= html_entity_decode($oneGift['gift_title']); ?></h5>
            <p>Description du cadeau : <?= html_entity_decode($oneGift['gift_description']); ?></p>  
            <p>Lien d'achat : <?= html_entity_decode($oneGift['gift_link']) ?></p>
            <p>Image : </p>
            <img src='<?= html_entity_decode($oneGift['gift_image']) ?>' 
            alt='<?= html_entity_decode($oneGift['gift_title'], ENT_QUOTES); ?>'
            style="width: 10rem; height: 10rem;">     
            <?php else: ?>
                <p>Cadeau introuvable</p>
            <?php endif; ?>   
        </div> 
        <form action="<?= ROOT ?>monCompte/gestionListe/modifierListe" method="POST">
            <input type="hidden" value="<?= $oneGift['wishlist_id'] ?>" name="wishlist_id">
            <button class="btn" type="submit" name="submit">Retour à la liste</button>
        </form>
    </div>               
</div>            

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>
