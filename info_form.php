<?php
$con = mysqli_connect('localhost', 'root', 
					'Thutrang050103@', 'bán_hàng_online');
$email = $_SESSION['email'];
$order_id = $_SESSION['order_id'];
$sql = "SELECT * FROM khách_hàng WHERE email = '$email'";
$result =  mysqli_query($con, $sql);
$row = mysqli_fetch_array($result,1);
$cus_id = $row['mã_kh'];
$name = $row['tên_kh'];
$address = $row['địa_chỉ'];
$phone = $row['sdt'];
echo '<div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="'.$name.'" name="name">
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="'.$address.'" name="address">
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="'.$phone.'" name="phone">
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" placeholder="Ghi chú" name="note">
                                </div>
                            </div>

                            <div class="auth-form__controls">
                                <button class="btn auth-form__controls-back">
                                    <a href="http://localhost/btl/index.php"  class="btn auth-form__controls-back">TRỞ LẠI</a>
                                </button>
                                <button class="btn btn--primary">
                                    <input type="submit"  class="btn btn--primary" name="finish" value="HOÀN THÀNH"></input>
                                </button>
                            </div>';