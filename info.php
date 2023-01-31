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
       <div class="modal">
            <div class="modal__overlay">
            </div>
            <div class="modal__body">
                <div class="auth-form">
                    <form action='info.php' class="info-order" method='POST'>
                        <div class="auth-form__container">
                            <div class="auth-form__header">
                                <h3 class="auth-form__heading">Thông tin người nhận</h3>
                            </div>
                            <div class="auth-form__form">
                                <!-- <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="Họ và tên của bạn" name="name">
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="Địa chỉ của bạn" name="address">
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="Số điện thoại" name="phone">
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="Ghi chú" name="note">
                                </div> -->
                                
                            <!-- </div>

                            <div class="auth-form__controls">
                                <button class="btn auth-form__controls-back">
                                    <a href="http://localhost/btl/index.php"  class="btn auth-form__controls-back">TRỞ LẠI</a>
                                </button>
                                <button class="btn btn--primary">
                                    <input type="submit"  class="btn btn--primary" name="finish" value="HOÀN THÀNH"></input>
                                </button>
                            </div> -->
                            <?php require'info_detail.php';?>
                            <?php require'info_form.php';?>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </body>
</html>