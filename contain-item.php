<?php
//header('Content-Type: text/html; charset=UTF-8');
$con = mysqli_connect('localhost', 'root', 
					'Thutrang050103@', 'bán_hàng_online');
$sql = 'select * from loại_hàng';
$result = mysqli_query($con, $sql);
$category  = null;
while($row = mysqli_fetch_array($result,1)) {
    //var_dump($row);
    $index = $row["mã_loại"];
    if(isset($_GET[$index]) !=null){
        $category = $row["mã_loại"];
    }
}
$sql = 'select * from sản_phẩm';
if($category != null) {
    $sql = $sql.' where mã_loại = '.$category;
}
if(isset($_GET['moi_nhat']) !=null) {
    $sql = $sql.' ORDER BY ngày_nhập DESC';
}
if(isset($_GET['ban_chay']) !=null) {
    $sql = $sql.' ORDER BY đã_bán DESC';
}
if(isset($_GET['tang']) !=null) {
    $sql = $sql.' ORDER BY đơn_giá ASC';
}
if(isset($_GET['giảm']) !=null) {
    $sql = $sql.' ORDER BY đơn_giá DESC';
}
$result = mysqli_query($con, $sql);
$count = 0; 
$temp = '<div class="grid__row">
                <div class="grid__column-2-4">';
while($row = mysqli_fetch_array($result,1)) {
	//var_dump($row);
    $img = "./img/".$row["ảnh"];
    $price = $row['đơn_giá']."đ";
    $price_sale  = $price;
    if($row['giảm_giá'] != null){$price_sale  = ((100 - $row['giảm_giá']) * $row['đơn_giá'] / 100 )."đ";}
    $sale_off = $row['giảm_giá']."%";
	$item = '<div class="grid__column-2-4">
            <div class="home-product-item">
                <div class="home-product-item__img">
                    <img
                        alt="$row["tên_sp"]" class="home-product-item__img" 
                        style="object-fit: contain" src="'.$img
.'">
               </div>
               <h4 class="home-product-item__name">
                    <form action="index_item.php" class="index_item" method="GET">
                        <input type="submit"  class="home-product-item__name input" name="item" value="'.$row['tên_sp'].'"></input>
                    </form>
                </h4>
                <div class="home-product-item__price">';
                if($row['giảm_giá'] != null) {
                    $item = $item.'<span class="home-product-item__price-old">
                            '.$price.'
                        </span>';
                } 
                    
                $item = $item.'<span class="home-product-item__price-new">
                        '.$price_sale.'
                    </span>
                </div>';
                if($row['giảm_giá'] != null){
                    $item = $item.'<div class="home-product-item__sale-off">
                        <span class="home-product-item__sale-off-percent">
                            '.$sale_off.'
                        </span>
                        <span class="home-product-item__sale-off-label">
                            Giảm
                        </span>
                    </div>';
                }
            $item = $item.'</div>
         </div>';
         echo $item;
    $count = $count + 1;
}
mysqli_close($con);