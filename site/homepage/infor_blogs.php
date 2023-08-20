<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/form.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/blogs.css">
</head>
<?php
$blog = blog_selectById($_GET['id_blog']);
blog_increaseView($_GET['id_blog']);
$blog_content = explode("`", $blog['content']);
$blog_img = explode("`", $blog['img']);
?>

<body>
    <div class="background_header">
        <img style="width: 100%; height: 50%;" src="<?= $CONTENT_URL ?>/imgs/interface/background.png" alt="">
    </div>
    <div class="container__sign-in">
        <div class="title__sign-in">
            <h1>TIN TỨC</h1>
            <div class="title_link">
                <a href="<?= $SITE_URL ?>/homepage">Home</a> <i class="fa-solid fa-arrow-right-long"></i> Tin tức
            </div>
        </div>
    </div>
    <div class="blog_container">
        <div class="container_i4">
            <h2><?= $blog['title'] ?></h2>
            <br><br><span><?= $blog_content[0] ?></span>
            <br><br>
            <div class="i4_img"><img src="<?= $CONTENT_URL ?>/imgs/blogs/<?= $blog_img[0] ?> " alt="" width="100%">
            </div>
            <br><span><?= $blog_content[1] ?></span>
            <br><br>
            <div class="i4_img"><img src="<?= $CONTENT_URL ?>/imgs/blogs/<?= $blog_img[1] ?> " alt="" width="100%">
            </div>
            <br><span><?= $blog_content[2] ?></span>
            <br><br>
            <div class="i4_img"><img src="<?= $CONTENT_URL ?>/imgs/blogs/<?= $blog_img[2] ?> " alt="" width="100%">
            </div>
            <br><span><?= $blog_content[3] ?></span><br><br>
        </div>
    </div>
</body>

</html>