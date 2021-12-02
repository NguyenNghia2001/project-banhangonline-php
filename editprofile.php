<?php 
	include 'include/header.php';
	// include 'include/slider.php';
	
?>
<?php
    $login_check = session::get('customer_login');
    if($login_check == false){
        header('Localtion: login.php');
    }else{

    }
?>
<?php 
    $id= session::get('customer_id');
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])){
			$update_customer = $cus->Update_Customer($_POST, $id);
		}
?>
 <div class="main">
    <div class="content">

    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
                <h3> Update Profile Customer </h3>
            </div>
    		<div class="clear"></div>
    	</div>
       <form action="" method="POST">
            <table class="tblone">
            <!-- hiện thị thông khách hàng  -->
            <tr>
                <?php 
                    if(isset($update_customer)){
                        echo "<td colspan='4'>$update_customer</td>";
                    }
                ?>
            </tr>
                <?php 
                     $id= session::get('customer_id');
                    $get_customer = $cus->show_customer($id);
                    if($get_customer){
                        while($result_customer = $get_customer->fetch_assoc()){
                
                ?>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td ><input type="text" name="name" value="<?php echo  $result_customer['name'];?>" style="width:300px; text-align:left;"></td>
                    </tr>
                    <!-- <tr>
                        <td>CiTy</td>
                        <td>:</td>
                        <td ><input type="text" name="city_customer" value="<?php echo  $result_customer['city'];?>" style="width:300px; text-align:left;"></td>
                    </tr> -->
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td ><input type="text" name="phone" value="<?php echo  $result_customer['phone'];?>" style="width:300px; text-align:left;"></td>
                    </tr>
                
                    <tr>
                        <td>ZipCode</td>
                        <td>:</td>
                        <td ><input type="text" name="zipcode" value="<?php echo  $result_customer['zipcode'];?>" style="width:300px; text-align:left;"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td ><input type="text" name="email" value="<?php echo  $result_customer['email'];?>" style="width:300px; text-align:left;"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td ><input type="text" name="address" value="<?php echo  $result_customer['address'];?>" style="width:300px; text-align:left;"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" name="update" class="back01" value="Save Profile Customer"></td>
                    </tr>
                    <?php 
                    
                        }
                    }
                    ?>
            </table>
        </form>
        </div>
	 </div>
<?php 
	include 'include/footer.php';	
?>