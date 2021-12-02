<?php ob_start(); ?>
<?php 
	include 'include/header.php';
	// include 'include/slider.php';
?>
<style>
    .box_left{
    width: 50%;
    border: 1px solid #cccc;
    float: left;
    padding: 10px;
    }
    .box_right{
        padding: 10px;
        width: 45%;
        border: 1px solid #cccccc;
        float: right;
    }
	/* style="float:right;text-align:left; border-top: 1px solid #b2b2b2;" width="40%" */
	.table_checkout{
		float: right;
		text-align: center;
		width: 60%;
		border-top: 1px solid #b2b2b2;
		margin: 5px;
	}
	.table_checkout th{
		font-weight: bold;
		font-style: italic;
		text-align: left;
		color: #999999;
		padding: 4px;
	}
	.table_checkout th .total{
		color: #ff0000;
	}
	.submit_order{
		font-size: 25px;
		padding: 15px 40px 15px 40px;
		border-radius: 5px;
		background-color: #d80000;
		color: #ffffff;
		margin:10px;
		cursor: pointer;
	}
	.submit_order:hover{
		font-size: 25px;
		padding: 16px 41px 16px 41px;
		border-radius: 5px ;
		background-color: #f20000;
		color: #ffffff;
		margin: 20px;
		cursor: pointer;

	}
</style>
<?php 
	 if(isset($_GET['orderid']) && $_GET['orderid'] == 'order'){
		 $customer_Id = session::get('customer_id');
		 $insertOder = $ct->Insert_Order_Now($customer_Id); // hàm thêm sản phẩm 
		 $dellcart = $ct->dell_all_data_cart(); // sau khi thêm được sản phẩm vào thì thực hiện xóa hết toàn bộ dự liệu trong giở hàng 
		 header('Location: success.php');

    }
?>
<form action="" method="POST">
	<div class="main">
		<div class="content">
			<div class="section group">
			<div class="heading">
					<h3>Offline Payment  </h3>
				</div>
				<div class="clear"></div>
				<div class="box_left">
				<div class="cartpage">
						<?php 
							if(isset($update_quantity)){
								echo $update_quantity;
							}
						?>
						<?php 
							if(isset($delete_cart)){
								echo $delete_cart;
							}
						?>
							<table class="tblone">
								<tr>
									<th width="3%">No</th>
									<th width="25%">Name</th>
									<th width="15%">Price</th>
									<th width="5%">Quantity</th>
									<th width="35%"> Total </th>
								</tr>
								<?php 
									$get_product_cart = $ct->get_Product_Cart();
									$subtotal = 0;
									$qty = 0;
									$i = 0;
									if($get_product_cart){
										// chạy vòng lặp để lấy ra tất cả các sản phẩm đã được thêm vào giở hàng
										while($result_cart = $get_product_cart->fetch_assoc()){
									
								?>
								<tr>
									<td> <?php  echo $i++?></td>
									<td> <?php echo $result_cart['productName']; ?></td>
									<td> <?php echo $fm->format_currency($result_cart['price']); ?></td>
									<td>
									<?php echo $result_cart['quantity']; ?>
									</td>
									<td>
										<?php 
											$total = $result_cart['price'] * $result_cart['quantity'];
											echo $fm->format_currency($total).' VNĐ';
										?> 
									</td>
								</tr>
								<?php 
								$subtotal += $total;
								$qty = $qty + $result_cart['quantity'];
										}
									}
								?>
								
							</table>
							<?php 
								$check_cart = $ct->check_cart();
								if($check_cart){

							?>
							<table class="table_checkout" >
								<tr style="margin-top: 10px;">
									<th> <b><i>Sub Total :</i></b>  </th>
									<td>
									<?php 
										
										echo $fm->format_currency($subtotal);
										session::set('sum', $subtotal); // session tính tổng 
										session::set('qty', $qty);
											
									?> VNĐ
									</td>
								</tr>
								<tr>
									<th><b><i>VAT :</i></b> </th>
									<td> 10% (<?php echo $vat = $subtotal * 0.1;?> đ ) </td>
								</tr>
								<tr>
									<th><b><i class="total">Grand Total :</i></b></th>
									<td>
										<?php 
										// tính phí thuế cho toàn bộ mặt hàng đó 
											$vat = $subtotal * 0.1;
											$gtotal = $subtotal + $vat;
											echo $fm->format_currency($gtotal). "  VNĐ";
										?>
									</td>
								</tr>
						</table>
						<?php 
								}  else{
									echo "<span class='error'> Giỏ Hàng Của Bạn Trống , Làm Ơn Đi Mua Hàng Nhé !! </span>";
								}
						?>
						</div>
				</div>
				<div class="box_right">
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
								<td colspan="5"><a href="editprofile.php"> Update Profile</a></td>
							</tr>
							<?php 
							
								}
							}
							?>
					</table>

				</div>
			</div>
			<center style="margin-top: 50px;"><a href="?orderid=order" class="submit_order" >Order Now</a></center> 
		</div>
 </div>
</form>
<?php 
	include 'include/footer.php';	
?>