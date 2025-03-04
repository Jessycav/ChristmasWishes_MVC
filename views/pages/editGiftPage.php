<?php
ob_start();
?>

<div class="col-sm-auto col-md-9 col-lg-12 px-md-4">
    <h5>Formulaire de modification</h5>              
    <?php if (!empty($gift)): ?>
        <form method="POST" action="<?= ROOT ?>monCompte/gestionListe/updateCadeau">
            <input type="hidden" name="gift_id" value="<?= $gift['gift_id'] ?>">
            <input type="hidden" name="wishlist_id" value="<?= $gift['wishlist_id'] ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="gift_title" value="<?= htmlspecialchars($gift['gift_title']) ?>" placeholder="Title" aria-label="Title" required>
                <label for="floatingInput">Titre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="gift_description" value="<?= htmlspecialchars($gift['gift_description']) ?>" placeholder="Description" aria-label="Description" required>
                <label for="floatingInput">Description</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="gift_link" value="<?= htmlspecialchars($gift['gift_link']) ?>"  placeholder="Link" aria-label="Link">
                <label for="floatingInput">Lien d'achat</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="gift_image" value="<?= htmlspecialchars($gift['gift_image']) ?>" placeholder="Image" aria-label="Image">
                <label for="floatingInput">Image</label>
            </div>
            <button type="submit">Modifier</button>
        </form>
    <?php else: ?>
        <p>Cadeau introuvable</p>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once("./views/components/userLayout.php");
?>