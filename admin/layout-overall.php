<?php
// require_once "../dao/pdo.php";
require_once "../dao/brand.php";
require_once "../dao/category.php";
require_once "../dao/product.php";
// require_once "../dao/user.php";
require_once "../dao/comment.php";
require_once "../dao/slider.php";
require_once "../dao/blog.php";
require_once "../dao/bill.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= $CONTENT_URL ?>/imgs/interface/logo.svg" />

    <title>Reachy</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/header-admin.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/add-category.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/list-category.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/add-user.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/404.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/category.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&family=Nunito:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">

</head>

<body>
    <div class="container">
        <header>
            <?php require_once "layout/header.php"; ?>
        </header>
        <main>
            <?php
            require $VIEW_NAME;
            ?>
        </main>
        <footer>
            <?php require_once "layout/footer.php"; ?>
        </footer>
    </div>
</body>
<script src="<?= $CONTENT_URL ?>/js/brandByCate.js"></script>
<script src="<?= $CONTENT_URL ?>/js/billDetail.js"></script>

</html>