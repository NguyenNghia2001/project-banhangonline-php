<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'; ?>
<?php 
    if(!isset($_GET['brandID']) || $_GET['brandID'] == ''){
        echo "<script>window.location = 'brandlist.php' </script>";
    }else{
        $id = $_GET['brandID'];
    }
    $Brand = new brand(); // gọi tên lớp category
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$brandName = $_POST['brandName']; // lấy dữ liệu từ form gửi lên 
		$Updatebrand = $Brand->update_brand($brandName , $id);
	}
?>
<?php 

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa Danh Mục</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($Updatebrand)){
                    echo $Updatebrand;
                }
               ?>
               <?php 
                    $get_brand_name = $Brand->GetbrandbyID($id);
                    if($get_brand_name){
                        while($result = $get_brand_name->fetch_assoc()){

               ?>
                 <form action="" method="POST"> 
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName']; ?>" placeholder=" Sửa Thương Hiệu Sản Phẩm Vào Đây .... " class="medium" />
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