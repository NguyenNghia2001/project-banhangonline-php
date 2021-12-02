<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<!-- hiện thị 1 sản phẩm mới nhất trong thương hiệu Dell -->
			<?php 
			$get_Last_Dell = $product->product_Dell();
				if($get_Last_Dell){
					while($result_dell = $get_Last_Dell->fetch_assoc()){
				
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $result_dell['image']; ?> " alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>DELL</h2>
						<p><?php echo $result_dell['productName']; ?> </p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_dell['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>		

			   <?php 
				}
			}  
			   ?>	

			   <!-- hiện thị sản phẩm mới nhất trong thương hiệu samsung -->
			   <?php 
			$get_Last_samsung = $product->product_SamSung();
				if($get_Last_samsung){
					while($result_samsung = $get_Last_samsung->fetch_assoc()){
				
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $result_samsung['image']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>SAMSUNG</h2>
						  <p><?php echo $result_samsung['productName']; ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $result_samsung['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<?php 
				}
			}  
			   ?>

			<div class="section group">
			<!-- hiện thị sản phẩm apple -->
			<?php 
			$get_Last_apple = $product->product_apple();
				if($get_Last_apple){
					while($result_apple = $get_Last_apple->fetch_assoc()){
				
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $result_apple['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>APPLE</h2>
						<p><?php echo $result_apple['productName']; ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_apple['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php 
				}
			}  
			   ?>	
			   	<!--hiện thị sản phẩm của Vsmart Live  -->
				   <?php 
			$get_Last_vsmart = $product->product_xiaomi();
				if($get_Last_vsmart){
					while($result_vsamrt  = $get_Last_vsmart->fetch_assoc()){
				
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $result_vsamrt['image']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Vsmart</h2>
						  <p><?php echo $result_vsamrt['productName']; ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $result_vsamrt['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php 
				}
			}  
			   ?>	
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					<?php 
						$get_slider = $product->show_slider();
						if($get_slider){
							while($reslut_slider = $get_slider->fetch_assoc()){
					?>
						<li><img src="admin/uploads/<?php echo $reslut_slider['sliderImage']; ?>" alt="<?php echo $reslut_slider['sliderName']?>"/></li>
						<?php 
							}
						}
						?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>