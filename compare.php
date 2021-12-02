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

<!-- so sánh sản phẩm  -->
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Compare Products </h2>
				
						<table class="tblone">
							<tr>
	   							<th width="10%" >ID</th>
								<th width="25%">Product Name</th>
								<th width="20%">Image</th>
								<th width="30%">Price</th>
								<th width="15%">Action</th>
							</tr>
							<?php 
								$customer_Id = session::get('customer_id');
								$get_compare = $product->get_show_compare($customer_Id);
								if($get_compare){
									$i= 0;
									while($result_compare = $get_compare->fetch_assoc()){
										$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td> <?php echo $result_compare['productName']; ?></td>
								<td><img src="admin/uploads/<?php echo $result_compare['image'] ?>" alt=""/></td>
								<td>Giá : <?php echo $fm->format_currency($result_compare['price']); ?>VNĐ</td>
								<td><a  href="details.php?proid=<?php echo $result_compare['productId'];?>"> View </a></td>
							</tr>
							<?php 
									}
								}
							?>
							
						</table>
 
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

 <?php 
	include 'include/footer.php';	
?>


