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
                    <div class="grid__row app__item">
                        <div class="product_item">
                            <div class="grid__column-5">
                                <?php require 'item-info-image.php';?>
                            </div>
                            <div class="grid__column-7">
                                <?php require 'item-info.php';?> 
                                <form action='' class="order" method='POST'>
                                    <div class="item__quantity">                             
                                        Số lượng: 
                                        <input type="text"  class="item__quantity-amount" 
                                        name="amount" placeholder="1"></input>
                                    </div>
                                    <div class="item_order">
                                        <input type="submit"  class="item_order_cart" 
                                        name="order_cart" value="Thêm vào giỏ hàng"></input>
                                        <?php
                                            if(isset($_SESSION['email']) != null){
                                                echo '<a href="product-cart.php" class="item_order_im" >
                                            Đến giỏ hàng
                                        </a> ';
                                            }
                                            else{
                                                echo '<a href="" class="item_order_im" >
                                            Đến giỏ hàng
                                        </a> 
                                        ';
                                        $_POST['order_cart'] = 1;
                                            }
                                        ?>                              
                                    </div>
                                    <?php require 'item_order.php';?> 
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