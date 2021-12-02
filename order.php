
<?php 
	include 'include/header.php';
	// include 'include/slider.php';
?>
<?php 
	$login_check = session::get('customer_login');
	if($login_check == false){
		header ('Location: login.php');
	}	
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    <div class="order page">  <h4 style="color:red;">Page order </h4> </div>
            </div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'include/footer.php';	
?>
