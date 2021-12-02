<?php 
$filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    
?>
<?php 

    // tạo class admin
    class  cart{
        private $db;
        private $fm;

        public function __construct()
        {
            // khai báo mới  2 class từ 2 file ddã được nhúng vào
            $this->db = new Database(); 
            $this->fm = new Format();
        }
        public function AddToCart($quantity, $id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $id = mysqli_real_escape_string($this->db->link,$id);
            $seId = session_id();
            $query ="SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select($query)->fetch_assoc();
        
            $image = $result['image'];
            $price = $result['price'];
            $productName = $result['productName'];

            $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId = '$seId'";
            $result_check = $this->db->select($check_cart);
            if($result_check){
                $cart = "Sản Phẩm Đã Tồn Tại Trong Giỏ Hàng!";
                return $cart;
            }else{
                
                $query_Insert = "INSERT INTO tbl_cart (productId , sId , productName , price , quantity , image)
                VALUES ('$id' , '$seId' , '$productName', '$price' , '$quantity' , '$image')";
                $insert_cart = $this->db->insert($query_Insert);
                if($result){
                    header ('Location: cart.php ');
                }else{
                    header('Location: 404.php');
                }

            }

        }
        public function get_Product_Cart(){
            $seId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$seId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function Update_Quantity_cart($quantity, $cartID){
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $cartID = mysqli_real_escape_string($this->db->link,$cartID);
            $query_quantity = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartID' ";
            $result = $this->db->update($query_quantity);
           
            if($result){
                header('Location: cart.php ');
            }else{
                $mess = " <span  class='error'>Số Lượng Sản Phẩm Không Được Cập Nhật ! </span>";
                return $mess;
            }
        }

        public function delete_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link,$cartid);
            $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid' ";
            $result = $this->db->delete($query);
            if($result){
                header('Location: cart.php ');
            }else{
                $alter = "<span class='error'> Xóa Sản Phẩm Không Thành Công</span>";
                return $alter;
            }
        }

        // kiểm tra  giỏ hàng có sản phẩm vào hay không 
        public function check_cart(){
            $seId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$seId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function check_compare($customer_Id){
            $query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_Id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function check_wishlist($customer_Id){
            $query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_Id'";
            $result = $this->db->select($query);
            return $result;
        }
        // phương thức kiểm tra sản phẩm đã được hay không
        public function check_ordered($customer_Id)
        {
            // lấy được customer_id của khách hàng
            $query = "SELECT * FROM tbl_order WHERE customer_Id = '$customer_Id'";
            $result = $this->db->select($query);
            return $result;
        }
        // xóa tất cả các sản phẩm mà người dùng đó đã mua khi nguoiwd dùng đăng xuất 
        public function dell_all_data_cart(){
            $seId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sId = '$seId'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function dell_all_data_compare($customerId){
            $query = "DELETE FROM tbl_compare WHERE customer_id = '$customerId'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function dell_all_data_wishlist($customerId){
            $query = "DELETE FROM tbl_wishlist WHERE customer_id = '$customerId'";
            $result = $this->db->delete($query);
            return $result;
        }
        //  insertorder tất car các sản phẩm mà đã thêm vào giở hàng   
        public function Insert_Order_Now($customer_Id){
            $seId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$seId'";
            $Get_product = $this->db->select($query);
            if($Get_product){
                while($result = $Get_product->fetch_assoc()){
                    $productid = $result['productId'];
                    $productname = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $image = $result['image'];
                    $customerId = $customer_Id;
                    $query_Insert = "INSERT INTO tbl_order (productId , productName ,customer_Id, quantity ,price, image)
                    VALUES ('$productid' , '$productname' , '$customerId', '$quantity' , '$price' , '$image')";
                    $insert_order = $this->db->insert($query_Insert);
                    return $insert_order;
                   
                }
               
            }
           
        }

        // hàm hiện thị chi tiết order details
        public function getAmountPrice($customer_Id)
        {
            $query = "SELECT price FROM tbl_order WHERE customer_Id= '$customer_Id'  ";
            $Get_price = $this->db->select($query);
            return $Get_price;
        }
        // phương thức hiện thị thông tin sản phẩm của khách hàng đó 
        public function get_cart_order_details($customer_Id){
            $query = "SELECT * FROM tbl_order WHERE customer_Id= '$customer_Id'";
            $Get_cart_ordered = $this->db->select($query);
            return $Get_cart_ordered;
        }
        // tạo hàm inbox trong admin backend
        public function Get_Inbox_Cart(){
            $query = "SELECT * FROM tbl_order ORDER BY date_order";
            $Get_inbox = $this->db->select($query);
            return $Get_inbox;
        }
        // phương thức xử lý đơn hàng 
        public function shifted_your_cart($id_shift,$date_shift,$price_shift){
            $id_shift = mysqli_real_escape_string($this->db->link,$id_shift);
            $date_shift = mysqli_real_escape_string($this->db->link,$date_shift);
            $price_shift = mysqli_real_escape_string($this->db->link,$price_shift);
            $query_shifted = "UPDATE tbl_order SET status = '1' 
            WHERE id = '$id_shift' AND date_order = '$date_shift' AND price = '$price_shift' ";
            $result = $this->db->update($query_shifted);
           
            if($result){
                $mess = " <span  class='success'>Order processed successfully </span>";
                return $mess;
            }else{
                $mess = " <span  class='error'>Order processed not successfully  </span>";
                return $mess;
            }
        }
        // phương thức khi khách hàng đã xác nhận là đã nhận hàng thì remove
        public function delete_your_cart($id_del , $date_del ,$price_del){
            $id_del = mysqli_real_escape_string($this->db->link,$id_del);
            $date_del = mysqli_real_escape_string($this->db->link,$date_del);
            $price_del = mysqli_real_escape_string($this->db->link,$price_del);
            $query_deleted = "DELETE   FROM tbl_order WHERE id = '$id_del' AND date_order = '$date_del' AND price = '$price_del' ";
            $result = $this->db->delete($query_deleted);
           
            if($result){
                $mess = " <span  class='success'> Remove  Order processed successfully </span>";
                return $mess;
            }else{
                $mess = " <span  class='error'> Remove Order processed not successfully  </span>";
                return $mess;
            }
        }
        // phương thức xác nhận nhận hàng của khách hàng
        public function shifted_confirm($id_confirm,$date_confirm,$price_confirm){
            $id_confirm = mysqli_real_escape_string($this->db->link,$id_confirm);
            $date_confirm = mysqli_real_escape_string($this->db->link,$date_confirm);
            $price_confirm = mysqli_real_escape_string($this->db->link,$price_confirm);
            $query_shifted = "UPDATE tbl_order SET status = '2' 
            WHERE customer_Id = '$id_confirm' AND date_order = '$date_confirm' AND price = '$price_confirm' ";
            $result = $this->db->update($query_shifted);
           return $result;
        }
    }

?>