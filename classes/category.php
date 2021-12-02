<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    
?>
<?php 

    // tạo class admin
    class  category{
        private $db;
        private $fm;

        public function __construct()
        {
            // khai báo mới  2 class từ 2 file ddã được nhúng vào
            $this->db = new Database(); 
            $this->fm = new Format();
        }
// hàm insert category
        public function insert_category($catName){
        // gọi hàm valication() để kiểm tra xem có ký tự gạch \ hay có kỹ tự đặc biệt hay không
            $catName = $this->fm->validation($catName); // gọi hàm valication
            // kết nối cơ sở dữ liệu 
            // mysqli_real_escape_string () nếu nhận thấy có ký tự đặc biệt sẽ thoát nó ra 
            $catName = mysqli_real_escape_string($this->db->link, $catName);

            // nếu mà không nhập user hoặc pass thì trả về 1 câu thông báo 
            // ngược lại nếu nhập vào thì đối chiếu với csdl
            if(empty($catName)){
                $alter = " <span class='error'>Category không được bỏ trống ! </span> ";
                return $alter;
            }
            else{
                // thực hiện insert 1 danh mục sản phẩm 
                $query = "INSERT INTO tbl_category (catName) VALUES ('$catName')";
                $result = $this->db->insert($query); // thực thi câu lệnh sql với hàm insert() đã định nghĩa trước đó
                if($result){
                    $alter = "<span class='success'> Thêm Danh Mục Sản Phẩm Thành Công</span>";
                    return $alter;
                }else{
                    $alter = "<span class='error'> Thêm Danh Mục Sản Phẩm Không Thành Công</span>";
                    return $alter;
                }
            }

        }
// hàm showcategory
        public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
        }
// hàm update 
        public function update_category($catName , $id){
            $catName = $this->fm->validation($catName); // gọi hàm valication
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $id = mysqli_real_escape_string($this->db->link, $id);


            if(empty($catName)){
                $alter = " <span class='error'>Category không được bỏ trống ! </span> ";
                return $alter;
            }
            else{
                // thực hiện insert 1 danh mục sản phẩm 
                $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id' ";
                $result = $this->db->update($query); // thực thi câu lệnh sql với hàm insert() đã định nghĩa trước đó
                if($result){
                    $alter = "<span class='success'> Đã Sửa Danh Mục Sản Phẩm Thành Công</span>";
                    return $alter;
                }else{
                    $alter = "<span class='error'> Sửa Danh Mục Sản Phẩm Không Thành Công</span>";
                    return $alter;
                }
            }
        }
// hàm delete 
        public function delete_category($id){
            $query = "DELETE FROM tbl_category WHERE catId = '$id' ";
            $result = $this->db->delete($query);
            if($result){
                $alter = "<span class='success'> Đã Xóa Danh Mục Sản Phẩm Thành Công</span>";
                return $alter;
            }else{
                $alter = "<span class='error'> Xóa Danh Mục Sản Phẩm Không Thành Công</span>";
                return $alter;
            }
        }
// hàm lấy dữ liệu tbl_category để sửa 
        public function GetcatbyID($id){
            $query = "SELECT * FROM tbl_category WHERE catId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_category_fontend(){
            $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_by_category($id){
            $query = "SELECT * FROM tbl_product WHERE catId ='$id'  ORDER BY catId DESC LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_name_category($id){
            $query = "SELECT tbl_product.* , tbl_category.catName , tbl_category.catId FROM tbl_product , tbl_category
             WHERE tbl_product.catId = tbl_category.catId  AND tbl_product.catId = '$id' LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>