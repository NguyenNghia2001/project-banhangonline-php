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
	if(isset($_GET['prowishid'])){
		$customer_Id = session::get('customer_id');
		$proid = $_GET['prowishid'];
		$delete_product_wishlist = $product->delete_product_wishlist($proid , $customer_Id);
	}
?>
<!-- so sánh sản phẩm  -->
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Order Wishlist Products </h2>
						<?php 
							if(isset($delete_product_wishlist)){
								echo $delete_product_wishlist;
							}
						?>
						<table class="tblone">
							<tr>
	   							<th width="10%" >ID</th>
								<th width="25%">Product Name</th>
								<th width="20%">Image</th>
								<th width="10%">Price</th>
								<th width="25%">Action</th>
							</tr>
							<?php 
								$customer_Id = session::get('customer_id');
								$get_wishlist = $product->get_show_wishlist($customer_Id);
								if($get_wishlist){
									$i= 0;
									while($result_wishlist = $get_wishlist->fetch_assoc()){
										$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td> <?php echo $result_wishlist['productName']; ?></td>
								<td><img src="admin/uploads/<?php echo $result_wishlist['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result_wishlist['price']); ?>VNĐ</td>
								<td>
									<a  href="?prowishid=<?php echo $result_wishlist['productId'];?>" onclick="return confirm('Bạn Có Muốn Xóa Sản Phẩm Yêu Thích Này Không ?')"> Remove </a> ||
									<a  href="details.php?proid=<?php echo $result_wishlist['productId'];?>"> Go Buy Now </a>

								</td>
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


