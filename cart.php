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
<?php 
	if(isset($_GET['cartId'])){
        $cartid = $_GET['cartId'];
		$delete_cart = $ct->delete_cart($cartid);
    }
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
		$cartID = $_POST['cartId'];
		$quantity = $_POST['quantity'];
		$update_quantity = $ct->Update_Quantity_cart($quantity, $cartID);
		if($quantity <= 0){
			$delete_cart = $ct->delete_cart($cartid);
		}
	}
?>
<!-- dùng để cập nhật lại dữ liệu đã được update từ trước -->
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv = 'refresh' content = '0;URL = ?id=live '> ";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
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
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$get_product_cart = $ct->get_Product_Cart();
								$subtotal = 0;
								$qty = 0;
								if($get_product_cart){
									// chạy vòng lặp để lấy ra tất cả các sản phẩm đã được thêm vào giở hàng
									while($result_cart = $get_product_cart->fetch_assoc()){
								
							?>
							<tr>
								<td> <?php echo $result_cart['productName']; ?></td>
								<td><img src="admin/uploads/<?php echo $result_cart['image'] ?>" alt=""/></td>
								<td>Giá : <?php echo $fm->format_currency($result_cart['price']); ?></td>
								<td>
									<form action="" method="post">
									<input type="hidden" name="cartId"  value="<?php echo $result_cart['cartId']; ?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result_cart['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php 
										$total = $result_cart['price'] * $result_cart['quantity'];
										echo $fm->format_currency($total);
									?> VNĐ
								</td>
								<td><a onclick="return confirm('Bạn Có Muốn Xóa Sản Phẩm  Này Khỏi Giỏ Hàng Không? ')" href="?cartId=<?php echo $result_cart['cartId'];  ?> ">Xóa </a></td>
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
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
								<?php 
									
									echo $fm->format_currency($subtotal);
									session::set('sum', $subtotal);
									session::set('qty', $qty);
										
								?> VNĐ
								</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td> 10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
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
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php 
	include 'include/footer.php';	
?>


