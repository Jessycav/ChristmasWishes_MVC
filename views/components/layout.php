<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Christmas Wishes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Redressed&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=ROOT?>public/css/account.css">
    <link rel="stylesheet" href="<?=ROOT?>public/css/global.css">
    <link rel="stylesheet" href="<?=ROOT?>public/css/list.css">
    <link rel="stylesheet" href="<?=ROOT?>public/css/navbar.css">
    <link rel="stylesheet" href="<?=ROOT?>public/css/responsive.css">
</head>
<body class="min-vh-100 d-flex flex-column">

    <?php require_once ("./views/components/header.php") ?>

    <main class="flex-grow-1">
        <?= $content ?>
    </main>

    <?php require_once ("./views/components/footer.php") ?>
    <script src="<?=ROOT?>public/js/script.js"></script>
    <script src="https://kit.fontawesome.com/4c6fdf51a1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>