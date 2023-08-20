<head>
    <?php if (exist_param("stastitic")) { ?>
    <style>
    li.thongke>a {
        color: var(--blue);
    }
    </style>
    <?php } else if (exist_param("category")) { ?>
    <style>
    li.cate>a {
        color: var(--blue);
    }
    </style>
    <?php } else if (exist_param("product")) { ?>
    <style>
    li.prod>a {
        color: var(--blue);
    }
    </style>
    <?php } else if (exist_param("user")) { ?>
    <style>
    li.account>a {
        color: var(--blue);
    }
    </style>
    <?php } else if (exist_param("slider")) { ?>
    <style>
    li.layout>a {
        color: var(--blue);
    }
    </style>
    <?php } else { ?>
    <style>
    li.home>a {
        color: var(--blue);
    }
    </style>
    <?php } ?>
    </style>

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<div class="container_header" id="main-menu__fixed">
    <header class="header">
        <div class="header__right">
            <a href="<?= $SITE_URL ?>/homepage">
                <div class="header_right-logo">
                    <img src="<?= $CONTENT_URL ?>/imgs/interface/logo.svg" alt="logo">
                    <h2>REACHY</h2>
                </div>
            </a>
        </div>
        <div class="header__left">
            <ul class="header__left-menu">
                <li class="home">
                    <a href="<?= $SITE_URL ?>/homepage">TRANG CHỦ</a>
                </li>
                <li class="cate">
                    <a href="<?= $ADMIN_URL ?>?category&act=list">LOẠI HÀNG</a>
                </li>
                <li class="prod">
                    <a href="<?= $ADMIN_URL ?>?product&act=list">SẢN PHẨM</a>
                </li>
                <li class="admin__dropdown layout">
                    <a href="">GIAO DIỆN</a>
                    <div class="admin__dropdown--list">
                        <div class="admin__dropdown--item"><a href="<?= $ADMIN_URL ?>?slider&act=list">Sliders</a></div>
                        <div class="admin__dropdown--item"><a href="<?= $ADMIN_URL ?>?blog&act=list">Blogs</a></div>
                    </div>
                </li>
                <li class="account">
                    <a href="<?= $ADMIN_URL ?>?user&act=list">TÀI KHOẢN</a>
                </li>
                <li class="thongke">
                    <a href="<?= $ADMIN_URL ?>?bill&act=list">ĐƠN HÀNG</a>
                </li>
            </ul>
            <ul class="header__left-control">
                <li class="control__user">
                    <?php if (isset($_SESSION['login'])) {
                        $id_user = $_SESSION['login'];
                        $img_user = user_selectImgs($id_user);
                        $user = user_selectById($id_user);
                    ?>
                    <img src="<?= $CONTENT_URL ?>/imgs/user/<?= $img_user['img'] ?>" alt="Ảnh đại diện">
                    <div style="width: 12rem;" class="sub__menu sub_menu-mobile">
                        <a href="<?= $SITE_URL ?>/user?info">
                            <div class="sub__menu-user">THÔNG TIN CÁ NHÂN</div>
                        </a>
                        <?php if ($user['role'] == 1 || $user['role'] == 2) { ?>
                        <a href="<?= $ADMIN_URL ?>/">
                            <div class="sub__menu-user">QUẢN LÍ CỬA HÀNG</div>
                        </a>
                        <?php } ?>
                        <a href="<?= $SITE_URL ?>/user?sign_out">
                            <div class="sub__menu-user">ĐĂNG XUẤT</div>
                        </a>
                    </div>
                    <?php } else { ?>
                    <span class="material-symbols-outlined">account_circle</span>
                    <div style="width: 8rem;" class="sub__menu">
                        <a href="<?= $SITE_URL ?>/user?sign_in">
                            <div class="sub__menu-user">ĐĂNG NHẬP</div>
                        </a>
                        <a href="<?= $SITE_URL ?>/user?sign_up">
                            <div class="sub__menu-user">ĐĂNG KÝ</div>
                        </a>
                    </div>
                    <?php } ?>
                </li>
                <!-- <li>
                    <span class="material-symbols-outlined">garden_cart</span>
                </li>
                <li>
                    <input type="checkbox" id="search_btn" hidden>
                    <label for="search_btn"><span class="material-symbols-outlined">search</span></label>
                    <form class="header__form-search" action="" method="GET">
                        <input type="text" name="search" placeholder="Nhập từ khóa ">
                        <label for="search_btn"><span class="material-symbols-outlined">
                                close
                            </span></label>
                    </form>
                </li> -->
            </ul>
        </div>
    </header>
</div>
<script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {
    myFunction()
};

// Get the header
var header = document.getElementById("main-menu__fixed");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
</script>