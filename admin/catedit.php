<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'; ?>
<?php 
    if(!isset($_GET['catID']) || $_GET['catID'] == ''){
        echo "<script>window.location = 'catlist.php' </script>";
    }else{
        $id = $_GET['catID'];
    }
    $Cat = new category(); // gọi tên lớp category
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$catName = $_POST['catName']; // lấy dữ liệu từ form gửi lên 
		$UpdateCat = $Cat->update_category($catName , $id);
	}
?>
<?php 

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($UpdateCat)){
                    echo $UpdateCat;
                }
               ?>
               <?php 
                    $get_cat_name = $Cat->GetcatbyID($id);
                    if($get_cat_name){
                        while($result = $get_cat_name->fetch_assoc()){

               ?>
                 <form action="" method="POST"> 
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName']; ?>" placeholder=" Sửa Danh Mục Sản Phẩm Vào Đây .... " class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" class="btn btn-warning" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>