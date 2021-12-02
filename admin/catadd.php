<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'; ?>
<?php 
	$Cat = new category(); // gọi tên lớp category
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catName = $_POST['catName']; // lấy dữ liệu từ form gửi lên 

		// hàm kiểm tra xem dữ liệu có trùng khớp hay không nếu trùng khớp thì cho adimin
		$insertCat = $Cat->insert_category($catName);
	}
?>
<?php 

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Mới Danh Mục</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($insertCat)){
                    echo $insertCat;
                }
               ?>
                 <form action="catadd.php" method="POST"> 
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Thêm Danh Mục Sản Phẩm Vào Đây .... " class="medium" />
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