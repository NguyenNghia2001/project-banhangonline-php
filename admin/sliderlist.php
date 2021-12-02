<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  include '../classes/product.php'?>
<?php 
	$product = new product(); 
	if(isset($_GET['delslider']) && isset($_GET['type'])){
		$idslider = $_GET['delslider'];
		$type = $_GET['type'];
		$update_slider_type = $product->Update_Slider_Type($idslider,$type);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
					<?php 
						$product = new product(); 
						$get_show_slider = $product->show_slider_list();
						$i = 0;
						if($get_show_slider){
							while($result_show_slider=$get_show_slider->fetch_assoc()){
								$i++;
					?>
					<tr class="odd gradeX">
						<td><?=$i?></td>
						<td><?php echo $result_show_slider['sliderName'] ?></td>
						<td><img src="uploads/<?php echo $result_show_slider['sliderImage']; ?>" alt="<?php echo $result_show_slider['sliderName']?>" height="60px" width="100px" style="margin-top: 8px;"/></td>	
						<td>
							<?php 
								if($result_show_slider['slidertype'] == 1){
							?>
									<a href="?delslider=<?php echo $result_show_slider['sliderId'] ?>&type=0">Turned On</a>
							<?php 
								}else{
							?>
									<a href="?delslider=<?php echo $result_show_slider['sliderId'] ?>&type=1">OFF</a>

							<?php 
								}
							?>
						</td>			
						<td>
							<a href="" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
						</td>

					</tr>	
					<?php 
							}
						}
					?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
