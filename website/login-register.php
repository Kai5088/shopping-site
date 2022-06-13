<?php
// 不顯示錯誤訊息
error_reporting(E_ERROR | E_PARSE);

include('connect-sql.php');
// 註冊
if (isset($_POST['account']) && isset($_POST['password']) && isset($_POST['verify_pw'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];
    $verify_pw = $_POST['verify_pw'];

    // 檢查該帳號是否已註冊
    $sql_find_user = "SELECT * FROM login_customer WHERE Cus_Account = '" . $_POST['account'] . "'";
    $data = mysqli_query($db_link, $sql_find_user);
    $user = mysqli_fetch_assoc($data);

    // 並一同確認兩次密碼是否一致
    if (($password == $verify_pw) && empty($user)) {
        // 將帳密加入資料庫
        $random_id = "A" . (string)(random_int(1, 9999));
        $sql_query = "INSERT INTO login_customer (Cus_ID, Cus_Account, Cus_Password, Cus_Money) VALUES ('$random_id' , '$account', '$password', 50000)";

        mysqli_query($db_link, $sql_query);

        $data = mysqli_query($db_link, $sql_find_user);
        $user = mysqli_fetch_assoc($data);

        // 使用 session 保存登入狀態
        session_start();
        $_SESSION['id'] = $user['Cus_ID'];
        $_SESSION['account'] = $user['Cus_Account'];
        $_SESSION['password'] = $user['Cus_Password'];
    } else {
        echo "<p>Duplicated Account!!!!!!!!</p>";
    }
}

// 登入
if (isset($_POST['login_account']) && isset($_POST['login_pw'])) {
    $l_account = $_POST['login_account'];
    $l_password = $_POST['login_pw'];

    // 檢查該帳號是否已註冊
    $sql_find_user = "SELECT * FROM login_customer WHERE Cus_Account = '" . $_POST['login_account'] . "'";
    $data = mysqli_query($db_link, $sql_find_user);
    $user = mysqli_fetch_assoc($data);

    // 檢查輸入密碼與資料庫是否一致
    if ($l_password == $user['Cus_Password']) {
        // 使用 session 保存登入狀態
        session_start();
        $_SESSION['id'] = $user['Cus_ID'];
        $_SESSION['account'] = $user['Cus_Account'];
        $_SESSION['password'] = $user['Cus_Password'];
        // 登入後導向主頁
        header("Location: index.php");
    } else {
        echo <<<EOL
        <script language="javascript">alert('帳號或密碼錯誤，請重新輸入！')</script>
        EOL;
    }
}
?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/img/icon.png">

    <!-- ************************* CSS Files ************************* -->

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/css/vendor.css">

    <!-- style css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/login-register.css">
</head>

<body>

    <!-- Preloader Start -->
    <div class="ft-preloader active">
        <div class="ft-preloader-inner h-100 d-flex align-items-center justify-content-center">
            <div class="ft-child ft-bounce1"></div>
            <div class="ft-child ft-bounce2"></div>
            <div class="ft-child ft-bounce3"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Main Wrapper Start -->
    <div class="wrapper">
        <!-- Header Start -->
        <header class="header header-default site-header">
            <div class="header__outer">
                <div class="header__inner header--fixed">
                    <div class="container">
                        <div class="header__main">
                            <div class="header__col header__left">
                                <a href="index.php" class="logo">
                                    <figure class="logo--normal">
                                        <img src="assets/img/logo/logo.png" alt="Logo">
                                    </figure>
                                    <figure class="logo--transparency">
                                        <img src="assets/img/logo/logo.png" alt="Logo">
                                    </figure>
                                </a>
                            </div>
                            <div class="header__col header__center">
                                <nav class="main-navigation d-none d-lg-block">
                                    <ul class="mainmenu">
                                        <li class="mainmenu__item menu-item-has-children position-relative">
                                            <a href="index.php" class="mainmenu__link">主頁</a>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children position-relative">
                                            <a href="shop.php?Goods_Classify=ALL" class="mainmenu__link">商店</a>
                                            <div class="inner-menu">
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="shop.php?Goods_Classify=laptop">筆記型電腦</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.php?Goods_Classify=GPU">顯示卡</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.php?Goods_Classify=keyboard">鍵盤</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.php?Goods_Classify=mouse">滑鼠</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop.php?Goods_Classify=earphone">耳機</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="mainmenu__item menu-item-has-children position-relative">
                                            <a href="#" class="mainmenu__link">功能</a>
                                            <div class="inner-menu">
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="my-account.php">我的帳號</a>
                                                    </li>
                                                    <li>
                                                        <a href="checkout.php">結帳</a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.php">購物車</a>
                                                    </li>
                                                    <li>
                                                        <a href="wishlist.php">暫存清單</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="mainmenu__item">
                                            <a href="contact-us.php" class="mainmenu__link">聯絡我們</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header__col header__right">
                                <div class="toolbar-item d-none d-lg-block">
                                    <a href="login-register.php" class="toolbar-btn">
                                        <span>登入</span>
                                    </a>
                                </div>
                                <div class="toolbar-item d-block d-lg-none">
                                    <a href="#offcanvasnav" class="hamburger-icon js-toolbar menu-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                                <div class="toolbar-item">
                                    <a href="wishlist.php" class="toolbar-btn">
                                        <i class="flaticon-heart"></i>
                                    </a>
                                </div>
                                <div class="toolbar-item mini-cart-btn">
                                    <a href="#miniCart" class="toolbar-btn js-toolbar">
                                        <span class="mini-cart-btn__icon">
                                            <i class="flaticon-bag"></i>
                                        </span>
                                        <sup class="mini-cart-btn__count">
                                            02
                                        </sup>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-sticky-height"></div>
            </div>
        </header>
        <!-- Header End -->

        <!-- Breadcrumb area Start -->
        <section class="page-title-area bg-color" data-bg-color="#f4f4f4">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="page-title">登入/註冊</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php">主頁</a></li>
                            <li class="current"><span>登入與註冊</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div class="main-content-wrapper">
            <div class="page-content-inner pt--75 pb--80">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <p class="heading-color mb--30 text-center">登入您的帳號</p>
                            <form method="post" class="form form--track" action="">
                                <div class="form__group mb--30">
                                    <label for="login_account" class="form__label">帳號</label>
                                    <input type="text" name="login_account" id="login_account" class="form__input">
                                </div>
                                <div class="form__group mb--30">
                                    <label for="login_pw" class="form__label">密碼</label>
                                    <input type="text" name="login_pw" id="login_pw" class="form__input">
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LeKdVcgAAAAAJ_rMAeJxw-aNE5_otbb8XSEBFn1" data-theme="light" data-size="normal" data-callback="loginVerifyCallback" data-expired-callback="expired" data-error-callback="error">
                                </div>
                                <div class="form__group text-center">
                                    <input type="submit" value="登入" class="btn btn-size-sm" id="login" disabled>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content-inner pt--75 pb--80">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <p class="heading-color mb--30 text-center">還沒有帳號嗎？現在註冊</p>
                            <form method="post" class="form form--track" action="">
                                <div class="form__group mb--30">
                                    <label for="account" class="form__label">請輸入帳號</label>
                                    <input type="text" name="account" id="account" class="form__input" placeholder="帳號">
                                </div>
                                <div class="form__group mb--30">
                                    <label class="form__label">請輸入密碼</label>
                                    <input type="text" name="password" id="password" class="form__input" placeholder="密碼">
                                    <input type="text" name="verify_pw" id="verify_pw" class="form__input" placeholder="再次輸入密碼">
                                </div>
                                <div class="g-recaptcha" data-sitekey="6LeKdVcgAAAAAJ_rMAeJxw-aNE5_otbb8XSEBFn1" data-theme="light" data-size="normal" data-callback="registerVerifyCallback" data-expired-callback="expired" data-error-callback="error">
                                </div>
                                <div class="form__group text-center">
                                    <input type="submit" value="註冊" class="btn btn-size-sm" id="register" disabled>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper Start -->

        <!-- Footer Start-->
        <footer class="footer bg-color pt--70 pt-xs--60" data-bg-color="#f4f8fa">
            <div class="container">
                <div class="row border-bottom pb--60 pb-sm--28 pb-xs--49">
                    <div class="col footer-column-1 mb-sm--42">
                        <div class="footer-widget">
                            <div class="textwidget">
                                <figure class="footer-logo mb--10">
                                    <img src="assets/img/logo/logo.png" alt="Logo">
                                </figure>
                            </div>
                            <div class="address-widget">
                                <address>403台灣台中市西區民生路140號</address>
                                <a href="tel:+84112345678">04-2218-3199</a>
                                <a href="mailto:info@company.com">info@expensivehouse.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col footer-column-5 mb-sm--33">
                        <div class="footer-widget">
                            <h3 class="widget-title mb--35 mb-sm--15">資訊</h3>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right"></i>
                                        <span>關於我們</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right"></i>
                                        <span>隱私協議</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right"></i>
                                        <span>取得協助</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col footer-column-5">
                        <div class="footer-widget">
                            <h3 class="widget-title mb--35 mb-sm--15">帳號</h3>
                            <ul class="footer-menu">
                                <li>
                                    <a href="my-account.php">
                                        <i class="fa fa-angle-right"></i>
                                        <span>我的帳號</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="wishlist.php">
                                        <i class="fa fa-angle-right"></i>
                                        <span>暫存清單</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row ptb--20">
                    <div class="col-12 text-center">
                        <p class="copyright-text">Copyright &copy; 2022 資料庫程式設計第五組<a target="_blank" href="https://ecsb.ntcu.edu.tw/newweb/index.htm"></a></p>
                        <!--<div class="social space-10">
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="social__link">
                                <i class="fa fa-facebook"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="social__link">
                                <i class="fa fa-twitter"></i>
                                <span class="sr-only">Twitter</span>
                            </a>
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="social__link">
                                <i class="fa fa-linkedin"></i>
                                <span class="sr-only">Linkedin</span>
                            </a>
                            <a href="#" target="_blank" rel="noopener noreferrer"
                                class="social__link">
                                <i class="fa fa-instagram"></i>
                                <span class="sr-only">Instagram</span>
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End-->

        <!-- OffCanvas Menu Start -->
        <aside class="offcanvas-navigation" id="offcanvasnav">
            <div class="offcanvas-navigation__inner">
                <a href="" class="btn-close">
                    <i class="flaticon-cross"></i>
                    <span class="sr-only">Close Offcanvas Navigtion</span>
                </a>
                <div class="offcanvas-navigation__top">
                    <ul class="offcanvas-menu">
                        <li>
                            <a href="index.php">
                                <span class="mm-text">主頁</span>
                            </a>
                        </li>
                        <li>
                            <a href="shop.php?Goods_Classify=GPU">
                                <span class="mm-text">新進商品</span>
                            </a>
                        </li>
                        <li class="has-children">
                            <a href="#">
                                <span class="mm-text">商店</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="shop.php?Goods_Classify=ALL">
                                        <span class="mm-text"><b>所有商品</b></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.php?Goods_Classify=laptop">
                                        <span class="mm-text">筆記型電腦</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.php?Goods_Classify=GPU">
                                        <span class="mm-text">顯示卡</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.php?Goods_Classify=keyboard">
                                        <span class="mm-text">鍵盤</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.php?Goods_Classify=mouse">
                                        <span class="mm-text">滑鼠</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.php?Goods_Classify=earphone">
                                        <span class="mm-text">耳機</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">
                                <span class="mm-text">功能</span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="my-account.php">
                                        <span class="mm-text">我的帳號</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="checkout.php">
                                        <span class="mm-text">結帳</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="cart.php">
                                        <span class="mm-text">購物車</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="wishlist.php">
                                        <span class="mm-text">暫存清單</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact-us.php">
                                <span class="mm-text">聯絡我們</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- OffCanvas Menu End -->

        <!-- Mini Cart Start -->
        <aside class="mini-cart" id="miniCart">
            <div class="mini-cart-wrapper">
                <div class="mini-cart__close">
                    <a href="#" class="btn-close"><i class="flaticon-cross"></i></a>
                </div>
                <div class="mini-cart-inner">
                    <h3 class="mini-cart__heading mb--45">Shopping Cart</h3>
                    <div class="mini-cart__content">
                        <ul class="mini-cart__list">
                            <li class="mini-cart__product">
                                <a href="#" class="mini-cart__product-remove">
                                    <i class="flaticon-cross"></i>
                                </a>
                                <div class="mini-cart__product-image">
                                    <img src="assets/img/products/product-11-90x90.jpg" alt="products">
                                </div>
                                <div class="mini-cart__product-content">
                                    <a class="mini-cart__product-title" href="product-details.php">Lexbaro Begadi</a>
                                    <span class="mini-cart__product-quantity">1 x $49.00</span>
                                </div>
                            </li>
                            <li class="mini-cart__product">
                                <a href="#" class="mini-cart__product-remove">
                                    <i class="flaticon-cross"></i>
                                </a>
                                <div class="mini-cart__product-image">
                                    <img src="assets/img/products/product-12-90x90.jpg" alt="products">
                                </div>
                                <div class="mini-cart__product-content">
                                    <a class="mini-cart__product-title" href="product-details.php">Lexbaro Begadi</a>
                                    <span class="mini-cart__product-quantity">1 x $49.00</span>
                                </div>
                            </li>
                            <li class="mini-cart__product">
                                <a href="#" class="mini-cart__product-remove">
                                    <i class="flaticon-cross"></i>
                                </a>
                                <div class="mini-cart__product-image">
                                    <img src="assets/img/products/product-13-90x90.jpg" alt="products">
                                </div>
                                <div class="mini-cart__product-content">
                                    <a class="mini-cart__product-title" href="product-details.php">Lexbaro Begadi</a>
                                    <span class="mini-cart__product-quantity">1 x $49.00</span>
                                </div>
                            </li>
                        </ul>
                        <div class="mini-cart__total">
                            <span>Subtotal</span>
                            <span class="ammount">$98.00</span>
                        </div>
                        <div class="mini-cart__buttons">
                            <a href="cart.php" class="btn btn-fullwidth btn-bg-primary mb--20">View Cart</a>
                            <a href="checkout.php" class="btn btn-fullwidth btn-bg-primary">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Mini Cart End -->

        <!-- Qicuk View Modal Start -->
        <div class="modal fade product-modal" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="flaticon-cross"></i></span>
                        </button>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="element-carousel slick-vertical-center" data-slick-options='{
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "arrows": true,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-double-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-double-right" }
                                }'>
                                    <div class="item">
                                        <figure class="product-gallery__image">
                                            <img src="assets/img/products/product-03-270x300.jpg" alt="Product">
                                            <span class="product-badge sale">Sale</span>
                                        </figure>
                                    </div>
                                    <div class="item">
                                        <figure class="product-gallery__image">
                                            <img src="assets/img/products/product-04-270x300.jpg" alt="Product">
                                            <span class="product-badge sale">Sale</span>
                                        </figure>
                                    </div>
                                    <div class="item">
                                        <figure class="product-gallery__image">
                                            <img src="assets/img/products/product-05-270x300.jpg" alt="Product">
                                            <span class="product-badge sale">Sale</span>
                                        </figure>
                                    </div>
                                    <div class="item">
                                        <figure class="product-gallery__image">
                                            <img src="assets/img/products/product-06-270x300.jpg" alt="Product">
                                            <span class="product-badge sale">Sale</span>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="modal-box product-summary">
                                    <div class="product-navigation text-right mb--20">
                                        <a href="#" class="prev"><i class="fa fa-angle-double-left"></i></a>
                                        <a href="#" class="next"><i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                    <div class="product-rating d-flex mb--20">
                                        <div class="star-rating star-four">
                                            <span>Rated <strong class="rating">5.00</strong> out of 5</span>
                                        </div>
                                    </div>
                                    <h3 class="product-title mb--20">Golden Easy Spot Chair.</h3>
                                    <p class="product-short-description mb--20">Donec accumsan auctor iaculis. Sed suscipit
                                        arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget,
                                        sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus
                                        scelerisque. Vestibulum ut sem laoreet, feugiat tellus at, hendrerit arcu.</p>
                                    <div class="product-price-wrapper mb--25">
                                        <span class="money">$200.00</span>
                                        <span class="price-separator">-</span>
                                        <span class="money">$400.00</span>
                                    </div>
                                    <form action="#" class="variation-form mb--20">
                                        <div class="product-size-variations d-flex align-items-center mb--15">
                                            <p class="variation-label">Size:</p>
                                            <div class="product-size-variation variation-wrapper">
                                                <div class="variation">
                                                    <a class="product-size-variation-btn selected" data-toggle="tooltip" data-placement="top" title="S">
                                                        <span class="product-size-variation-label">S</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip" data-placement="top" title="M">
                                                        <span class="product-size-variation-label">M</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip" data-placement="top" title="L">
                                                        <span class="product-size-variation-label">L</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip" data-placement="top" title="XL">
                                                        <span class="product-size-variation-label">XL</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="reset_variations">Clear</a>
                                    </form>
                                    <div class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--30">
                                        <div class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                                            <label class="quantity-label" for="qty">Quantity:</label>
                                            <div class="quantity">
                                                <input type="number" class="quantity-input" name="qty" id="qty" value="1" min="1">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-shape-square btn-size-sm" onclick="window.location.href='cart.php'">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="product-footer-meta">
                                        <p><span>Category:</span>
                                            <a href="shop.php">Full Sweater</a>,
                                            <a href="shop.php">SweatShirt</a>,
                                            <a href="shop.php">Jacket</a>,
                                            <a href="shop.php">Blazer</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Qicuk View Modal End -->

        <!-- Global Overlay Start -->
        <div class="global-overlay"></div>
        <!-- Global Overlay End -->

        <!-- Scroll To Top Start -->
        <a class="scroll-to-top" href=""><i class="fa fa-angle-double-up"></i></a>
        <!-- Scroll To Top End -->
    </div>
    <!-- Main Wrapper End -->

    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/login-register.js"></script>

    <!-- reCAPTCHA JS -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>