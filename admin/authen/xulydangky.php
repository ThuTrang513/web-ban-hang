<?php
session_start();

header('Content-Type: text/html; charset=UTF-8');
if(isset($_POST['dangky'])){
	include('E:\New folder\XAMPP\htdocs\BTL\database\dbhelber.php');
	$email = addslashes($_POST['email']);
	$password = addslashes($_POST['password']);
	$password_replay = addslashes($_POST['password-replay']);

	if(!$email | !$password | !$password_replay) {
		//echo<p>abc</p>
		echo "<p style='font-size: 13px'>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu</p>";
		exit;
	}
	if($password != $password_replay) {
		echo "<p style='font-size: 13px'>Vui lòng nhập lại mật khẩu
			</p>";
		exit;
	}

	$query = "SELECT email, mật_khẩu FROM khách_hàng WHERE email='$email'";
	$result = executeResult($query);
	if ($result) {
	echo "<p style='font-size: 13px'>Email đã tồn tại </p>";
	} else {
		$query = "INSERT INTO khách_hàng(email,mật_khẩu) VALUES ( '$email','$password')";
		$result = execute($query);
		echo "<p style='font-size: 13px'>Đăng ký thành công! <a href='dang_nhap.php'>Mời bạn đăng nhập lại </a> </p>";
	}
}