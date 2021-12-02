	
<?php 
	include 'include/header.php';
	include 'include/slider.php';
	
?>
<style>
.phantrang .trang{

	padding: 10px;
	background-color: #efefef;
	color: #ed7d7d;
	border-radius: 3px;
	margin-right: 4px;
	
}
.phantrang .trang:hover{
	padding: 11px;
	background-color: #efefef;
	color: #f73b3b;
	border-radius: 3px;
	margin-right: 4px;
	color: #ff0000;
}
</style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php 
				$product_feath = $product->Getproduct_feathered();
				if($product_feath){
					while($result = $product_feath->fetch_assoc()){ 
				
		   ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['image']; ?> " alt="" width="186px" height="186px"/></a>
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50) ; ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price']) ; ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
			<?php 
			
					}
				}
			?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php 
				$product_new  = $product->Getproduct_new();
				if($product_new){
					while($result_new = $product_new->fetch_assoc()){ 
		   ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image']; ?> " alt="" width="186px" height="186px" /></a>
					 <h2><?php echo $result_new['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'],50) ; ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result_new['price']) ; ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php 
						
					}
				}
			?>
			</div>
			<!-- phân trang -->
			<div class="phantrang" style="text-align:center; margin-top: 10px;">
				<?php 
					$product_all = $product->Get_all_product();
					$product_count = mysqli_num_rows($product_all);
					$pro_button = ceil($product_count/4);
					$i = 1;
					for($i = 1; $i<= $pro_button ; $i++){
						echo ' <a  href="index.php?trang='.$i.'" class="trang" > '.$i.' </a> ';
					}
				?>
			</div>
	</div>
 </div>

 <?php 
	include 'include/footer.php';	
?>
