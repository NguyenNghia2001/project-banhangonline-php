<?php 
	include 'include/header.php';
	// include 'include/slider.php';
	
?>

 <div class="main">
    <div class="content">
	<?php 
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tukhoa = $_POST['tukhoa']; // lấy dữ liệu từ form gửi lên 
            $search_product = $product->search_product($tukhoa);
        }
    ?>
    	<div class="content_top">
    		<div class="heading">
    			<h3>Từ Khóa Tìm Kiếm : <?php echo $tukhoa ?> </h3>
    		</div>
			
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <!-- hiện thị chi tiết sản phẩm có trong danh mục sản phẩm đó  -->
		  <?php 
			 if($search_product){
				 while($result = $search_product->fetch_assoc()){	 
			 
		  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 150);  ?></p>
					 <p><span class="price"><?php echo $fm->format_currency($result['price']) ; ?> VNĐ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
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