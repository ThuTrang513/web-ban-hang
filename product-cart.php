<?php
session_start();
$_SESSION['cart'] = 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="base.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="app">
            <header class="header">
                <div class="grid">
                    <nav class="header__navbar">
                        <div class="header__navbar-list">
                            <a href="index.php" class="header__navbar-item"> Trang chủ </a>
                        </div>
    
                        <ul class="header__navbar-list">
                            <li class="header__navbar-item">
                                <a href="order.php" class="header__navbar-item-link">Đơn hàng</a>   
                            </li>
                            <li class="header__navbar-item">
                                <a href="product-cart.php" class="header__navbar-item-link">Giỏ hàng</a>
                            </li>
                            <!-- <li class="header__navbar-item header__navbar-item--strong">
                                <a href="./admin/authen/dang_ky.php"  class="header__navbar-item-link">Đăng ký</a>
                            </li>
                            <li class="header__navbar-item header__navbar-item--strong"> 
                                <a href="./admin/authen/dang_nhap.php"  class="header__navbar-item-link">Đăng nhập</a> 
                            </li> -->
                            <?php require 'checkdangnhap.php';?>
                        </ul>
                    </nav>
                    <p class="header__titel">MALANI PERFUMES</p>
                </div>
            </header>

            <div class="container">
                <div class="grid">
                    <div class="grid__row cart__item">
                        <div class="product_cart">
                            <div class="product_cart_grid__column-7">
                                <div class="product_cart__label">
                                    <div class="product_cart__label-product">
                                        SẢN PHẨM
                                    </div>
                                    <div class="product_cart__label-cost">
                                        GIÁ
                                    </div>
                                    <div class="product_cart__label-quantity">
                                        SỐ LƯỢNG
                                    </div>
                                    <div class="product_cart__label-cost-temp">
                                        TẠM TÍNH
                                    </div>
                                </div>
                                <div class="product_cart__list">
                                    <form action='' class="product_cart__list" method='POST'>
                                            <!-- <input type="submit"  class="product_cart__item-delete" 
                                            name="item_del" value="x"></input>
                                            <div class="product_cart__item-img">
                                                <img
                                                    alt="abc" class="product_cart__item-img" 
                                                    style="object-fit: contain" src="./img/Butterfly_Agarwood_&_Benzoin.jpg">
                                            </div>
                                            <div class="product_cart__item-name">
                                                Butterfly Agarwood & Benzoin
                                            </div>
                                            <div class="product_cart__item-price">
                                                1.500.000 đ
                                            </div>
                                            <div class="product_cart__item-quantity">
                                                    <input type="text"  class="item__quantity-amount" 
                                                    name="amount" value="1"></input>
                                            </div>
                                            <div class="product_cart__item-price">
                                                3.000.000 đ
                                            </div> -->
                                            <?php require 'quantity_cart_item.php';?>
                                            <?php require 'change_cart_item.php';?>
                                            <?php require 'product-cart-info.php';?> 
                                    </form>
                                </div>
                            </div>
                            <div class="product_cart_grid__column-5">
                                <div class="product_cart_total__label">
                                    <div class="product_cart_total__label-product">
                                        CỘNG GIỎ HÀNG
                                    </div>
                                </div>
                                <!-- <div class="product_cart_total__list">
                                    <div class="product_cart_total__item">
                                        <div class="product_cart_total__item-label">
                                            Tạm tính:
                                        </div>
                                        <div class="product_cart_total__item-value">
                                            2.900.000 đ
                                        </div>
                                    </div>
                                    <div class="product_cart_total__ship">
                                        <div class="product_cart_total__item-label">
                                            Phí ship:
                                        </div>
                                        <div class="product_cart_total__item-value">
                                            30.000 đ
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="product_cart_total__amount">
                                    <div class="product_cart_total__amount-label">
                                        Tổng:
                                    </div>
                                    <div class="product_cart_total__amount-value">
                                        3.000.000 đ
                                    </div>
                                </div> -->
                                <?php require 'total_cart.php';?> 
                                <form action='info.php' class="" method='POST'>
                                    <?php
                                    if($_SESSION['cart'] == 1){
                                        echo '<input type="submit"  class="product_cart_total__payment"
                                    name="total_amount" value="TIẾN HÀNH ĐẶT HÀNG"></input>';
                                    require 'total_order.php';
                                    }
                                     
                                     ?>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

            <footer class="footer">
                <div class="grid">
                    <ul class="footer__list">
                        <li class="footer__list-item-header">
                            Malani Perfumes
                        </li>
                        <li class="footer__list-item">
                            SĐT: 0123456789
                        </li>
                        <li class="footer__list-item">
                            Email: malani@gmail.com
                        </li>
                        
                        <li class="footer__list-item">
                            Địa chỉ: Xuân thủy, Cầu Giấy, Hà Nội
                        </li>
                        <?php require 'checkdangnhap.php';?>
                    </ul>
                </div>
            </footer>
        </div>
    </body>
</html>