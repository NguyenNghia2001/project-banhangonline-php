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
<style>
 .payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
    margin-bottom: 20px;
}
.wapper_method{
    text-align: center;
    width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #e5e5e5;
    background-color: #f2f2f2;
    border-radius: 10px;
    box-shadow: 7px 7px 7px #cccccc;

}
.wapper_method a{
    padding: 10px;
    background-color: #d80000;
    color: #ffffff;
    border-radius: 4px;
}
.wapper_method a:hover{
    padding: 11px;
    background-color: #f20000;
    color: #ffffff;
}
.previous {
    padding: 10px;
    background-color: #4c4c4c;
    color: #ffffff;
    border-radius: 4px;
}
.previous:hover {
    padding: 10px;
    background-color: #191919;
    color: #ffffff;
    border-radius: 4px;
}

</style>
 <div class="main">
    <div class="content">

    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
                <h3>Payment Method </h3>
            </div>
    		<div class="clear"></div>
            <div class="wapper_method">
                <h3 class="payment"> Choose Your MeThod Payment</h3>
                <a href="offlinerpayment.php"> Offline Payment</a>
                <a href="offlinerpayment.php"> Online Payment</a>

            </div>
            <a class="previous" href="cart.php"> << Previous</a>

    	</div>
       
        </div>
	 </div>
<?php 
	include 'include/footer.php';	
?>