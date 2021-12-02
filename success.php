<?php 
	include 'include/header.php';
	// include 'include/slider.php';	
?>
<style>
  .success_pro{
      color: #ff0000;
      font-size: 25px;
      text-align: center;
  }
  .detailorder{
      text-align: center;
      font-size: 15px;
      color: #4c4c4c;
      padding: 10px;
  }
  .totail{
    color: #ff5656;
    font-style: italic;
    font-weight: bold;
    font-size: 17px;
  }
</style>
<form action="" method="POST">
	<div class="main">
		<div class="content">
			<div class="section group">
		
                <div class="success_pro">  You have placed your order successfully </div>
                <?php
                $customer_Id = session::get('customer_id');
                    $get_amount = $ct->getAmountPrice($customer_Id);
                    if($get_amount){
                        $amount = 0;
                        while($result_price = $get_amount->fetch_assoc()){
                            $price = $result_price['price'];
                            $amount += $price;
                        }
                    }
                ?>
                <div class="detailorder">
                    <p>The total price of the item you have purchased on our website is: 
                        <i class="totail"><?php
                            $vat = $amount * 0.1;
                            $totail = $vat + $amount;
                            echo $fm->format_currency($totail,0) ;
                        ?> VNĐ </i> </p>
                    <p>We will process it for you as soon as possible. Please review your order details
                        <a href="orderdetails.php" >Click Here</a> </p>

                </div>

			</div>

		</div>
 </div>
</form>
<?php 
	include 'include/footer.php';	
?>