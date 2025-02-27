<?php
ob_start(); //Stocke les informations temporairement
?>

<section id="page">
    <div class="container">                             
        <!--Titre centré-->
        <div class="container-header row">
            <div class="col-12 text-center">
                <h2>Listes disponibles</h2>
            </div>
            <hr>
        </div>
        <div class="wishlist">
            <h5>Retrouvez ici toutes les listes créées par nos utilisateurs.</h5>
            <br>
            <h5>Pour une navigation optimale, utilisez l'outil de recherche!</h5>
            <br>
            <div class="container">
                <form class="d-flex flex-column w-100">
                    <input class="form-control" type="search" placeholder="Entrez le nom de la liste" aria-label="Search">
                    <button class="btn btn-outline my-2 my-sm-0" type="submit">Rechercher</button>
                </form>
            </div>
            <br>
            <hr>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <!-- Une carte -->
                <div class="col">
                    <div class="card">                        
                        <?php 
                        foreach ($wishlists as $wishlist): 
                        ?>
                        <div class="card-header">
                            LISTE DE NOEL - <?php echo htmlspecialchars($wishlist['wishlist_year']); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Liste pour <?php echo htmlspecialchars($wishlist['wishlist_recipient']); ?></h5>
                            <p class="card-text">Voici tous les présents souhaités par <?php echo htmlspecialchars($wishlist['wishlist_recipient']); ?></p>
                            <form action="<?= ROOT ?>listes/detailListe" method="POST">
                                <input type="hidden" value="<?= $wishlist['wishlist_id'] ?>" name="wishlist_id">
                                <button class="btn" type="submit">Voir la liste</button>                                        
                            </form>
                        </div>
                        <div class="card-footer text-body-secondary">
                            Ajouté par [Nom] [Prénom]
                        </div>
                        <?php endforeach; ?>
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