<?php
ob_start();
?>

<section id="page">
    <div class="container">
        <div class="container-header row">
            <div class="col-12 text-center">
                <h2>Les listes en détail</h2>
            </div>
            <hr>
        </div>
        <div class="wishlist">
            <div class="row mt-2">
                <!-- Première carte -->                        
                <?php if (empty($gifts)): ?>
                    <p>Aucun cadeau trouvé pour cette liste</p>
                <?php else: ?>
                    <?php foreach ($gifts as $gift):?>
                        <div class="col-12 mb-2">
                            <div class="card d-flex flex-md-row align-items-center">
                                <!-- Image -->
                                <div class="col-md-2">
                                    <img src="<?php echo html_entity_decode($gift['gift_image']); ?>" class="img-fluid rounded-start" style="max-width: 100px;">
                                </div> 
                                <!-- Contenu -->
                                <div class="col-md-8 text-center mt-2 mt-md-0">
                                    <h5 class="card-title"><?php echo html_entity_decode($gift['gift_title']); ?></h5>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo html_entity_decode($gift['gift_description']); ?></p>
                                        <p class="card-url"><?php echo html_entity_decode($gift['gift_link']); ?></p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    <?php endforeach; ?> 
                <?php endif; ?> 
            </div>
        </div>
    </div> 
</section>

<?php
$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once __DIR__ . "/../views/components/layout.php";
?>