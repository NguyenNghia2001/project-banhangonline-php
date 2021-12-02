<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php 

    // tạo class admin
    class  brand{
        private $db;
        private $fm;

        public function __construct()
        {
            // khai báo mới  2 class từ 2 file ddã được nhúng vào
            $this->db = new Database(); 
            $this->fm = new Format();
        }
// hàm insert category
        public function insert_brand($brandName){
        // gọi hàm valication() để kiểm tra xem có ký tự gạch \ hay có kỹ tự đặc biệt hay không
            $brandName = $this->fm->validation($brandName); // gọi hàm valication
            // kết nối cơ sở dữ liệu 
            // mysqli_real_escape_string () nếu nhận thấy có ký tự đặc biệt sẽ thoát nó ra 
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            // nếu mà không nhập user hoặc pass thì trả về 1 câu thông báo 
            // ngược lại nếu nhập vào thì đối chiếu với csdl
            if(empty($brandName)){
                $alter = " <span class='error'>Thương hiệu không được bỏ trống ! </span> ";
                return $alter;
            }
            else{
                // thực hiện insert 1 danh mục sản phẩm 
                $query = "INSERT INTO tbl_brand (brandName) VALUES ('$brandName')";
                $result = $this->db->insert($query); // thực thi câu lệnh sql với hàm insert() đã định nghĩa trước đó
                if($result){
                    $alter = "<span class='success'> Thêm Thương Hiệu Thành Công Thành Công</span>";
                    return $alter;
                }else{
                    $alter = "<span class='error'> Thêm Thương Hiệu Không Thành Công </span>";
                    return $alter;
                }
            }

        }
// hàm showcategory
        public function show_brand(){
            $query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
            $result = $this->db->select($query);
            return $result;
        }
// hàm update 
        public function update_brand($brandName , $id){
            $brandName = $this->fm->validation($brandName); // gọi hàm valication
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            $id = mysqli_real_escape_string($this->db->link, $id);


            if(empty($brandName)){
                $alter = " <span class='error'>Category không được bỏ trống ! </span> ";
                return $alter;
            }
            else{
                // thực hiện insert 1 thương hiệu sản phẩm 
                $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id' ";
                $result = $this->db->update($query); // thực thi câu lệnh sql với hàm insert() đã định nghĩa trước đó
                if($result){
                    $alter = "<span class='success'> Đã Sửa Thương Hiệu Sản Phẩm Thành Công</span>";
                    return $alter;
                }else{
                    $alter = "<span class='error'> Sửa Thương Hiệu Sản Phẩm Không Thành Công</span>";
                    return $alter;
                }
            }
        }
// hàm delete 
        public function delete_brand($id){
            $query = "DELETE FROM tbl_brand WHERE brandId = '$id' ";
            $result = $this->db->delete($query);
            if($result){
                $alter = "<span class='success'> Đã Xóa Thương Hiệu Sản Phẩm Thành Công</span>";
                return $alter;
            }else{
                $alter = "<span class='error'> Xóa Thương Hiệu Sản Phẩm Không Thành Công</span>";
                return $alter;
            }
        }
// hàm lấy dữ liệu tbl_brand để sửa 
        public function GetbrandbyID($id){
            $query = "SELECT * FROM tbl_brand WHERE brandId = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>