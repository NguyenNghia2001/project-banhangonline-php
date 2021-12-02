<?php 
    include '../lib/session.php';
    session::checkLogin();

   $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    
?>
<?php 

    // tạo class admin
    class  adiminlogin{
        private $db;
        private $fm;

        public function __construct()
        {
            // khai báo mới  2 class từ 2 file ddã được nhúng vào
            $this->db = new Database(); 
            $this->fm = new Format();
        }
        public function login_admin($adminUser , $adminPass){
        // gọi hàm valication() để kiểm tra xem có ký tự gạch \ hay có kỹ tự đặc biệt hay không
            $adminUser = $this->fm->validation($adminUser); // gọi hàm valication
            $adminPass = $this->fm->validation(($adminPass));
            // kết nối cơ sở dữ liệu 
            // mysqli_real_escape_string () nếu nhận thấy có ký tự đặc biệt sẽ thoát nó ra 
            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            // nếu mà không nhập user hoặc pass thì trả về 1 câu thông báo 
            // ngược lại nếu nhập vào thì đối chiếu với csdl
            if(empty($adminUser) || empty($adminPass)){
                $alter = "Username và Password không được trống ! ";
                return $alter;
            }
            else{
                // lấy ra toàn bộ dữ liệu trng bảng tbl_admin
                $query = "SELECT * FROM tbl_admin WHERE adminUser  = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
                $result = $this->db->select($query); // thực thi câu lệnh sql với hàm select() đã định nghĩa trước đó

                if($result != false){
                    $value = $result->fetch_assoc();
                    session::set('adminlogin' , true); // giá trị adminlogin = true phải bằng với giá trị login ở session
                    session::set('adminid' , $value['adminid']); // lấy các giá trị từ database
                    session::set('adminUser' , $value['adminUser']);
                    session::set('adminName' , $value['adminName']);
                    header ('Location: index.php');

                }else{
                    $alter = "Username hoặc Password không đúng . Xin mời nhập lại  ";
                    return $alter;
                }
            }

        }
       
    }
?>