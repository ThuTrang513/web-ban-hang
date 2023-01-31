<?php
session_start();
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
                            <li class="header__navbar-item">
                                <a href="order.php" class="header__navbar-item-link">Đơn hàng</a>     
                            </li>
                            <li class="header__navbar-item">
                                <a href="product-cart.php" class="header__navbar-item-link">Giỏ hàng</a>
                            </li>
                            <?php require 'checkdangnhap.php';?>
                        </ul>
                    </nav>
                    <p class="header__titel">MALANI PERFUMES</p>
                </div>
            </header>

            <div class="container">
                <div class="grid">
                    <div class="grid__row order__item">
                        <div class="order">
                            <div class="order_grid__column">
                                <div class="order__label">
                                    <div class="order__label-att">
                                        TÌNH TRẠNG
                                    </div>
                                    <div class="order__label-code">
                                        MÃ ĐƠN HÀNG
                                    </div>
                                    <div class="order__label-cost">
                                        GIÁ
                                    </div>
                                    <div class="order__label-phone">
                                        NGÀY DỰ KIẾN
                                    </div>
                                    <div class="order__label-address">
                                        SỐ ĐT
                                    </div>
                                    <div class="order__label-complete">
                                        ĐỊA CHỈ
                                    </div>
                                </div>
                                <div class="order__list">
                                        <!-- <div class="order-att">
                                            đã nhận
                                        </div>
                                        <div class="order-code">
                                            1
                                        </div>
                                        <div class="order-price">
                                            1.500.000 đ
                                        </div>
                                        <div class="order-phone">
                                            0896639251
                                        </div>
                                        <div class="order-address">
                                            Hà Nội
                                        </div> -->
                                        <?php require 'order_detail.php';?> 
                                </div>
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