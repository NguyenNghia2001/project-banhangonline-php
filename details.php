<?php 
	include 'include/header.php';
	// include 'include/slider.php';
	
?>

<?php 
	 if(!isset($_GET['proid']) || $_GET['proid'] == ''){
        echo "<script>window.location = '404.php' </script>";
    }else{
        $id = $_GET['proid'];
		if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
			$quantity = $_POST['quantity'];
			$AddtoCart = $ct->AddToCart($quantity, $id);
		}
    }
	$customer_Id = session::get('customer_id');
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compare'])){
		$productid = $_POST['productid'];
		$InsertCompare  = $product->InsertCompare($productid, $customer_Id);
	}
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist'])){
		$productid = $_POST['productid'];
		$Insertwishlist  = $product->InsertWishList($productid, $customer_Id);
	}
?>
 <div class="main">
    <div class="content">

    	<div class="section group">
		<?php 
			$get_productt_detail = $product->Get_Deltail($id);
			if($get_productt_detail){
				while($result_detail = $get_productt_detail->fetch_assoc()){
		
		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">

						<img src="admin/uploads/<?php echo $result_detail['image']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2> <?php echo $result_detail['productName']; ?> </h2>
					<p><?php echo $fm->textShorten($result_detail['product_desc'],150) ; ?></p>					
					<div class="price">
						<p>Price: <span><?php echo $fm->format_currency($result_detail['price']) ; ?> VNĐ</span></p>
						<p>Category: <span><?php echo $result_detail['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result_detail['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity"  value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>		
					<?php 
						if(isset($AddtoCart)){
							echo "<span  style = 'color:red; font-size:13px; margin-top:5px; font-weight:bold;'> Sản Phẩm Đã Có Trong Giỏ Hàng </span>";
						}
					?>		
				</div>
				<div class="add-cart">
						<div class="method_button">
							<form action="" method="POST">
								<input type="hidden" name="productid" value="<?php  echo $result_detail['productId'] ?>"/>	
								<?php 
									$login_check = session::get('customer_login');
									if($login_check==false){
										echo "";
									} else{
										echo '<input type="submit" class="buysubmit" name="compare" value="Compere Product"/>';
									}
								?>

							</form>
							<form action="" method="POST">
								<input type="hidden" name="productid" value="<?php  echo $result_detail['productId'] ?>"/>	
								<?php 
									$login_check = session::get('customer_login');
									if($login_check==false){
										echo "";
									} else{
										echo '<input type="submit" class="buysubmit" name="wishlist" value="Save To Wishlist"/>';
									}
								?>
							</form>
						</div>
				</div>
				<?php 
				// in ra dòng thông báo 
				if(isset($InsertCompare)){
					echo $InsertCompare;
				}
				if(isset($Insertwishlist)){
					echo $Insertwishlist;
				}
			?>
			</div>
			
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $result_detail['product_desc'] ; ?></p>					

	    </div>
				
	</div>
		<?php
			}
		}
		?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES: </h2>
					<ul>
					<?php 
						$getall_Category =$cat->show_category_fontend();
						if($getall_Category){
							while($result_category = $getall_Category->fetch_assoc()){

						?>
				      <li><a href="productbycat.php?catId=<?php echo $result_category['catId']; ?>"><?php  echo $result_category['catName']; ?></a></li>
				     <?php
					 	}
					}
					 ?>
    				</ul>
    	
 				</div>
 		</div>
	 </div>
<?php 
	include 'include/footer.php';	
?>