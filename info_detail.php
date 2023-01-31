<?php
$con = mysqli_connect('localhost', 'root', 
					'Thutrang050103@', 'bán_hàng_online');
$email = $_SESSION['email'];
$order_id = $_SESSION['order_id'];
if(isset($_POST['finish'])){
	$note = $_POST['note'];
	
	$sql = "SELECT * FROM khách_hàng WHERE email = '$email'";
	$result =  mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result,1);
	$cus_id = $row['mã_kh'];
	$name = $row['tên_kh'];
	$address = $row['địa_chỉ'];
	$phone = $row['sdt'];
	if($_POST['name'] != null){
		$name = $_POST['name'];
	}
	if($_POST['address'] != null){
		$address = $_POST['address'];
	}
	if($_POST['phone'] != null){
		$phone = $_POST['phone'];
	}
	if(!$name || !$address || !$phone){
		echo "<p style='font-size: 13px'>Vui lòng nhập đầy đủ thông tin</p>";
	}
	else{
		$sql_1 = "UPDATE khách_hàng SET tên_kh = '$name',sdt = '$phone', địa_chỉ = '$address' WHERE mã_kh='$cus_id'";
		$result_1= mysqli_query($con, $sql_1);
		if($note != null){
			$sql_2 = "UPDATE đơn_hàng SET ghi_chú = '$note' WHERE mã_đh='$order_id'";
			$result_2= mysqli_query($con, $sql_2);
		}
		$order_id = $_SESSION['order_id'];
		$sql_1 = "UPDATE đơn_hàng SET tình_trạng='đã đặt' WHERE mã_đh=$order_id";
		$result_1= mysqli_query($con, $sql_1);
		$sql_4 = "SELECT * FROM thông_tin_đơn_hàng WHERE mã_đh = '$order_id'";
		$result_4 = mysqli_query($con, $sql_4);
		while($row_4 = mysqli_fetch_array($result_4,1)){
			$item_id = $row_4['mã_sp'];
			$sql_5 = "SELECT * FROM sản_phẩm WHERE mã_sp = '$item_id'";
			$result_5 = mysqli_query($con, $sql_5);
			$row_5 = mysqli_fetch_array($result_5,1);
			$item_remain = $row_5['lượng_hàng'] - $row_4['số_lượng'];
			if($item_remain < 0){
				$item_remain = 0;
			}
			$item_sale = $row_5['đã_bán'] + $row_4['số_lượng'];
			$sql_6 = "UPDATE sản_phẩm SET lượng_hàng = $item_remain, đã_bán = $item_sale WHERE mã_sp=$item_id";
			$result_6= mysqli_query($con, $sql_6);
		}
		$sql_7 = "SELECT CURRENT_DATE order_date;";
		$result_7 = mysqli_query($con, $sql_7);
		$row_7 = mysqli_fetch_array($result_7,1);
		$order_date = $row_7['order_date'];
		$sql_8 = "SELECT ADDDATE(CURRENT_DATE,7) ship_date;";
		$result_8 = mysqli_query($con, $sql_8);
		$row_8 = mysqli_fetch_array($result_8,1);
		$ship_date = $row_8['ship_date'];
		$sql_9 = "UPDATE đơn_hàng SET ngày_đặt = '$order_date', ngày_giao_dk = '$ship_date' WHERE mã_đh=$order_id";
		$result_9 = mysqli_query($con, $sql_9);

		echo "<a href ='order.php' style='font-size: 13px'>Tiếp tục</a>";
	}
}