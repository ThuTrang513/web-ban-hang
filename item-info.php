<?php
//header('Content-Type: text/html; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', 
					'Thutrang050103@', 'bán_hàng_online');
if(isset($_GET['item']) !=null){
	$item_name = $_GET['item'];
	$sql = "select * from sản_phẩm where tên_sp = '$item_name'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result,1);
	$img = "./img/".$row["ảnh"];
    $price = $row['đơn_giá']."đ";
    $price_sale  = $price;
    if($row['giảm_giá'] != null){$price_sale  = ((100 - $row['giảm_giá']) * $row['đơn_giá'] / 100 )."đ";}
    $sale_off = $row['giảm_giá']."%";
    $cat_code = $row['mã_loại'];
    $sql_1  = "select * from loại_hàng where mã_loại = '$cat_code'";
    $result_1 = mysqli_query($con, $sql_1);
	$row_1 = mysqli_fetch_array($result_1,1);
	$quantity = 1;
	$item = '
                                <h2 class="item__name">
                                    '.$row['tên_sp'].'
                                </h2>
                                <div class="item__sale">
                                    <p class="item__sale-label">Đã bán: </p>
                                    <p class="item__sale-value">'.$row['đã_bán'].'</p>
                                </div>
                                <div class="item__sale">
                                    <p class="item__sale-label">Hàng còn: </p>
                                    <p class="item__sale-value">';
    if($row['lượng_hàng'] != 0){
        $item = $item.$row['lượng_hàng'];
    }
    else{
        $item = $item." Hết hàng";
    }
    $item = $item.'</p>
                                </div>
                                <div class="item__price">'
                                    ;
if($row['giảm_giá'] != null){
                                $item = $item.'<span class="item__price-old">
                                        '.$price.'
                                    </span>' ;
                                }
                                $item = $item.'<span class="item__price-new">
                                        '.$price_sale.'
                                    </span>';
                                $item = $item.'</div>
                                <div class="item__category">
                                    Brand: 
                                    <span class="item__price-brand">
                                        '.$row_1['tên_loại'].'
                                    </span>
                                </div>
                            ';
    echo $item;
}