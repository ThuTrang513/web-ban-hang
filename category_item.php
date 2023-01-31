<?php
$con = mysqli_connect('localhost', 'root', 
					'Thutrang050103@', 'bán_hàng_online');
$sql = 'select * from loại_hàng';
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result,1)) {
	//var_dump($row);
    echo'<li class="category-item">
            <a href="" class="category-item__link">
                <input type="submit"  class="category-item__link-input" name="'.$row['mã_loại'].'" value="'.$row['tên_loại'].'"></input>
            </a>
        </li>';
}
mysqli_close($con);