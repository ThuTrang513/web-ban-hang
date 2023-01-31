<?php
$con = mysqli_connect('localhost', 'root', 
					'Thutrang050103@', 'bán_hàng_online');
if(isset($_SESSION['email']) !=null){
	$email = $_SESSION['email'];
	$sql = "select * from khách_hàng where email = '$email'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result,1);
	if($row != null){
		$cus_id = $row['mã_kh'];
		$sql_1 = "SELECT * FROM đơn_hàng WHERE mã_kh='$cus_id' and tình_trạng IS NULL;";
		$result_1 = mysqli_query($con, $sql_1);
		$row_1 = mysqli_fetch_array($result_1,1);
		if($row_1 != null){
			$order_id = $row_1['mã_đh'];
			$sql_2 = "SELECT * FROM thông_tin_đơn_hàng WHERE mã_đh = '$order_id'";
			$result_2 = mysqli_query($con, $sql_2);
			while($row_2 = mysqli_fetch_array($result_2,1)){
				$item_id = $row_2['mã_sp'];
				$del = "item_del_".$item_id;
				$quan = "amount_".$item_id;
				if(isset($_POST[$del]) != null and $_POST[$del] != null && $_SESSION['check'] != 1){
					$sql_3 = "DELETE FROM thông_tin_đơn_hàng WHERE mã_đh = '$order_id' and mã_sp = '$item_id'";
					$result_3 = mysqli_query($con, $sql_3);
					unset($_POST[$del]);
					//sleep(5);
				}	
            }
		}
	}
	else{

	}
}
else{

}