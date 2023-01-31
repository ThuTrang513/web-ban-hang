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
			$sql_2 = "SELECT sum(số_lượng*đơn_giá) tổng FROM thông_tin_đơn_hàng WHERE mã_đh = $order_id GROUP BY mã_đh";
			$result_2 = mysqli_query($con, $sql_2);
			$row_2 = mysqli_fetch_array($result_2,1);
			if($row_2 != null){
				$sum = $row_2['tổng'];
				$ship = 0;
				echo '<div class="product_cart_total__list">
	                                    <div class="product_cart_total__item">
	                                        <div class="product_cart_total__item-label">
	                                            Tạm tính:
	                                        </div>
	                                        <div class="product_cart_total__item-value">
	                                            '.$sum.' đ
	                                        </div>
	                                    </div>
	                                    <div class="product_cart_total__ship">
	                                        <div class="product_cart_total__item-label">
	                                            Phí ship:
	                                        </div>
	                                        <div class="product_cart_total__item-value">
	                                            '.$ship.' đ
	                                        </div>
	                                        
	                                    </div>
	                                </div>
	                                <div class="product_cart_total__amount">
	                                    <div class="product_cart_total__amount-label">
	                                        Tổng:
	                                    </div>
	                                    <div class="product_cart_total__amount-value">
	                                        '.($ship + $sum).' đ
	                                    </div>
	                                </div>';
	            $_SESSION['cart'] = 1;
	            $_SESSION['total'] = $ship + $sum;
	            $_SESSION['order_id'] = $order_id;
	            $total = $_SESSION['total'];
				$sql_3 = "UPDATE đơn_hàng SET tổng_tiền=$total WHERE mã_đh=$order_id";
				$result_3= mysqli_query($con, $sql_3);
			}
		}
	}
	else{

	}
}
else{

}