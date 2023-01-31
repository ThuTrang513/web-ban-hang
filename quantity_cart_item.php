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
			$check = 0;
			while($row_2 = mysqli_fetch_array($result_2,1)){
				$item_id = $row_2['mã_sp'];
				$del = "item_del_".$item_id;
				$quan = "amount_".$item_id;
				$sql_3 = "SELECT * FROM sản_phẩm WHERE mã_sp = $item_id";
				$result_3 = mysqli_query($con, $sql_3);
				$row_3 = mysqli_fetch_array($result_3,1);
				if(isset($_POST[$quan]) != null && $_POST[$quan] != $row_2['số_lượng']){
					if($_POST[$quan] > $row_3['lượng_hàng']){
						$_POST[$quan] = $row_2['số_lượng'];
						echo "<p style='font-size: 13px'>Không đủ hàng</p>";
					}
					$sql_4 = "UPDATE thông_tin_đơn_hàng SET số_lượng = $_POST[$quan] WHERE mã_đh = '$order_id' and mã_sp = '$item_id'";
					$result_4= mysqli_query($con, $sql_4);
					$check = 1;
					break;
				}
            }
            if($check == 1){
            	$_SESSION['check'] = 1;
            }
            else{
            	$_SESSION['check'] = 0;
            }
		}
	}
	else{

	}
}
else{

}