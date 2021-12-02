<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<!-- include các file cần thiết cho product  -->
<?php  include_once '../classes/brand.php';?>
<?php include_once '../classes/category.php'; ?>
<?php include_once '../classes/product.php'; ?>
<?php include_once '../helpers/format.php';?>
<?php 
	 // khai báo class 
	$fm = new Format();
	$pro = new product();
	if(isset($_GET['productID'])){
        $id = $_GET['productID'];
		$deleteproduct = $pro->delete_product($id);

    }			
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm </h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th> ID </th>
					<th> Name </th>
					<th> Price </th>
					<th> Image </th>
					<th> Category </th>
					<th> Brands </th>
					<th > Description </th>
					<th> Type </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
				<!-- thực hiện show các sản phẩm đã được đưa vào database  -->
				<!-- thực hiện chạy vòng lặp để lấy hết những sản phẩm có trong database -->
				<?php 
					$show_product = $pro->show_product();
					if($show_product){
						$i = 0;
						while($result = $show_product->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?=$i?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $fm->format_currency($result['price']); ?> VNĐ</td>
					<td> <img src="uploads/<?php  echo $result['image'] ?>" alt="" width="60" style="margin-top:5px;"> </td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $fm->textShorten($result['product_desc'],50) ?></td>
					<td>
						<?php 
							if($result['type'] == 0){
								echo 'Feathered';
							}else{
								echo 'Non-Feathered';
							}
						?>
					</td>
			
					<td><a href="productedit.php?productID=<?php echo $result['productId'] ?>">Edit</a> || <a onclick="return confirm('Bạn Có Muốn Xóa Sản Phẩm  Này Hay Không ? ')" href="?productID=<?php echo $result['productId'] ?>">Delete</a></td>
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
