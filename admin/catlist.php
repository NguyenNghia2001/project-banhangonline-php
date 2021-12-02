<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  include '../classes/category.php'; ?>
<?php 
	$Cat = new category();

	if(isset($_GET['DellID'])){
        $id = $_GET['DellID'];
		$deleteCat = $Cat->delete_category($id);

    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">  
				<?php 
					if(isset($deleteCat)){
						echo $deleteCat;
					}
				?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$show_cat = $Cat->show_category();
						if($show_cat){
							$stt = 0;
							while($reslut = $show_cat->fetch_assoc()){
								$stt++;
						
					?>
						<tr class="odd gradeX">
							<td><?php echo $stt; ?></td>
							<td><?php echo $reslut['catName']; ?></td>
							<td><a href="catedit.php?catID=<?php echo $reslut['catId'] ?>">Edit</a> || 
							<a onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Hay Không ? ')" 
							href="?DellID=<?php echo $reslut['catId'] ?>">Delete</a></td>
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

