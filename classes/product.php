<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath .'/../lib/database.php');
    include_once ($filepath .'/../helpers/format.php');
    
?>
<?php 

    // tạo class admin
    class  product{
        private $db;
        private $fm;

        public function __construct()
        {
            // khai báo mới  2 class từ 2 file ddã được nhúng vào
            $this->db = new Database(); 
            $this->fm = new Format();
        }
        // hàm tìm kiếm các sản phẩm
        public function search_product($tukhoa){
            $tukhoa = $this->fm->validation($tukhoa); // kiểm tra xem có dữ liệu trong form hay chưa
            $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result; 
        }
// hàm insert category
        public function insert_product($data, $files){
            // mysqli_real_escape_string () nếu nhận thấy có ký tự đặc biệt sẽ thoát nó ra 
            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $productdesc = mysqli_real_escape_string($this->db->link,$data['productdesc']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);

            // lkiểm tra hình ảnh và lấy hình ảnh update 
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $uique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$uique_image;

          
            // nếu mà không nhập user hoặc pass thì trả về 1 câu thông báo 
            // ngược lại nếu nhập vào thì đối chiếu với csdl
            if($productName == "" || $category == "" || $brand == "" || $productdesc == "" || $price == "" || $type == ""  || $file_name == "" ){
                $alter = " <span class='error'>Các Trường Không Được Rỗng ! </span> ";
                return $alter;
            }
            else{
                move_uploaded_file($file_temp, $uploaded_image);
                // thực hiện insert 1 danh mục sản phẩm 
                $query = "INSERT INTO tbl_product (productName, catId, brandId,product_desc,type,price,image) 
                VALUES ('$productName','$category','$brand','$productdesc','$type','$price','$uique_image')";
                $result = $this->db->insert($query); // thực thi câu lệnh sql với hàm insert() đã định nghĩa trước đó
                if($result){
                    $alter = "<span class='success'> Thêm Sản Phẩm Thành Công</span>";
                    return $alter;
                }else{
                    $alter = "<span class='error'> Thêm Sản Phẩm Không Thành Công</span>";
                    return $alter;
                }
            
             
            }

        }
// // hàm showcategory
        public function show_product(){

            $query = "SELECT productId , productName , product_desc ,type ,price , image , tbl_category.catName , tbl_brand.brandName
             FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
                              INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 
              ORDER BY tbl_product.productId DESC";
            $result = $this->db->select($query);
            return $result;
        }
// // hàm update 
        public function update_product($data,$files, $id){

            $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
            $category = mysqli_real_escape_string($this->db->link,$data['category']);
            $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
            $productdesc = mysqli_real_escape_string($this->db->link,$data['productdesc']);
            $price = mysqli_real_escape_string($this->db->link,$data['price']);
            $type = mysqli_real_escape_string($this->db->link,$data['type']);

            // lkiểm tra hình ảnh và lấy hình ảnh update 
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $uique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$uique_image;

          

            if($productName == "" || $category == "" || $brand == "" || $productdesc == "" || $price == "" || $type == ""  ){
                $alter = " <span class='error'>Các Trường Không Được Rỗng ! </span> ";
                return $alter;
            }
            else{
                if(!empty($file_name)){
                    // nếu người dùng chọn ảnh 
                    if($file_size > 204800){
                        $alter = "<span  class='success'> Hình Ảnh Của Bạn Nên <= 2MB </span>";
                        return $alter;
                    }
                    elseif(in_array($file_ext, $permited)== false){
                        $alter = "<span class='success'> Bạn Chỉ có thể Upload : ".implode(',' , $permited). "</span>";
                        return $alter;
                    }

                    $query = "UPDATE tbl_product SET 
                    productName = '$productName' ,
                    brandId = '$brand' ,
                    catId = '$category' ,
                    type = '$type' ,
                    price = '$price' ,
                    image = '$uique_image' ,
                    product_desc = '$productdesc' 
                    
                     WHERE productId = '$id' ";

                }else{
                    // nếu người dùng không chọn ảnh 
                    $query = "UPDATE tbl_product SET 
                     productName = '$productName' ,
                    brandId = '$brand' ,
                    catId = '$category' ,
                    type = '$type' ,
                    price = '$price' ,
                    product_desc = '$productdesc' 
                    
                     WHERE productId = '$id' ";


                }

                
            }

                $result = $this->db->update($query); 
                if($result){
                    $alter = "<span class='success'> Đã Sửa  Sản Phẩm Thành Công</span>";
                    return $alter;
                }else{
                    $alter = "<span class='error'> Sửa  Sản Phẩm Không Thành Công</span>";
                    return $alter;
                
            }
        }
// // hàm delete 
        public function delete_product($id){
            $query = "DELETE FROM tbl_product WHERE productId = '$id' ";
            $result = $this->db->delete($query);
            if($result){
                $alter = "<span class='success'> Đã Xóa Danh Mục Sản Phẩm Thành Công</span>";
                return $alter;
            }else{
                $alter = "<span class='error'> Xóa Danh Mục Sản Phẩm Không Thành Công</span>";
                return $alter;
            }
        }
        // xóa 1 sản phẩm trong danh sách yêu thích
        public function delete_product_wishlist($proid , $customer_Id){
            $query = "DELETE FROM tbl_wishlist WHERE productId = '$proid' AND customer_id = '$customer_Id' ";
            $result = $this->db->delete($query);
            if($result){
                $alter = "<span class='success'> Đã Xóa Sản Phẩm Trong Danh Sách Yêu Thích Thành Công</span>";
                return $alter;
            }else{
                $alter = "<span class='error'> Xóa  Sản Phẩm Trong Danh Sách Yêu Thích Không Thành Công</span>";
                return $alter;
            }
        }
// hàm lấy dữ liệu tbl_category để sửa 
        public function GetProductbyID($id){
            $query = "SELECT * FROM tbl_product WHERE productId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
         /// ****** Kết Thúc Phần BackEnd ******

        // Bắt Đầu phần FontEnd
        public function Getproduct_feathered(){
            $query = "SELECT * FROM tbl_product WHERE type = '0' LIMIT 4 ";
                $result = $this->db->select($query);
                return $result;
        }
        public function Getproduct_new(){
            $sp_tungtrang = 4;
            if(!isset($_GET['trang'])){
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
            $tung_trang = ($trang - 1) * $sp_tungtrang;
            $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT $tung_trang , $sp_tungtrang";
                $result = $this->db->select($query);
                return $result;
        }
        // thực hiện phân trang bằng cách lấy tất cả các sản phẩm có trong database
        public function Get_all_product(){
            $query = "SELECT * FROM tbl_product ";
            $result = $this->db->select($query);
            return $result;
        }
        // 
        public function Get_Deltail($id){
            $query = "SELECT tbl_product.* , tbl_category.catName , tbl_brand.brandName
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
                             INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 
             WHERE tbl_product.productId = '$id'";
           $result = $this->db->select($query);
           return $result;
        }

        public function product_Dell(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '1' order by productId desc LIMIT 1 ";
                $result = $this->db->select($query);
                return $result;
        }
        public function product_SamSung (){
            $query = "SELECT * FROM tbl_product WHERE brandId = '10' order by productId  LIMIT 1 ";
                $result = $this->db->select($query);
                return $result;
        }
        public function product_apple(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '3' order by productId desc LIMIT 1 ";
                $result = $this->db->select($query);
                return $result;
        }
        public function product_xiaomi(){
            $query = "SELECT * FROM tbl_product WHERE brandId = '7' order by productId desc  LIMIT 1 ";
                $result = $this->db->select($query);
                return $result;
        }

        // insert compare vào danh sách so sách 
        public function InsertCompare($productid, $customer_Id){
            $productid = mysqli_real_escape_string($this->db->link,$productid);
            $customer_Id = mysqli_real_escape_string($this->db->link,$customer_Id);
            
          $query ="SELECT * FROM tbl_product WHERE productId = '$productid'";
            $result = $this->db->select($query)->fetch_assoc();
        
            $image = $result['image'];
            $price = $result['price'];
            $productName = $result['productName'];

            $check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id = '$customer_Id'";
            $result_check = $this->db->select($check_compare);
            if($result_check){
                $cart = " <span class='error'>  Order already exists in comparison list </span>";
                return $cart;
            }else{
                $query_Insert = "INSERT INTO tbl_compare (customer_id , productId , productName , price , image)
                VALUES ('$customer_Id' , '$productid' , '$productName', '$price' , '$image')";
                $insert_compare = $this->db->insert($query_Insert);
                if($insert_compare){
                    $messgess = "<span class='success'>Added Compare Successfully </span>";
                    return $messgess;
                    
                }else{
                    $messgess = "<span class='error'> Added Compare Not Successfully </span>";
                    return $messgess;       
                    }

            }
        }
        // insert order in tbl_wishlist
        public function InsertWishList($productid, $customer_Id){
            $productid = mysqli_real_escape_string($this->db->link,$productid);
            $customer_Id = mysqli_real_escape_string($this->db->link,$customer_Id);
            // show ra được những sản phẩm đã có 
            $query ="SELECT * FROM tbl_product WHERE productId = '$productid'";
            $result = $this->db->select($query)->fetch_assoc();
        
            $image = $result['image'];
            $price = $result['price'];
            $productName = $result['productName'];
            // check xem trong tbl_wishlist đã tồn tại productid chưa 
            $check_wishlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id = '$customer_Id'";
            $result_check = $this->db->select($check_wishlist);
            if($result_check){
                $cart = " <span class='error'>  Order already exists in wishlist </span>";
                return $cart;
            }else{
                $query_Insert = "INSERT INTO tbl_wishlist (customer_id , productId , productName , price , image)
                VALUES ('$customer_Id' , '$productid' , '$productName', '$price' , '$image')";
                $insert_wishist = $this->db->insert($query_Insert);
                if($insert_wishist){
                    $messgess = "<span class='success'>Added Wishlist Successfully </span>";
                    return $messgess;
                    
                }else{
                    $messgess = "<span class='error'> Added Wishlist  Not Successfully </span>";
                    return $messgess;       
                    }

            }
        }
        // show ra tất cả các sản phẩm đã thêm vào dánh so sánh 
        public function get_show_compare($customer_Id){
            $query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_Id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_show_wishlist($customer_Id){
            $query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_Id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }
        // ***** slider ********
        public function insert_Slider($data , $file){
            $sliderName = mysqli_real_escape_string($this->db->link,$data['slidername']);
            $slidertype = mysqli_real_escape_string($this->db->link,$data['slidertype']);
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['sliderimage']['name'];
            $file_size = $_FILES['sliderimage']['size'];
            $file_temp = $_FILES['sliderimage']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $uique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = 'uploads/'.$uique_image;

          

            if($sliderName == "" || $slidertype == "" ){
                $alter = " <span class='error'>Các Trường Không Được Rỗng ! </span> ";
                return $alter;
            }
            else{
                if(!empty($file_name)){
                    if($file_size > 204800){
                        $alter = "<span  class='success'> Hình Ảnh Của Bạn Nên <= 2MB </span>";
                        return $alter;
                    }
                    elseif(in_array($file_ext, $permited)== false){
                        $alter = "<span class='success'> Bạn Chỉ có thể Upload : ".implode(',' , $permited). "</span>";
                        return $alter;
                    }
                    // move_uploaded_file($file_temp, $uploaded_image);
                    $query = "INSERT INTO tbl_silder (sliderName, sliderimage , slidertype) 
                    VALUES ('$sliderName','$uique_image', '$slidertype')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alter = "<span class='success'> Thêm Slider Thành Công</span>";
                        return $alter;
                    }else{
                        $alter = "<span class='error'> Thêm Slider Không Thành Công</span>";
                        return $alter;
                    }
                }
                
            }   
            
        }
        public function show_slider(){
            $query_slider = "SELECT * FROM tbl_silder WHERE slidertype = 1 ORDER BY sliderId DESC";
            $result = $this->db->select($query_slider);
            return $result;
        }
        public function show_slider_list(){
            $query_slider = "SELECT * FROM tbl_silder ORDER BY sliderId DESC";
            $result = $this->db->select($query_slider);
            return $result;
        }
        public function Update_Slider_Type($idslider,$type){
            $type = mysqli_real_escape_string($this->db->link,$type);
            $query_slider = "UPDATE tbl_silder SET slidertype = '$type' WHERE sliderId = '$idslider'";
            $result = $this->db->update($query_slider);
            return $result;

        }

    }


   
?>