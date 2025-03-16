<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Christmas Wishes - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Redressed&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?=ROOT?>css/account.css">
    <link rel="stylesheet" href="<?=ROOT?>css/global.css">
    <link rel="stylesheet" href="<?=ROOT?>css/list.css">
    <link rel="stylesheet" href="<?=ROOT?>css/navbar.css">
    <link rel="stylesheet" href="<?=ROOT?>css/responsive.css">
    <link rel="stylesheet" href="<?=ROOT?>css/dashboard.css">
   
</head>
<body class="min-vh-100 d-flex flex-column">
    <section id="dashboard">
        <div class="d-flex" id="wrapper">
            <?php require_once __DIR__ . "/../views/components/userHeader.php" ?>

            <main class="flex-grow-1">
                <?= $content ?>
            </main>
        </div>
    </section>

    <?php require_once __DIR__ . "/../views/components/footer.php" ?>
    <script src="<?=ROOT?>js/script.js"></script>
    <script src="https://kit.fontawesome.com/4c6fdf51a1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>