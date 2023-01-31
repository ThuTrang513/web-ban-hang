<?php
$con = mysqli_connect('localhost', 'root', 
					'Thutrang050103@', 'bán_hàng_online');
if(isset($_SESSION['email']) !=null){
	$email = $_SESSION['email'];
	$sql_1 = "SELECT * FROM khách_hàng WHERE email = '$email'";
	$result_1 = mysqli_query($con, $sql_1);
	$row_1 = mysqli_fetch_array($result_1,1);
	$cus_id = $row_1['mã_kh'];
	$sql_2 = "SELECT * FROM đơn_hàng WHERE mã_kh='$cus_id' and tình_trạng IS NOT NULL;";
	$result_2 = mysqli_query($con, $sql_2);
	while($row_2 = mysqli_fetch_array($result_2,1)){

		echo '
		<div class="order__item">
		<div class="order-att">
                                            '.$row_2['tình_trạng'].'
                                        </div>
                                        <div class="order-code">
                                            '.$row_2['mã_đh'].'
                                        </div>
                                        <div class="order-price">
                                            '.$row_2['tổng_tiền'].' đ
                                        </div>
                                        <div class="order-address">
                                            '.$row_2['ngày_giao_dk'].'
                                        </div>
                                        <div class="order-phone">
                                            '.$row_1['sdt'].'
                                        </div>
                                        <div class="order-address">
                                            '.$row_1['địa_chỉ'].'
                                        </div>
                                    </div>';
	}
}
