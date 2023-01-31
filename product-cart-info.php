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
				$sql_3 = "SELECT * FROM sản_phẩm WHERE mã_sp = '$item_id'";
				$result_3 = mysqli_query($con, $sql_3);
				$row_3 = mysqli_fetch_array($result_3,1);
				$img = "./img/".$row_3["ảnh"];
			    $price = $row_3['đơn_giá']."đ";
			    $price_sale  = $price;
			    if($row_3['giảm_giá'] != null){$price_sale  = ((100 - $row_3['giảm_giá']) * $row_3['đơn_giá'] / 100 )."đ";}
				echo '<div class="product_cart__item">
				<input type="submit"  class="product_cart__item-delete" 
                                            name="item_del_'.$item_id.'" value="x"></input>
                                            <div class="product_cart__item-img">
                                                <img
                                                    alt="abc" class="product_cart__item-img" 
                                                    style="object-fit: contain" src="'.$img.'">
                                            </div>
                                            <div class="product_cart__item-name">'.
                                                $row_3['tên_sp']
                                            .'</div>
                                            <div class="product_cart__item-price">
                                                '.$row_2['đơn_giá'].'
                                            </div>
                                            <div class="product_cart__item-quantity">
                                                    <input type="text"  class="item__quantity-amount" 
                                                    name="amount_'.$item_id.'" value="'.$row_2['số_lượng'].'"></input>
                                            </div>
                                            <div class="product_cart__item-price">
                                                '.($row_2['đơn_giá']*$row_2['số_lượng']).'
                                            </div>
                                        </div>';
            }
		}
	}
	else{

	}
}
else{

}