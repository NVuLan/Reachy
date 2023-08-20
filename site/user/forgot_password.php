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
            <h1>Quên mật khẩu</h1>
            <div class="title_link">
                <a href="<?= $SITE_URL ?>/homepage">Home</a> <i class="fa-solid fa-arrow-right-long"></i> Quên mật khẩu
            </div>
        </div>
        <div class="main__sign-in">
            <div class="main__sign-in-left">
                <img src="<?= $CONTENT_URL ?>/imgs/interface/fashion.jpg" alt="">
            </div>
            <div class="main__sign-in-right">
                <h2 style="margin-bottom: 1.5rem;">Quên mật khẩu</h2>
                <?php
                    if (isset($_SESSION['message'])) {
                        $MESSAGE = $_SESSION['message'];
                        echo "<h5 class='alert alert-warning'>$MESSAGE</h5>";
                        unset($_SESSION['message']);
                    }
                ?>
                <form action="handle_forgotPassword.php" method="POST">
                    <?php if(exist_param("iptCode")){ ?>
                        <input type="text" name="ipt_code" placeholder="Mã xác thực">
                        <button type="submit" name="btn_checkCode">
                            <div class="btn_submit">
                                <div style="width: 11rem;" class="btn_submit-border">
                                    Xác nhận
                                    <span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </button>
                        <button type="submit" name="btn_resendCode">
                            <div class="btn_submit">
                                <div style="width: 11rem;" class="btn_submit-border">
                                    Gửi lại mã
                                    <span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </button>
                    <?php }else if(exist_param("changePW")){ ?>
                        <input type="password" name="newPW" required placeholder="Nhập mật khẩu mới"> <br>
                        <input type="password" name="refill_newPW" required placeholder="Nhập lại mật khẩu mới">
                        <button type="submit" name="btn_changePW">
                            <div class="btn_submit">
                                <div style="width: 11rem;" class="btn_submit-border">
                                    Đổi mật khẩu
                                    <span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </button>
                    <?php }else if(exist_param('done')){ ?>
                        <a href="<?=$SITE_URL?>/homepage" type="submit" name="btn_checkMail">
                            <div style="display: flex;justify-content: center;" class="btn_submit">
                                <div  style="width: 11rem;" class="btn_submit-border">
                                    Về trang chủ
                                    <span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </a>
                    <?php }else{ ?>
                        <input type="email" name="email" placeholder="Địa chỉ email xác thực" required>
                        <button type="submit" name="btn_checkMail">
                            <div class="btn_submit">
                                <div class="btn_submit-border">
                                    Gửi mã xác nhận
                                    <span></span><span></span><span></span><span></span>
                                </div>
                            </div>
                        </button>
                        <div class="sign__up-link">
                            <a href="<?= $SITE_URL ?>/user?sign_up">Đăng ký</a>
                            <a href="<?= $SITE_URL ?>/user?sign_in">Đăng nhập</a>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>