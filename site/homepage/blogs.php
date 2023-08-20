<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/form.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/blogs.css">
</head>
<?php
$blog_list = blog_selectAll();
?>

<body>
    <div class="background_header">
        <img style="width: 100%; height: 50%;" src="<?= $CONTENT_URL ?>/imgs/interface/background.png" alt="">
    </div>
    <div class="title__sign-in">
        <h1>TIN TỨC</h1>
        <div class="title_link">
            <a href="<?= $SITE_URL ?>/homepage">Home</a> <i class="fa-solid fa-arrow-right-long"></i> Tin tức
        </div>
    </div>
    <div class="blogs__container">
        <div class="container_blogs">
            <?php foreach ($blog_list as $blog_row) {
                $blog_content = explode("`", $blog_row['content']);
            ?>
            <div class="blogs_row">
                <a class="promotion_blogs"
                    href="<?= $SITE_URL ?>/homepage?infor_blogs&id_blog=<?= $blog_row['id_blog'] ?>">
                    <div class="img_blogs">
                        <img src="<?= $CONTENT_URL ?>/imgs/blogs/<?= blog_selectFirstImg($blog_row['id_blog']) ?> "
                            alt="" width="100%">
                    </div>
                    <div class="content_blogs">
                        <h2><?= $blog_row['title'] ?></h2>
                        <i><span>Lượt xem: <?= $blog_row['view'] ?></span> | <?= $blog_row['date'] ?></i>
                        <div class="blog_shortContent"><?= $blog_content[0] ?></div>
                        <div class="view_more"><button type="submit">Xem thêm</button></div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>