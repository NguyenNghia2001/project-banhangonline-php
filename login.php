<?php 
	include 'include/header.php';
	// include 'include/slider.php';
	
?>
<!-- kiểm tra người dùng đã đang nhâp hay chưa qua session nếu người dùng đăng nhập rồi thì đưa tới trang thanh toán  -->
<?php 
	$login_check = session::get('customer_login');
	if($login_check){
		header('Location: order.php');
	}
?>
<!--  thực hiện xử lý register -->
<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		$insertcustomer = $cus->insert_customer($_POST);
	}
?>
<!-- thực hiện xử lý login -->
<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_login'])){
		$login_customer = $cus->login_customer($_POST);
	}
?>

 <div class="main">
    <div class="content">
	<!-- đăng nhập  -->
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
			<?php 
				if(isset($login_customer)){
					echo $login_customer;
				}
			?>
        	<form action="" method="POST">
                	<input  type="text" name="email_login" class="field" placeholder="Enter name">
                    <input  type="password" name="password_login" class="field"  placeholder="Enter password">
					<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input type="submit" name="submit_login" class="grey back01" value="Login"/></div></div>
            </form>
                
        </div>
		<!-- đăng kí người dùng  -->
	
    	<div class="register_account">
    		<h3>Register New Account</h3>
			<?php 
				if(isset($insertcustomer)){
					echo $insertcustomer;
				}
			?>
    		<form action="" method="POST"> 
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name_register" placeholder="Enter name " >
							</div>
							
							<div>
							   <input type="text" name="city_register" placeholder="Enter city">
							</div>
							
							<div>
								<input type="text" name="zipCode_register" placeholder="zip-code" >
							</div>
							<div>
								<input type="text" name="email_register" placeholder="Enter email" >
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address_register"  placeholder="Enter address">
						</div>
		    		<div>
						<select id="country" name="country_register" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="hcm">TP.HCM</option>
							<option value="na">Nghệ An</option>
							<option value="dn">Đồng Nai</option>
							<option value="hn">Hà Nội</option>
							<option value="kh">Khánh Hòa </option>

							
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone_register"  placeholder="Enter Phone">
		          </div>
				  
				  <div>
					<input type="text" name="password_register" placeholder="Enter password" >
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey back01" value="Create Account"/></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'include/footer.php';	
?>