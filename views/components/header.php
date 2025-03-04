<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">Christmas Wishes</div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= ROOT ?>">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= ROOT ?>listes/toutesleslistes">Voir les listes</a>
                    </li>                
                    <?php if(empty($_SESSION)): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT ?>monCompte/authentification" >Connexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT ?>monCompte/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ROOT ?>monCompte/logout">Déconnexion</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</header>