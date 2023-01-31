<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial=scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" type="text/css" href='base.css' />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='main.css'>
    </head>
    <body>
       <div class="modal">
            <div class="modal__overlay">
            </div>
            <div class="modal__body">
                <div class="auth-form">
                    <form action='dang_nhap.php' class="dangnhap" method='POST'>
                        <div class="auth-form__container">
                            <div class="auth-form__header">
                                <h3 class="auth-form__heading">Đăng nhập</h3>
                                <span class="auth-form__switch-btn">
                                    <a href="dang_ky.php"  class="auth-form__switch-btn">Đăng ký</a>
                                    
                                </span>
                            </div>
                            <div class="auth-form__form">
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="Email của bạn" name="email">
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" class="auth-form__input" placeholder="Mật khẩu của bạn" name="password">
                                </div>
                            </div>
                            <!-- <div class="auth-form__help">
                                <a href="" class="auth-form__help-link auth-form__help-need">Cần trợ giúp</a>
                                <a href="" class="auth-form__help-link auth-form__help-forget">Quên mất khẩu</a>
                            </div> -->

                            <div class="auth-form__controls">
                                <div class="btn auth-form__controls-back">
                                    <a href="http://localhost/btl/index.php"  class="btn auth-form__controls-back">TRỞ LẠI</a>
                                </div>
                                <div class="btn btn--primary">
                                    <input type="submit"  class="btn btn--primary" name="dangnhap" value="ĐĂNG NHẬP"></input>
                                </div>
                            </div>

                            <?php require 'xulydangnhap.php';?> 
                        </div>
                    <form> 
                </div>
            </div>
        </div> 
    </body>
</html>