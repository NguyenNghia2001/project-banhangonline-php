<?php 
	include 'include/header.php';
	// include 'include/slider.php';
	
?>
<?php 
        $login_check = session::get("customer_login");
        if($login_check == false){
           session::destroy();
        }
?>
<style>
    .tblone td .profile{
        border: 1px solid #e5e5e5;
        padding: 10px;
        font-size: 15px;
        border-radius: 5px;
        background-color: #e5e5e5;

    }
    
</style>
 <div class="main">
    <div class="content">

    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
                <h3>Profile Customer </h3>
            </div>
    		<div class="clear"></div>
    	</div>
       
        <table class="tblone">
        <?php 
        $id= session::get('customer_id');
            $get_customer = $cus->show_customer($id);
            if($get_customer){
                while($result_customer = $get_customer->fetch_assoc()){
          
        ?>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td style="text-align:left"> <?php echo  $result_customer['name'];?></td>
            </tr>
            <tr>
                <td>CiTy</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td style="text-align:left"><?php echo  $result_customer['city'];?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td style="text-align:left"><?php echo  $result_customer['phone'];?></td>
            </tr>
           
            <tr>
                <td>ZipCode</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td style="text-align:left"><?php echo  $result_customer['zipcode'];?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td style="text-align:left"><?php echo  $result_customer['email'];?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td></td>
                <td></td>
                <td style="text-align:left"><?php echo  $result_customer['address'];?></td>
            </tr>
            <tr>
                <td><a href="editprofile.php" class="profile"> Update Profile</a></td>
                <td><a href="changepassword.php" class="profile"> Change Password</a></td>
            </tr>
            <?php 
            
                }
            }
            ?>
        </table>

        </div>
	 </div>
<?php 
	include 'include/footer.php';	
?>