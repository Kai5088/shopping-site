<?php
session_start();
include('account-operation.php');
include('connect-sql.php');
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
                                <?php
                                    if ( is_login() ) {
                                        echo '<a href="my-account.php" class="toolbar-btn">' .
                                             "<span>" . $_SESSION['account'] . "</span></a>，" .
                                             '<a href="logout.php" class="toolbar-btn"><span>登出</span></a>'
                                            ;
                                    } else {
                                        echo <<< EOL
                                            <a href='login-register.php' class='toolbar-btn'>
                                                <span>登入</span>
                                            </a>
                                            EOL;
                                    }
                                ?>
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
                                <?php   
                                    if(is_login())
                                    {
                                        $Cus_ID = $_SESSION['id'];

                                        $sql = "SELECT * FROM `cus_shopping_cart` WHERE `Buyer_Record_ID` = '" . $Cus_ID . "';";
                                        $result = mysqli_query($db_link, $sql);   
                                        $rows_number = mysqli_num_rows($result);   
                          
                                        echo <<< EOL
                                            <div class="toolbar-item mini-cart-btn">
                                                <a href="#miniCart" class="toolbar-btn js-toolbar">
                                                    <span class="mini-cart-btn__icon">
                                                        <i class="flaticon-bag"></i>
                                                    </span>
                                                    <sup class="mini-cart-btn__count">
                                                        $rows_number
                                                    </sup>
                                                </a>
                                            </div>                                    
                                        EOL;                                        
                                    }
                                    else
                                    {
                                        echo <<< EOL
                                        <div class="toolbar-item mini-cart-btn">
                                            <a href="#miniCart" class="toolbar-btn js-toolbar">
                                                <span class="mini-cart-btn__icon">
                                                    <i class="flaticon-bag"></i>
                                                </span>
                                                <sup class="mini-cart-btn__count">
                                                    0
                                                </sup>
                                            </a>
                                        </div>                                    
                                    EOL;
                                    }
                                ?>
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
                        <h1 class="page-title">產品詳情</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php">主頁</a></li>
                            <li class="current"><span>產品詳情</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div class="main-content-wrapper">
            <div class="page-content-inner pt--80 pt-md--60">
                <div class="container">
                    <?php 

                        $sql = "SELECT * FROM `goods` WHERE `Goods_ID` = " . $_GET['Goods_ID'] . ";";
                        $result = mysqli_query($db_link, $sql);
                        $row = $result->fetch_assoc();

                        $Goods_ID = $row['Goods_ID'];
                        $Goods_Name = $row['Goods_Name'];
                        $Goods_Price = $row['Goods_Price'];
                        $Goods_Left = $row['Goods_Num'];
                        $Goods_URL = $row['Goods_URL'];
                        $Goods_Statement = nl2br($row['Goods_Statement']);
                        $Goods_Classify = $row['Goods_Classify'];
                        $Goods_Specs = nl2br($row['Goods_Specs']);


                        echo <<<EOL
                        <div class="row no-gutters mb--80 mb-md--57">
                            <div class="col-lg-7 product-main-image">
                                <div class="product-image">
                                    <div class="product-gallery vertical-slide-nav">
                                        <div class="product-gallery__large-image mb-sm--30">
                                            <div class="product-gallery__wrapper">
                                                <div class="element-carousel main-slider image-popup" data-slick-options='{
                                                    "slidesToShow": 1,
                                                    "slidesToScroll": 1,
                                                    "infinite": true,
                                                    "arrows": false, 
                                                    "asNavFor": ".nav-slider"
                                                }'>
                                                    <div class="item">
                                                        <figure class="product-gallery__image zoom">
                                                            <img src="$Goods_URL"
                                                                alt="Product">
                                                            <span class="product-badge sale">Sale</span>
                                                            <div class="product-gallery__actions">
                                                                <button class="action-btn btn-zoom-popup"><i
                                                                        class="fa fa-eye"></i></button>
                                                                <a href="https://www.youtube.com/watch?v=o-YBDTqX_ZU"
                                                                    class="action-btn video-popup"><i
                                                                        class="fa fa-play"></i></a>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        EOL;
                        $sql = 'SELECT Goods_ID FROM `goods`';
                        $result = mysqli_query($db_link, $sql);
                        $num_rows = mysqli_num_rows($result);
                        $prev_href = ($_GET['Goods_ID'] == 1) ? "#" : "product-details.php?Goods_ID=" . $_GET['Goods_ID']-1;
                        $next_href = ($_GET['Goods_ID'] == $num_rows) ? "#" : "product-details.php?Goods_ID=" . $_GET['Goods_ID']+1;
                        if(is_login())
                        {
                            $temp_button = <<<EOL
                                <button type="button" class="btn btn-shape-square btn-size-sm"
                                    onclick="window.location.href='php/insert_data_into_temp_list.php?Goods_ID=$Goods_ID'" style="background-color:gray;">
                                    加入暫存清單
                                </button>
                            EOL;
                            $shopping_button = <<<EOL
                                <button type="button" class="btn btn-shape-square btn-size-sm"
                                    onclick="jump();change_num();" onmouseover="change_num()" + "document.writeln(num)">
                                    加入購物車
                                </button>                            
                            EOL;
                        }
                        else 
                        {
                            $temp_button = <<<EOL
                                <button type="button" class="btn btn-shape-square btn-size-sm"
                                    onclick="window.location.href='login-register.php'" style="background-color:gray;">
                                    請先登入
                                </button>
                            EOL;
                            $shopping_button = <<<EOL
                                <button type="button" class="btn btn-shape-square btn-size-sm"
                                    onclick="window.location.href='login-register.php'" onmouseover="change_num()" + "document.writeln(num)">
                                    請先登入
                                </button>                            
                            EOL;                            
                        }
                        echo <<<EOL
                            <div class="col-xl-4 offset-xl-1 col-lg-5 product-main-details mt-md--50">
                                <div class="product-summary pl-lg--30 pl-md--0">
                        EOL;
                                echo <<<EOL
                                    <div class="product-navigation text-right mb--20">
                                        <a href="$prev_href" class="prev"><i class="fa fa-angle-double-left"></i></a>
                                        <a href="$next_href" class="next"><i class="fa fa-angle-double-right"></i></a> 
                                    </div>
                                    <h3 class="product-title mb--20">$Goods_Name</h3>
                                    <div class="product-price-wrapper mb--25">
                                        <span class="money">$$Goods_Price</span>
                                    </div>
                                    <label class="quantity-label">剩餘數量： $Goods_Left</label>
                                    <div>
                                    <label class="quantity-label"></label>
                                    </div>                             
                                    <div class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--30">
                                        <div class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                                            <label class="quantity-label" for="pro-qty">購買數量：</label>
                                            <form method="post">
                                            <div class="quantity">
                                                <input type="number" class="quantity-input" name="pro-qty" id="pro-qty" value="1" min="1" onclick="change_num()" onmouseover="change_num()">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    $temp_button
                                    <label></label>
                                    EOL;

                                if($Goods_Left > 0)
                                {
                                    echo <<<EOL
                                        $shopping_button
                                    EOL;
                                }
                                else 
                                {
                                    echo '<button type="button" class="btn btn-shape-square btn-size-sm" disabled >商品已售罄</button>';                                
                                }
                                echo <<<EOL
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mb--77 mb-md--57">
                            <div class="col-12">
                                <div class="tab-style-1">
                                    <div class="nav nav-tabs mb--35 mb-sm--25" id="product-tab" role="tablist">
                                        <a class="nav-link active" id="nav-description-tab" data-toggle="tab"
                                            href="#nav-description" role="tab" aria-selected="true">
                                            <span>商品介紹</span>
                                        </a>
                                        <a class="nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab"
                                            aria-selected="true">
                                            <span>商品規格</span>
                                        </a>
                                    </div>
                                    <div class="tab-content" id="product-tabContent">
                                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                            aria-labelledby="nav-description-tab">
                                            <div class="product-description">
                                                <p>$Goods_Statement</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-info" role="tabpanel"
                                            aria-labelledby="nav-info-tab">
                                            <div class="table-content table-responsive">
                                                <table class="table shop_attributes">
                                                    <p>$Goods_Specs</p>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        EOL;
                        mysqli_close($db_link);
                    ?>
                        <div class="row mb--77 mb-md--57">
                            <p class="heading__secondary">其他類似商品</p>
                            <div class="col-12">
                                <div class="element-carousel slick-vertical-center" data-slick-options='{
                                    "spaceBetween": 30,
                                    "slidesToShow": 5,
                                    "slidesToScroll": 1,
                                    "arrows": false,
                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-angle-double-left" },
                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-angle-double-right" }
                                }' data-slick-responsive='[
                                    {"breakpoint":1199, "settings": {
                                        "slidesToShow": 3
                                    }},
                                    {"breakpoint":991, "settings": {
                                        "slidesToShow": 2
                                    }},
                                    {"breakpoint":575, "settings": {
                                        "slidesToShow": 1
                                    }}
                                ]'>
                                <?php
                                    include ('connect-sql.php');

                                    $sql = "SELECT * FROM `goods` WHERE `Goods_Classify` = '" . $Goods_Classify . "';";
                                    $result = mysqli_query($db_link, $sql);
                                    $IDs = [];

                                    if (mysqli_num_rows($result) > 0) 
                                    {
                                        while ($row = mysqli_fetch_assoc($result)) 
                                        {
                                            array_push($IDs, $row['Goods_ID']);
                                        }
                                    }

                                    shuffle($IDs);

                                    for($i = 0; $i < 6; $i++)
                                    {
                                        if($IDs[$i] == $_GET['Goods_ID'])
                                            continue;
                                        $sql = "SELECT * FROM `goods` WHERE `Goods_ID` = " . $IDs[$i] . ";";
                                        $result = mysqli_query($db_link, $sql);
                                        $row = $result->fetch_assoc(); 
                                        
                                        $Goods_ID = $row['Goods_ID'];
                                        $Goods_Name = $row['Goods_Name'];
                                        $Goods_Price = $row['Goods_Price'];
                                        $Goods_Num = $row['Goods_Num'];
                                        $Goods_URL = $row['Goods_URL'];
                                        $Goods_Statement = $row['Goods_Statement'];
                                        $Goods_Classify = $row['Goods_Classify'];
                                        $Goods_Specs = $row['Goods_Specs'];
                                        echo <<<EOL
                                        <div class="item">
                                            <div class="payne-product">
                                                <div class="product__inner">
                                                    <div class="product__image">
                                                        <figure class="product__image--holder">
                                                            <img src="$Goods_URL" alt="Product">
                                                        </figure>
                                                        <a href="product-details.php?Goods_ID=$Goods_ID" class="product__overlay"></a>
                                                    </div>
                                                    <div class="product__info">
                                                        <div class="product__info--left">
                                                            <h3 class="product__title">
                                                                <a href="product-details.php?Goods_ID=$Goods_ID">$Goods_Name</a>
                                                            </h3>
                                                            <div class="product__price">
                                                                <span class="money">$Goods_Price</span>
                                                                <span class="sign">$</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        EOL;
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Main Content Wrapper End -->

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
                    <div class="row-3 ptb--20">
                        <div class="col-12 text-center">
                            <p class="copyright-text">Copyright &copy; 2022 資料庫程式設計第11組<a target="_blank" href="https://ecsb.ntcu.edu.tw/newweb/index.htm"></a></p>
                        </div>
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
                                <?php
                                    if ( is_login() ) {
                                        echo '<a href="my-account.php">' .
                                             '<span class="mm-text">我的帳號</span>' .
                                             '</a>'
                                            ;
                                    } else {
                                        echo '<a href="login-register.php">' .
                                             '<span class="mm-text">我的帳號</span>' .
                                             '</a>'
                                            ;
                                    }
                                ?>
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
                        <li>
                        <?php
                            if ( is_login() ) {
                                echo '<a href="logout.php"><span class="mm-text">' . $_SESSION['account'] . '，登出</span></a>'
                                    ;
                            } else {
                                echo <<< EOL
                                    <a href='login-register.php'>
                                        <span class="mm-text">登入</span>
                                    </a>
                                EOL;
                            }
                        ?>
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
                    <h3 class="mini-cart__heading mb--45">購物車</h3>
                    <div class="mini-cart__content">
                        <ul class="mini-cart__list">
                            <?php
                                if(is_login())
                                {
                                    $Cus_ID = $_SESSION['id'];

                                    $sql = "SELECT * FROM `cus_shopping_cart` WHERE `Buyer_Record_ID` = '" . $Cus_ID . "';";
                                    $result = mysqli_query($db_link, $sql);

                                    $sum = 0;
                                    if ($result->num_rows > 0) 
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {          
                                            $Goods_ID = $row['Goods_ID'];
                                            $Goods_Name = $row['Goods_Name'];
                                            $Goods_Price = $row['Goods_Price'];
                                            $Goods_Num = $row['Goods_Num'];
                                            $Goods_URL = $row['Goods_URL'];
                                            $sum += $Goods_Num * $Goods_Price;                                                             
                                            echo <<<EOL
                                                <li class="mini-cart__product">
                                                    <a href="php/delete_data_into_shopping_cart.php?Goods_ID=$Goods_ID" class="mini-cart__product-remove">
                                                        <i class="flaticon-cross"></i>
                                                    </a>
                                                    <div class="mini-cart__product-image">
                                                        <img src="$Goods_URL" alt="products">
                                                    </div>
                                                    <div class="mini-cart__product-content">
                                                        <a class="mini-cart__product-title" href="product-details.php?Goods_ID=$Goods_ID">$Goods_Name</a>
                                                        <span class="mini-cart__product-quantity">$Goods_Num x $$Goods_Price</span>
                                                    </div>
                                                </li>
                                            EOL; 
                                        }
                                    }
                                    else 
                                    {
                                        echo <<<EOL
                                            <li class="mini-cart__product">
                                                <div class="mini-cart__product-image">
                                                </div>
                                                <div class="mini-cart__product-content">
                                                    您的購物車中還沒有商品
                                                    <span class="mini-cart__product-quantity"></span>
                                                </div>
                                            </li>
                                        EOL; 
                                    }
                                }
                                else
                                {
                                    echo <<<EOL
                                        <li class="mini-cart__product">
                                            <div class="mini-cart__product-image">
                                            </div>
                                            <a href="login-register.php"
                                                <div class="mini-cart__product-content">
                                                    請先登入
                                                    <span class="mini-cart__product-quantity"></span>
                                                </div>
                                            </a>
                                        </li>
                                    EOL;                                    
                                }
                            ?>
                        </ul>
                        <?php
                            if(is_login())
                            {
                                $checkout = "";
                                if($sum != 0) 
                                {
                                    $checkout = '<a href="checkout.php" class="btn btn-fullwidth btn-bg-primary">結帳</a>';
                                }
                                echo <<< EOL
                                    <div class="mini-cart__total">
                                        <span>合計</span>
                                        <span class="ammount">$$sum</span>
                                    </div>
                                    <div class="mini-cart__buttons">
                                        <a href="cart.php" class="btn btn-fullwidth btn-bg-primary mb--20">前往購物車</a>
                                        $checkout
                                    </div>                            
                                EOL;                                
                            }
                        ?>
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
                                    <p class="product-short-description mb--20">Donec accumsan auctor iaculis. Sed
                                        suscipit
                                        arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo
                                        eget,
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
                                                    <a class="product-size-variation-btn selected" data-toggle="tooltip"
                                                        data-placement="top" title="S">
                                                        <span class="product-size-variation-label">S</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip"
                                                        data-placement="top" title="M">
                                                        <span class="product-size-variation-label">M</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip"
                                                        data-placement="top" title="L">
                                                        <span class="product-size-variation-label">L</span>
                                                    </a>
                                                </div>
                                                <div class="variation">
                                                    <a class="product-size-variation-btn" data-toggle="tooltip"
                                                        data-placement="top" title="XL">
                                                        <span class="product-size-variation-label">XL</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="" class="reset_variations">Clear</a>
                                    </form>
                                    <div
                                        class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--30">
                                        <div
                                            class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                                            <label class="quantity-label" for="qty">Quantity:</label>
                                            <div class="quantity">
                                                <input type="number" class="quantity-input" name="qty" id="qty"
                                                    value="1" min="1">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-shape-square btn-size-sm"
                                            onclick="window.location.href='cart.php'">
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
    <!-- Shipping list -->
    <script>
        var num = 1;
        function change_num()
        {
            num = parseInt(document.getElementById('pro-qty').value);
            if(num > <?php echo $Goods_Left;?>)
            {
                num = <?php echo $Goods_Left;?>;
                document.getElementById('pro-qty').value = num;
            }
            else if(num < 1)
            {
                num = 1;
                document.getElementById('pro-qty').value = num;
            }
        }
        function jump()
        {
            window.location.href="php/insert_data_into_shopping_cart.php?num=" + num + "&" + "Goods_ID=<?php echo $_GET['Goods_ID'];?>";
        }
    </script>
</body>

</html>
<!-- ******************************** Container Backup******************************** 

                    <div class="row no-gutters mb--80 mb-md--57">
                        <div class="col-lg-7 product-main-image">
                            <div class="product-image">
                                <div class="product-gallery vertical-slide-nav">
                                    <div class="product-gallery__large-image mb-sm--30">
                                        <div class="product-gallery__wrapper">
                                            <div class="element-carousel main-slider image-popup" data-slick-options='{
                                                "slidesToShow": 1,
                                                "slidesToScroll": 1,
                                                "infinite": true,
                                                "arrows": false, 
                                                "asNavFor": ".nav-slider"
                                            }'>
                                                <div class="item">
                                                    <figure class="product-gallery__image zoom">
                                                        <img src="assets/img/products/product-03-500x555.png"
                                                            alt="Product">
                                                        <span class="product-badge sale">Sale</span>
                                                        <div class="product-gallery__actions">
                                                            <button class="action-btn btn-zoom-popup"><i
                                                                    class="fa fa-eye"></i></button>
                                                            <a href="https://www.youtube.com/watch?v=Rp19QD2XIGM"
                                                                class="action-btn video-popup"><i
                                                                    class="fa fa-play"></i></a>
                                                        </div>
                                                    </figure>
                                                </div>
                                                <div class="item">
                                                    <figure class="product-gallery__image zoom">
                                                        <img src="assets/img/products/product-04-500x555.png"
                                                            alt="Product">
                                                        <span class="product-badge sale">Sale</span>
                                                        <div class="product-gallery__actions">
                                                            <button class="action-btn btn-zoom-popup"><i
                                                                    class="fa fa-eye"></i></button>
                                                            <a href="https://www.youtube.com/watch?v=Rp19QD2XIGM"
                                                                class="action-btn video-popup"><i
                                                                    class="fa fa-play"></i></a>
                                                        </div>
                                                    </figure>
                                                </div>
                                                <div class="item">
                                                    <figure class="product-gallery__image zoom">
                                                        <img src="assets/img/products/product-05-500x555.png"
                                                            alt="Product">
                                                        <span class="product-badge sale">Sale</span>
                                                        <div class="product-gallery__actions">
                                                            <button class="action-btn btn-zoom-popup"><i
                                                                    class="fa fa-eye"></i></button>
                                                            <a href="https://www.youtube.com/watch?v=Rp19QD2XIGM"
                                                                class="action-btn video-popup"><i
                                                                    class="fa fa-play"></i></a>
                                                        </div>
                                                    </figure>
                                                </div>
                                                <div class="item">
                                                    <figure class="product-gallery__image zoom">
                                                        <img src="assets/img/products/product-06-500x555.png"
                                                            alt="Product">
                                                        <span class="product-badge sale">Sale</span>
                                                        <div class="product-gallery__actions">
                                                            <button class="action-btn btn-zoom-popup"><i
                                                                    class="fa fa-eye"></i></button>
                                                            <a href="https://www.youtube.com/watch?v=Rp19QD2XIGM"
                                                                class="action-btn video-popup"><i
                                                                    class="fa fa-play"></i></a>
                                                        </div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-gallery__nav-image">
                                        <div class="element-carousel nav-slider product-slide-nav slick-center-bottom"
                                            data-slick-options='{
                                            "spaceBetween": 10,
                                            "slidesToShow": 3,
                                            "slidesToScroll": 1,
                                            "vertical": true,
                                            "swipe": true,
                                            "verticalSwiping": true,
                                            "infinite": true,
                                            "focusOnSelect": true,
                                            "asNavFor": ".main-slider",
                                            "arrows": true, 
                                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-up" },
                                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-down" }
                                        }' data-slick-responsive='[
                                            {
                                                "breakpoint":1200, 
                                                "settings": {
                                                    "slidesToShow": 2
                                                } 
                                            },
                                            {
                                                "breakpoint":992, 
                                                "settings": {
                                                    "slidesToShow": 3
                                                } 
                                            },
                                            {
                                                "breakpoint":767, 
                                                "settings": {
                                                    "slidesToShow": 4,
                                                    "vertical": false
                                                } 
                                            },
                                            {
                                                "breakpoint":575, 
                                                "settings": {
                                                    "slidesToShow": 3,
                                                    "vertical": false
                                                } 
                                            },
                                            {
                                                "breakpoint":480, 
                                                "settings": {
                                                    "slidesToShow": 2,
                                                    "vertical": false
                                                } 
                                            }
                                        ]'>
                                            <div class="item">
                                                <figure class="product-gallery__nav-image--single">
                                                    <img src="assets/img/products/product-03-270x300.jpg"
                                                        alt="Products">
                                                </figure>
                                            </div>
                                            <div class="item">
                                                <figure class="product-gallery__nav-image--single">
                                                    <img src="assets/img/products/product-04-270x300.jpg"
                                                        alt="Products">
                                                </figure>
                                            </div>
                                            <div class="item">
                                                <figure class="product-gallery__nav-image--single">
                                                    <img src="assets/img/products/product-05-270x300.jpg"
                                                        alt="Products">
                                                </figure>
                                            </div>
                                            <div class="item">
                                                <figure class="product-gallery__nav-image--single">
                                                    <img src="assets/img/products/product-06-270x300.jpg"
                                                        alt="Products">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 offset-xl-1 col-lg-5 product-main-details mt-md--50">
                            <div class="product-summary pl-lg--30 pl-md--0">
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
                                                <a class="product-size-variation-btn selected" data-toggle="tooltip"
                                                    data-placement="top" title="S">
                                                    <span class="product-size-variation-label">S</span>
                                                </a>
                                            </div>
                                            <div class="variation">
                                                <a class="product-size-variation-btn" data-toggle="tooltip"
                                                    data-placement="top" title="M">
                                                    <span class="product-size-variation-label">M</span>
                                                </a>
                                            </div>
                                            <div class="variation">
                                                <a class="product-size-variation-btn" data-toggle="tooltip"
                                                    data-placement="top" title="L">
                                                    <span class="product-size-variation-label">L</span>
                                                </a>
                                            </div>
                                            <div class="variation">
                                                <a class="product-size-variation-btn" data-toggle="tooltip"
                                                    data-placement="top" title="XL">
                                                    <span class="product-size-variation-label">XL</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="reset_variations">Clear</a>
                                </form>
                                <div
                                    class="product-action d-flex flex-sm-row align-items-sm-center flex-column align-items-start mb--30">
                                    <div class="quantity-wrapper d-flex align-items-center mr--30 mr-xs--0 mb-xs--30">
                                        <label class="quantity-label" for="pro-qty">Quantity:</label>
                                        <div class="quantity">
                                            <input type="number" class="quantity-input" name="pro-qty" id="pro-qty"
                                                value="1" min="1">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-shape-square btn-size-sm"
                                        onclick="window.location.href='cart.php'">
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
                    <div class="row justify-content-center mb--77 mb-md--57">
                        <div class="col-12">
                            <div class="tab-style-1">
                                <div class="nav nav-tabs mb--35 mb-sm--25" id="product-tab" role="tablist">
                                    <a class="nav-link active" id="nav-description-tab" data-toggle="tab"
                                        href="#nav-description" role="tab" aria-selected="true">
                                        <span>Description</span>
                                    </a>
                                    <a class="nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab"
                                        aria-selected="true">
                                        <span>Additional Information</span>
                                    </a>
                                    <a class="nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews"
                                        role="tab" aria-selected="true">
                                        <span>Reviews(1)</span>
                                    </a>
                                </div>
                                <div class="tab-content" id="product-tabContent">
                                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                                        aria-labelledby="nav-description-tab">
                                        <div class="product-description">
                                            <p>Lorem ipsum dolor sit amet, consec do eiusmod tincididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniaLo ipsum dolor sit amet,
                                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                dolore eu fugiat nulla paExcepteur sint occaecat cupidatat non proident,
                                                sunt in culpa qui officia deserunt mollit anim id est laborum. iatis
                                                unde omnis iste natus error sit voluptatem accusantium </p>

                                            <p>Lorem ipsum dolor sit amet, consec do eiusmod tincididunt ut labore et
                                                dolore magna aliqua. Ut enim ad minim veniaLo ipsum dolor sit amet,
                                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation ullamco.</p>

                                            <h5 class="product-description__heading">Characteristics :</h5>
                                            <ul>
                                                <li><i class="fa fa-circle"></i><span>Rsit amet, consectetur
                                                        adipisicing elit, sed do eiusmod tempor inc.</span></li>
                                                <li><i class="fa fa-circle"></i><span>sunt in culpa qui officia
                                                        deserunt mollit anim id est laborum. </span></li>
                                                <li><i class="fa fa-circle"></i><span>Lorem ipsum dolor sit amet,
                                                        consec do eiusmod tincididu. </span></li>
                                            </ul>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-info" role="tabpanel"
                                        aria-labelledby="nav-info-tab">
                                        <div class="table-content table-responsive">
                                            <table class="table shop_attributes">
                                                <tbody>
                                                    <tr>
                                                        <th>Weight</th>
                                                        <td>57 kg</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Dimensions</th>
                                                        <td>160 × 152 × 110 cm</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Color</th>
                                                        <td>
                                                            <a href="shop.php">Black</a>,
                                                            <a href="shop.php">Gray</a>,
                                                            <a href="shop.php">Red</a>,
                                                            <a href="shop.php">Violet</a>,
                                                            <a href="shop.php">Yellow</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-reviews" role="tabpanel"
                                        aria-labelledby="nav-reviews-tab">
                                        <div class="product-reviews">
                                            <h3 class="review__title">1 review for Black Blazer</h3>
                                            <ul class="review__list">
                                                <li class="review__item">
                                                    <div class="review__container">
                                                        <img src="assets/img/others/comment-1.jpg" alt="Review Avatar"
                                                            class="review__avatar">
                                                        <div class="review__text">
                                                            <div
                                                                class="d-flex flex-sm-row flex-column justify-content-between">
                                                                <div class="review__meta">
                                                                    <strong class="review__author">John Snow </strong>
                                                                    <span class="review__dash">-</span>
                                                                    <span class="review__published-date">November 20,
                                                                        2018</span>
                                                                </div>
                                                                <div class="product-rating">
                                                                    <div class="star-rating star-five">
                                                                        <span>Rated <strong class="rating">5.00</strong>
                                                                            out of 5</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="review__description">Aliquam egestas libero ac
                                                                turpis pharetra, in vehicula lacus scelerisque.
                                                                Vestibulum ut sem laoreet, feugiat tellus at, hendrerit
                                                                arcu.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="review-form-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <span class="reply-title">Add a review</span>
                                                        <form action="#" class="form pr--30">
                                                            <div class="form-notes mb--20">
                                                                <p>Your email address will not be published. Required
                                                                    fields are marked <span class="required">*</span>
                                                                </p>
                                                            </div>
                                                            <div class="form__group mb--10">
                                                                <label class="form__label d-block mb--10">Your Ratings</label>
                                                                <div class="rating">
                                                                    <span><i class="fa fa-star"></i></span>
                                                                    <span><i class="fa fa-star"></i></span>
                                                                    <span><i class="fa fa-star"></i></span>
                                                                    <span><i class="fa fa-star"></i></span>
                                                                    <span><i class="fa fa-star"></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="form__group mb--10">
                                                                <label class="form__label d-block mb--10" for="email">Your
                                                                    Review<span class="required">*</span></label>
                                                                <textarea name="review" id="review"
                                                                    class="form__input form__input--textarea"></textarea>
                                                            </div>
                                                            <div class="form__group mb--20">
                                                                <label class="form__label d-block mb--10" for="name">Name<span
                                                                        class="required">*</span></label>
                                                                <input type="text" name="name" id="name"
                                                                    class="form__input">
                                                            </div>
                                                            <div class="form__group mb--20">
                                                                <label class="form__label d-block mb--10"
                                                                    for="email">Email<span
                                                                        class="required">*</span></label>
                                                                <input type="email" name="email" id="email"
                                                                    class="form__input">
                                                            </div>
                                                            <div class="form__group">
                                                                <div class="form-row">
                                                                    <div class="col-12">
                                                                        <input type="submit" value="Submit Now"
                                                                            class="btn btn-size-md">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb--77 mb-md--57">
                        <div class="col-12">
                            <div class="element-carousel slick-vertical-center" data-slick-options='{
                                "spaceBetween": 30,
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "la la-angle-double-left" },
                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "la la-angle-double-right" }
                            }' data-slick-responsive='[
                                {"breakpoint":1199, "settings": {
                                    "slidesToShow": 3
                                }},
                                {"breakpoint":991, "settings": {
                                    "slidesToShow": 2
                                }},
                                {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                }}
                            ]'>
                                <div class="item">
                                    <div class="payne-product">
                                        <div class="product__inner">
                                            <div class="product__image">
                                                <figure class="product__image--holder">
                                                    <img src="assets/img/products/product-03-270x300.jpg" alt="Product">
                                                </figure>
                                                <a href="product-details.php" class="product__overlay"></a>
                                                <div class="product__action">
                                                    <a data-toggle="modal" data-target="#productModal"
                                                        class="action-btn">
                                                        <i class="fa fa-eye"></i>
                                                        <span class="sr-only">Quick View</span>
                                                    </a>
                                                    <a href="wishlist.php" class="action-btn">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="sr-only">Add to wishlist</span>
                                                    </a>
                                                    <a href="compare.php" class="action-btn">
                                                        <i class="fa fa-repeat"></i>
                                                        <span class="sr-only">Add To Compare</span>
                                                    </a>
                                                    <a href="cart.php" class="action-btn">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span class="sr-only">Add To Cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__info">
                                                <div class="product__info--left">
                                                    <h3 class="product__title">
                                                        <a href="product-details.php">Lexbaro Begadi</a>
                                                    </h3>
                                                    <div class="product__price">
                                                        <span class="money">132.00</span>
                                                        <span class="sign">$</span>
                                                    </div>
                                                </div>
                                                <div class="product__info--right">
                                                    <span class="product__rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="payne-product">
                                        <div class="product__inner">
                                            <div class="product__image">
                                                <figure class="product__image--holder">
                                                    <img src="assets/img/products/product-05-270x300.jpg" alt="Product">
                                                </figure>
                                                <a href="product-details.php" class="product-overlay"></a>
                                                <div class="product__action">
                                                    <a data-toggle="modal" data-target="#productModal"
                                                        class="action-btn">
                                                        <i class="fa fa-eye"></i>
                                                        <span class="sr-only">Quick View</span>
                                                    </a>
                                                    <a href="wishlist.php" class="action-btn">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="sr-only">Add to wishlist</span>
                                                    </a>
                                                    <a href="wishlist.php" class="action-btn">
                                                        <i class="fa fa-repeat"></i>
                                                        <span class="sr-only">Add To Compare</span>
                                                    </a>
                                                    <a href="cart.php" class="action-btn">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span class="sr-only">Add To Cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__info">
                                                <div class="product__info--left">
                                                    <h3 class="product__title">
                                                        <a href="product-details.php">Lexbaro Begadi</a>
                                                    </h3>
                                                    <div class="product__price">
                                                        <span class="money">132.00</span>
                                                        <span class="sign">$</span>
                                                    </div>
                                                </div>
                                                <div class="product__info--right">
                                                    <span class="product__rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="payne-product">
                                        <div class="product__inner">
                                            <div class="product__image">
                                                <figure class="product__image--holder">
                                                    <img src="assets/img/products/product-06-270x300.jpg" alt="Product">
                                                </figure>
                                                <a href="product-details.php" class="product-overlay"></a>
                                                <div class="product__action">
                                                    <a data-toggle="modal" data-target="#productModal"
                                                        class="action-btn">
                                                        <i class="fa fa-eye"></i>
                                                        <span class="sr-only">Quick View</span>
                                                    </a>
                                                    <a href="wishlist.php" class="action-btn">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="sr-only">Add to wishlist</span>
                                                    </a>
                                                    <a href="wishlist.php" class="action-btn">
                                                        <i class="fa fa-repeat"></i>
                                                        <span class="sr-only">Add To Compare</span>
                                                    </a>
                                                    <a href="cart.php" class="action-btn">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span class="sr-only">Add To Cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__info">
                                                <div class="product__info--left">
                                                    <h3 class="product__title">
                                                        <a href="product-details.php">Lexbaro Begadi</a>
                                                    </h3>
                                                    <div class="product__price">
                                                        <span class="money">132.00</span>
                                                        <span class="sign">$</span>
                                                    </div>
                                                </div>
                                                <div class="product__info--right">
                                                    <span class="product__rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="payne-product">
                                        <div class="product__inner">
                                            <div class="product__image">
                                                <figure class="product__image--holder">
                                                    <img src="assets/img/products/product-08-270x300.jpg" alt="Product">
                                                </figure>
                                                <a href="product-details.php" class="product-overlay"></a>
                                                <div class="product__action">
                                                    <a data-toggle="modal" data-target="#productModal"
                                                        class="action-btn">
                                                        <i class="fa fa-eye"></i>
                                                        <span class="sr-only">Quick View</span>
                                                    </a>
                                                    <a href="wishlist.php" class="action-btn">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="sr-only">Add to wishlist</span>
                                                    </a>
                                                    <a href="wishlist.php" class="action-btn">
                                                        <i class="fa fa-repeat"></i>
                                                        <span class="sr-only">Add To Compare</span>
                                                    </a>
                                                    <a href="cart.php" class="action-btn">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <span class="sr-only">Add To Cart</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product__info">
                                                <div class="product__info--left">
                                                    <h3 class="product__title">
                                                        <a href="product-details.php">Lexbaro Begadi</a>
                                                    </h3>
                                                    <div class="product__price">
                                                        <span class="money">132.00</span>
                                                        <span class="sign">$</span>
                                                    </div>
                                                </div>
                                                <div class="product__info--right">
                                                    <span class="product__rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

-->


<!-- item Backup 

                                    <div class="item">
                                        <div class="payne-product">
                                            <div class="product__inner">
                                                <div class="product__image">
                                                    <figure class="product__image--holder">
                                                        <img src="assets/img/products/product-03-270x300.jpg" alt="Product">
                                                    </figure>
                                                    <a href="product-details.php" class="product__overlay"></a>
                                                    <div class="product__action">
                                                        <a data-toggle="modal" data-target="#productModal"
                                                            class="action-btn">
                                                            <i class="fa fa-eye"></i>
                                                            <span class="sr-only">Quick View</span>
                                                        </a>
                                                        <a href="wishlist.php" class="action-btn">
                                                            <i class="fa fa-heart-o"></i>
                                                            <span class="sr-only">Add to wishlist</span>
                                                        </a>
                                                        <a href="compare.php" class="action-btn">
                                                            <i class="fa fa-repeat"></i>
                                                            <span class="sr-only">Add To Compare</span>
                                                        </a>
                                                        <a href="cart.php" class="action-btn">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span class="sr-only">Add To Cart</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product__info">
                                                    <div class="product__info--left">
                                                        <h3 class="product__title">
                                                            <a href="product-details.php">Lexbaro Begadi</a>
                                                        </h3>
                                                        <div class="product__price">
                                                            <span class="money">132.00</span>
                                                            <span class="sign">$</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__info--right">
                                                        <span class="product__rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

-->