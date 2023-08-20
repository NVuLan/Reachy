<head>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/site_css/form.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/root.css">

</head>

<body>
    <div class="background_header">
        <img style="width: 100%; height: 50%;" src="<?= $CONTENT_URL ?>/imgs/interface/background.png" alt="">
    </div>
    <div class="container__sign-in">
        <div class="title__sign-in">
            <h1>Đăng Ký</h1>
            <div class="title_link">
                <a href="<?= $SITE_URL ?>/homepage">Home</a> <i class="fa-solid fa-arrow-right-long"></i> Đăng Ký
            </div>
        </div>
        <div class="main__sign-in">
            <div class="main__sign-in-left">
                <img src="<?= $CONTENT_URL ?>/imgs/interface/fashion.jpg" alt="">
            </div>
            <div style="padding-top: 2rem;" class="main__sign-in-right">
                <h2 style="margin-bottom: 1.5rem;">ĐĂNG KÝ</h2>
                <?php
                if (strlen($MESSAGE)) {
                    echo "<h5 class='alert alert-warning'>$MESSAGE</h5>";
                }
                ?>
                <form action="handle_signUp.php" method="POST">
                    <input type="text" name="name" placeholder="Họ Tên"
                        value="<?php if (isset($user_name)) echo $user_name ?>"> <br>
                    <input type="email" name="email" placeholder="Email"
                        value="<?php if (isset($email)) echo $email ?>"> <br>
                    <input type="password" name="password" placeholder="Mật khẩu"> <br>
                    <input type="password" name="repassword" placeholder="Nhập lại password">
                    <input type="number" name="phone_number" placeholder="SDT"
                        value="<?php if (isset($phone_number)) echo $phone_number ?>"> <br>

                    <button name="btn-register" type="submit">
                        <div class="btn_submit">
                            <div class="btn_submit-border">
                                ĐĂNG KÝ
                                <span></span><span></span><span></span><span></span>
                            </div>
                        </div>
                    </button>
                </form>
                <div class="sign__up-link">
                    <a href="<?= $SITE_URL ?>/user?sign_in">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</body>