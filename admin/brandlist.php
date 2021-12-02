<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  include '../classes/brand.php'; ?>
<?php 
	$Brand = new brand();

	if(isset($_GET['DellID'])){
        $id = $_GET['DellID'];
		$deletebrand = $Brand->delete_brand($id);

    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Thương Hiệu Sản Phẩm </h2>
                <div class="block">  
				<?php 
					if(isset($deletebrand)){
						echo $deletebrand;
					}
				?>      

                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show_brand = $Brand->show_brand();
						if($show_brand){
							$stt = 0;
							while($reslut = $show_brand->fetch_assoc()){
								$stt++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $stt; ?></td>
							<td><?php echo $reslut['brandName']; ?></td>
							<td><a href="brandedit.php?brandID=<?php echo $reslut['brandId'] ?>">Edit</a> || 
							<a onclick="return confirm('Bạn Có Muốn Xóa Thương Hiệu Này Hay Không ? ')" href="?DellID=<?php echo $reslut['brandId'] ?>">Delete</a></td>
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

