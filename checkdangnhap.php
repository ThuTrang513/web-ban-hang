<?php  
	if(!isset($_SESSION['email'])) {
		echo "<li class='header__navbar-item header__navbar-item--strong'>
		    <a href='./admin/authen/dang_ky.php'  class='header__navbar-item-link'>Đăng ký</a>
            </li>
	        <li class='header__navbar-item header__navbar-item--strong'> 
	            <a href='./admin/authen/dang_nhap.php'  class='header__navbar-item-link'>Đăng nhập</a> 
	        </li>";
	}
	else {
		echo "
		<li class='header__navbar-item'>
                                <a href='./admin/authen/dang_nhap.php' class='header__navbar-item-link'>
                                Đăng xuất
                                <?php require 'dang_xuat.php';?>
                                </a>
                            </li>
		<li class='header__navbar-item header__navbar-item--strong'>
		    Hello ".$_SESSION['email']."!
            </li>
        ";
	}
?>