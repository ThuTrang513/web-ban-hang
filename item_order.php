<?php
//header('Content-Type: text/html; charset=UTF-8');
//session_start();
$con = mysqli_connect('localhost', 'root', 
					'Thutrang050103@', 'bán_hàng_online');
if(isset($_POST['order_cart']) !=null){
	if(isset($_SESSION['email'])){
		$quantity = $_POST['amount'];
		
		if($quantity == null) {
			$quantity = 1;
		}
			$email = $_SESSION['email'];
			$query = "SELECT * FROM khách_hàng WHERE email='$email'";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result,1);
			$cus_id = $row['mã_kh'];
			$item = $_GET['item'];
			$query_3  = "SELECT * FROM đơn_hàng WHERE mã_kh='$cus_id' and tình_trạng IS NULL;";
			$result_3= mysqli_query($con, $query_3);
			$row_3 = mysqli_fetch_array($result_3,1);
			$order_id = 1;
			if(isset($row_3) == null){
				$query_2 = "INSERT INTO đơn_hàng (mã_đh, ngày_đặt, ngày_giao_dk, ngày_giao_tt, tình_trạng, mã_kh, tổng_tiền) VALUES (NULL, NULL, NULL, NULL, NULL,$cus_id, NULL)";
				$result_2 = mysqli_query($con, $query_2);
				$query_3  = "SELECT * FROM đơn_hàng WHERE mã_kh='$cus_id' and tình_trạng IS NULL;";
				$result_3= mysqli_query($con, $query_3);
				$row_3 = mysqli_fetch_array($result_3,1);
				$order_id = $row_3['mã_đh'];

			}
			else{
				$order_id = $row_3['mã_đh'];
			}
			$_SESSION['order_id'] = $order_id;
			$query_4  = "SELECT * FROM sản_phẩm WHERE tên_sp='$item';";
			$result_4= mysqli_query($con, $query_4);
			$row_4 = mysqli_fetch_array($result_4,1);
			if($row_4['lượng_hàng'] < $quantity){
				echo '<div class="error">
				Không đủ hàng !!!
				</div>';
			}
			else{
				$item_id = $row_4['mã_sp'];
				$item_recent_cost = $row_4['đơn_giá'];

				$query_5  = "SELECT * FROM thông_tin_đơn_hàng WHERE mã_đh = '$order_id' and mã_sp = '$item_id'";
				$result_5= mysqli_query($con, $query_5);
				$row_5 = mysqli_fetch_array($result_5,1);
				if (isset($row_5) != null) {
					$query_6  = "UPDATE thông_tin_đơn_hàng SET số_lượng = $quantity, đơn_giá = $item_recent_cost WHERE mã_đh = '$order_id' and mã_sp = '$item_id'";
					$result_6= mysqli_query($con, $query_6);
				}
				else{
					$query_6  = "INSERT INTO thông_tin_đơn_hàng(mã_đh, mã_sp, số_lượng, đơn_giá) VALUES ($order_id,$item_id,$quantity,$item_recent_cost)";
					$result_6= mysqli_query($con, $query_6);
				}
			}	
	}
	else {
		echo '<div class="error">
			Vui lòng đăng nhập !!!
		</div>';
	}
}
