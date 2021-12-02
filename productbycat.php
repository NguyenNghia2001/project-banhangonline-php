<?php 
	include 'include/header.php';
	// include 'include/slider.php';
	
?>
<!-- hiện thị sản phẩm theo từng danh mục  -->
<?php 
    if(!isset($_GET['catId']) || $_GET['catId'] == ''){
        echo "<script>window.location = '404.php' </script>";
    }else{
        $id = $_GET['catId'];
    }
    // if($_SERVER['REQUEST_METHOD'] === 'POST'){
	// 	$catName = $_POST['catName']; // lấy dữ liệu từ form gửi lên 
	// 	$UpdateCat = $Cat->update_category($catName , $id);
	// }
?>
 <div class="main">
    <div class="content">
	<!-- hiện thị tên category đang được chọn  -->
	<?php 
		 	$cat_name = $cat->get_name_category($id);
			 if($cat_name){
				 while($result_cat_name = $cat_name->fetch_assoc()){	 
			 
		  ?>
    	<div class="content_top">
    		<div class="heading">
    			<h3>CATEGORY: <?php echo $result_cat_name['catName']; ?> </h3>
    		</div>
			
    		<div class="clear"></div>
			<?php 
				 }
			} 
			?>
			<!-- Hiện thị sản phẩm có trong danh mục sản phẩm  -->
    	</div>
	      <div class="section group">
		  <!-- hiện thị chi tiết sản phẩm có trong danh mục sản phẩm đó  -->
		  <?php 
		 	$product_get_by_cat = $cat->get_product_by_category($id);
			 if($product_get_by_cat){
				 while($result_by_cat = $product_get_by_cat->fetch_assoc()){	 
			 
		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $result_by_cat['image']; ?>" alt="" /></a>
					 <h2><?php echo $result_by_cat['productName']; ?></h2>
					 <p><?php echo $fm->textShorten($result_by_cat['product_desc'], 150);  ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result_by_cat['price']) ; ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_by_cat['productId']; ?>" class="details">Details</a></span></div>
				</div>
				
				<?php 
				 }
			}else{
				echo " <span class='error'> Hiện Tại Không Có Sản Phấm Cho Danh Mục Này </span>";
			}
				?>
				
			</div>

	
	
    </div>
 </div>
 <?php 
	include 'include/footer.php';	
?>