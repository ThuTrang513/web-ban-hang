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
                    <div class="grid__row app__content">
                        <div class="grid__column-2">
                            <nav class="category">
                                <h3 class="category-heading">
                                    <!-- <i class="fas fa-list"> -->
                                        Danh mục
                                    <!-- </i> -->
                                </h3>
                                <ul class="category-list">
                                    <form action='index.php' class="dangky" method='GET'>
                                        <?php require 'category_item.php';?> 
                                    </form>
                                </ul>
                            </nav>
                        </div>
                        <div class="grid__column-10">
                            <form action='index.php' class="dangky" method='GET'>
                                <div class="home-filter">
                                    <span class="home-filter__label">
                                        Sắp xếp theo: 
                                    </span>                     
                                    <!-- <input type="submit"  class="home-filter__btn btn" name="pho_bien" value="Phổ biến"></input> -->
                                    <input type="submit"  class="home-filter__btn btn" name="moi_nhat" value="Mới nhất"></input>
                                    <input type="submit"  class="home-filter__btn btn btn--primary" name="ban_chay" value="Bán chạy"></input>
                                    <input type="submit"  class="home-filter__btn btn" name="giam" value="Từ cao đến thấp"></input>
                                    <input type="submit"  class="home-filter__btn btn btn--primary" name="tang" value="Từ thấp đến cao"></input>
                                </div>
                            </form>
                            <div class="home-product">
                                <div class="grid__row">
                                    <?php require 'contain-item.php';?> 
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