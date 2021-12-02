<?php 
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
    
?>
<?php 

    // tạo class admin
    class  user{
        private $db;
        private $fm;

        public function __construct()
        {
            // khai báo mới  2 class từ 2 file ddã được nhúng vào
            $this->db = new Database(); 
            $this->fm = new Format();
        }
        public function CheckUserAdmin(){
            $check_login ="SELECT * FROM tbl_admin WHERE adminid = 1";
            $result = $this->db->select($check_login);
            return $result;
        }
        public function changePassword($id,$oldpass,$data){
            $oldpassword = mysqli_real_escape_string($this->db->link,md5($data['old_password']));
            $newpass = mysqli_real_escape_string($this->db->link,md5($data['new_password']));
            $repeatpass = mysqli_real_escape_string($this->db->link,md5($data['repeat_password']));

            if($oldpassword == $newpass ){
                $mess="<span class='error'> Old password cannot be the same as new password </span>";
                return $mess;
            }elseif($oldpass != $oldpassword){
                $mess="<span class='error'> Old password is not correct </span>";
                return $mess;
            }else{
                if($newpass == $repeatpass){
                    $update_pass ="UPDATE tbl_admin SET adminPass = '$repeatpass'  WHERE adminid = '$id' ";
                    $result = $this->db->update($update_pass);
                    if($result){
                        $mess="<span class='success'> Password changed successfully </span>";
                        return $mess;
                    }else{
                        $mess="<span class='error'> Password changed not successfully </span>";
                        return $mess;
                    }
                }else{
                    
                    $mess="<span class='error'> New passwords do not match </span>";
                    return $mess;
                }
            }
           
          
        }
    }

?>