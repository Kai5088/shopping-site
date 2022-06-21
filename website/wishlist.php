<?php
session_start();
include('account-operation.php');
include('connect-sql.php');
if(!is_login())
{
    header("Location: login-register.php"); 
    exit;
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
                                                    <?php 
                                                        $sql = "SELECT DISTINCT `Goods_Classify` FROM `goods` ORDER BY CHAR_LENGTH(`Goods_Classify`) DESC;";
                                                        $result = mysqli_query($db_link, $sql);

                                                        while($row = $result->fetch_assoc()) 
                                                        {          
                                                            $Goods_Classify = $row['Goods_Classify'];                                                           
                                                            echo <<<EOL
                                                                <li>
                                                                    <a href="shop.php?Goods_Classify=$Goods_Classify">$Goods_Classify</a>
                                                                </li>
                                                            EOL; 
                                                        }
                                                    ?>
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
                        <h1 class="page-title">暫存清單</h1>
                        <ul class="breadcrumb">
                            <li><a href="index.php">主頁</a></li>
                            <li class="current"><span>暫存清單</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb area End -->

        <!-- Main Content Wrapper Start -->
        <div class="main-content-wrapper">
            <div class="page-content-inner ptb--80 ptb-md--60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-content table-responsive">
                                <table class="table table-style-2 wishlist-table text-center">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th class="text-left">產品</th>
                                            <th>庫存狀態</th>
                                            <th>價格</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $Cus_ID = $_SESSION['id'];

                                            $sql = "SELECT * FROM `cus_temp_list` WHERE `Cus_ID` = '" . $Cus_ID . "';";
                                            $result = mysqli_query($db_link, $sql);
                                            if ($result->num_rows > 0) 
                                            {
                                                while($row = $result->fetch_assoc()) 
                                                {
                                                    $Goods_ID = $row['Goods_ID'];
                                                    $Goods_Name = $row['Goods_Name'];
                                                    $Goods_Price = $row['Goods_Price'];
                                                    $Goods_Num = $row['Goods_Num'];
                                                    $Goods_URL = $row['Goods_URL'];
                                                    $Stock_Status =  ($Goods_Num > 0) ? "尚有 ".$Goods_Num." 個" : "無庫存";
                                                    $add_to_cart_button = ($Goods_Num > 0) ? '<a href="php/insert_data_into_shopping_cart.php?Goods_ID=' . $Goods_ID .'&num=1" class="btn">加入購物車</a>' : "";
                                                    echo <<<EOL
                                                    <tr>
                                                        <td class="product-remove text-left"><a href="php/delete_data_from_temp_list.php?Cus_ID=$Cus_ID&Goods_ID=$Goods_ID"><i
                                                                    class="flaticon-cross"></i></a></td>
                                                        <td class="product-thumbnail text-left">
                                                            <a href="product-details.php?Goods_ID=$Goods_ID">
                                                                <img src="$Goods_URL" alt="Product Thumnail">
                                                            </a>
                                                        </td>
                                                        <td class="product-name text-left wide-column">
                                                            <h3>
                                                                <a href="product-details.php?Goods_ID=$Goods_ID">&nbsp;&nbsp;&nbsp;&nbsp;$Goods_Name</a>
                                                            </h3>
                                                        </td>
                                                        <td class="product-stock">
                                                            $Stock_Status
                                                        </td>
                                                        <td class="product-price">
                                                            <span class="product-price-wrapper">
                                                                <span class="money">$$Goods_Price</span>
                                                            </span>
                                                        </td>
                                                        <td class="product-action-btn">
                                                            $add_to_cart_button
                                                        </td>
                                                    </tr>
                                                    EOL;
                                                }
                                            }
                                            else 
                                            {
                                                echo <<<EOL
                                                <tr>
                                                    <td class="product-remove text-left"></td>
                                                    <td class="product-thumbnail text-left">
                                                    </td>
                                                    <td class="product-name text-left wide-column">
                                                        <h3>
                                                            您的暫存清單中還沒有商品
                                                        </h3>
                                                    </td>
                                                    <td class="product-stock">
                                                    </td>
                                                    <td class="product-price">
                                                    </td>
                                                    <td class="product-action-btn">
                                                    </td>
                                                </tr>
                                                EOL;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
                    </div>
                </div>
                <div class="row ptb--20">
                    <div class="col-12 text-center">
                        <p class="copyright-text">Copyright &copy; 2022 資料庫程式設計第五組<a target="_blank" href="https://ecsb.ntcu.edu.tw/newweb/index.htm"></a></p>
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
                                <?php 
                                    $sql = "SELECT DISTINCT `Goods_Classify` FROM `goods` ORDER BY CHAR_LENGTH(`Goods_Classify`) DESC;";
                                    $result = mysqli_query($db_link, $sql);

                                    while($row = $result->fetch_assoc()) 
                                    {          
                                        $Goods_Classify = $row['Goods_Classify'];                                                           
                                        echo <<<EOL
                                            <li>
                                                <a href="shop.php?Goods_Classify=$Goods_Classify">
                                                    <span class="mm-text">$Goods_Classify</span>
                                                </a>
                                            </li>
                                        EOL; 
                                    }
                                ?>
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


    </div>
    <!-- Main Wrapper End -->

    <!-- Bot Start -->

    <button class="open-button" onclick="openForm()">機器人</button>

    <div class="chat-popup col-md-3" id="myForm">
        <div class="chat-container">

            <iframe class="chat-iframe" src="phpChatBot/index.php">
            </iframe>

            <button class="bot_btn" onclick="closeForm()">關閉視窗</button>
        </div>
    </div>

    <!-- Bot End -->

    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    
    <!-- Bot-pop-up JS -->
    <script src="assets\js\bot-pop-up.js"></script>
</body>

</html>
<!-- *************************** wishlist backup 

                                        <tr>
                                            <td class="product-remove text-left"><a href=""><i
                                                        class="flaticon-cross"></i></a></td>
                                            <td class="product-thumbnail text-left">
                                                <img src="assets/img/products/product-11-70x88.jpg"
                                                    alt="Product Thumnail">
                                            </td>
                                            <td class="product-name text-left wide-column">
                                                <h3>
                                                    <a href="product-details.php">Contemporary 5-Light Large
                                                        Chandelier</a>
                                                </h3>
                                            </td>
                                            <td class="product-stock">
                                                有
                                            </td>
                                            <td class="product-price">
                                                <span class="product-price-wrapper">
                                                    <span class="money">$49</span>
                                                </span>
                                            </td>
                                            <td class="product-action-btn">
                                                <a href="cart.php" class="btn">加入購物車</a>
                                            </td>
                                        </tr>

-->