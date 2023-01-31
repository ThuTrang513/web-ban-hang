<?php
session_start();
if(isset($_SESSION['email'])) {
		unset($_SESSION['email']);
}
//include('E:\New folder\XAMPP\htdocs\btl\taikhoan.php');
header('Content-Type: text/html; charset=UTF-8');
if(isset($_POST['dangnhap'])){
	include('E:\New folder\XAMPP\htdocs\BTL\database\dbhelber.php');
	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);
	$username = null;

	if(!$email | !$password) {
		//echo<p>abc</p>
		echo "<p style='font-size: 13px'>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu</p>";
		exit;
	}

	$query = "SELECT email, mật_khẩu FROM khách_hàng WHERE email='$email'and mật_khẩu='$password'";
	$result = executeResult($query);
	if (!$result) {
	echo "<p style='font-size: 13px'>Email hoặc mật khẩu không đúng!</p>";
	} else {
		echo "<p style='font-size: 13px'>Đăng nhập thành công!</p>";
		$username = $email;
	}
	$_SESSION['email'] = $username;
	exit;
}
