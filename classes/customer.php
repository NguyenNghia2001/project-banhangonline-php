<?php 
$filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    
?>
<?php 

    // tạo class admin
    class  customer{
        private $db;
        private $fm;

        public function __construct()
        {
            // khai báo mới  2 class từ 2 file ddã được nhúng vào
            $this->db = new Database(); 
            $this->fm = new Format();
        }
        
        // phương thức insert vào database cho người dùng 
        public function insert_customer($data){
            $name_register = mysqli_real_escape_string($this->db->link,$data['name_register']);
            $city_register = mysqli_real_escape_string($this->db->link,$data['city_register']);
            $zipCode_register = mysqli_real_escape_string($this->db->link,$data['zipCode_register']);
            $email_register = mysqli_real_escape_string($this->db->link,$data['email_register']);
            $address_register = mysqli_real_escape_string($this->db->link,$data['address_register']);
            $country_register = mysqli_real_escape_string($this->db->link,$data['country_register']);
            $phone_register = mysqli_real_escape_string($this->db->link,$data['phone_register']);
            $password_register = mysqli_real_escape_string($this->db->link,md5($data['password_register']));

            if($name_register == "" || $city_register == "" || $zipCode_register == "" || $email_register == "" || $address_register == "" || $country_register == ""  || $phone_register == "" || $password_register == ""){
                $alter = " <span class='error'>Thông Tin  Đăng Kí  Không Được Rỗng ! </span> ";
                return $alter;
            }
            else{
                    // check email có tồn tại trong bảng hay chưa 
                    $check_email = "SELECT * FROM tbl_customer WHERE email = '$email_register' LIMIT 1";
                    $result_check = $this->db->select($check_email);
                    if($result_check){
                        $alter = " <span class='error'> Email đã tồn tại ! </span> ";
                        return $alter;
                    }else{
                        // thực hiện thêm dữ liệu vào bảng tbl_customer
                        $query = "INSERT INTO tbl_customer (name, address, city,country,zipcode,phone,email,password) 
                        VALUES ('$name_register','$address_register','$city_register','$country_register','$zipCode_register','$phone_register','$email_register','$password_register')";
                        $result = $this->db->insert($query); // thực thi câu lệnh sql với hàm insert() đã định nghĩa trước đó
                        if($result){
                            $alter = "<span class='success'> Tạo Tài Khoản Thành Công</span>";
                            return $alter;
                        }else{
                            $alter = "<span class='error'> Tạo Tài Khoản Thất Bại</span>";
                            return $alter;
                        }
                    
                    }
            }
        }
        // phương thức đăng nhập tài khoản 
        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link,$data['email_login']);
            $password = mysqli_real_escape_string($this->db->link,md5($data['password_login']));

            if(empty($email) || empty($password) ){
                $alter = " <span class='error'> Email Và Mật Khẩu Đăng Nhập Không Được Rỗng ! </span> ";
                return $alter;
            } 
            else{
                    // check email có tồn tại trong bảng hay chưa 
                    $check_email = "SELECT * FROM tbl_customer WHERE email = '$email'  AND password='$password' LIMIT 1";
                    $result_check = $this->db->select($check_email);
                    if($result_check != false){
                        $value = $result_check->fetch_assoc();
                        session::set("customer_login" ,true);
                        session::set('customer_id' ,$value['id']);
                        session::set('customer_name' ,$value['name']);

                        header ('Location: order.php');
                    }else{
                        $alter = " <span class='error'> Email Hoặc Mật Khẩu Nhập Vào Không Đúng , Vui lòng nhập lại!! </span> ";
                        return $alter;
                    }
            }
        }
        // hàm show customer 
        public function show_customer($id){
            $query  = "SELECT * FROM tbl_customer WHERE id = '$id'  LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
        // hàm update customer 
        public function Update_Customer($data,$id)
        {
            $name_customer = mysqli_real_escape_string($this->db->link,$data['name']);
            $zipCode_customer = mysqli_real_escape_string($this->db->link,$data['zipcode']);
            $email_customer = mysqli_real_escape_string($this->db->link,$data['email']);
            $address_customer = mysqli_real_escape_string($this->db->link,$data['address']);
            $phone_customer = mysqli_real_escape_string($this->db->link,$data['phone']);

            if($name_customer == "" || $zipCode_customer == "" || $email_customer == "" || $address_customer == ""  || $phone_customer == "" ){
                $alter = " <span class='error'>Thông Tin Của Bạn  Không Được Rỗng ! </span> ";
                return $alter;
            }
            else{
                   
                $query = "UPDATE tbl_customer 
                SET name = '$name_customer', address = '$address_customer',zipcode = '$zipCode_customer',phone = '$phone_customer',email = '$email_customer' WHERE id = '$id' ";
                $result = $this->db->update($query); 
                if($result){
                    $alter = "<span class='success'> Cập Nhật Thông Tin Thành Công</span>";
                    return $alter;
                }else{
                    $alter = "<span class='error'> Cập Nhật Thông Tin Thất Bại</span>";
                    return $alter;
                }   
            }
        }
        public function CheckUserpass(){
            $check_login ="SELECT * FROM tbl_customer WHERE adminid = 1";
            $result = $this->db->select($check_login);
            return $result;
        }

    }

?>