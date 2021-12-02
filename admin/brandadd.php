<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'; ?>
<?php 
	$Brand = new brand(); // gọi tên lớp brand
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$brandName = $_POST['brandName']; // lấy dữ liệu từ form gửi lên 

		// hàm kiểm tra xem dữ liệu có trùng khớp hay không nếu trùng khớp thì cho adimin
		$insertBrand = $Brand->insert_brand($brandName);
	}
?>
<?php 

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Thương Hiệu</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($insertBrand)){
                    echo $insertBrand;
                }
               ?>
                 <form action="brandadd.php" method="POST"> 
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Thêm Thương Hiệu Sản Phẩm  Vào Đây .... " class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" class="btn btn-warning" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>