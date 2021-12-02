<?php 
    // format class
    class Format{

        public function FormatDate($date){
            return date('F j , Y , g:i:a' , strtotime($date));
        }

        public function textShorten($text , $limit = 400)       
        {
            $text = $text. " ";
            // Hàm substr() sẽ trích xuất một phần của chuỗi, phần chuỗi được trích xuất sẽ tùy thuộc vào tham số truyền vào.
            $text = substr($text , 0 , $limit);
            $text = substr($text , 0 , strrpos($text , ' '));
            $text = $text . ".....";
            return $text;
        }

        // kiểm tra form trông hay không trống 
        public function validation($data)
        {
            $data = trim($data);
            // Hàm stripcslashes() sẽ loại bỏ các dấu backslashes ( \ ) có trong chuỗi. Hàm trả về chuỗi với các kí tự backslashes đã bị loại bỏ.
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // kiểm tra tên của server
        public function title()
        {
            $path = $_SERVER['SCRIPT_FILENAME']; //trả lại tên đường dẫn tuyệt đối của kịch bản hiện đang thực hiện
            // Hàm basename() sẽ lấy về phần đuôi của đường dẫn được truyền vào.
            $title = basename($path , '.php');
            if($title == 'index'){
                $title = 'home';
            }else if($title == 'contact'){
                $title = 'contact';
            }
            // Hàm ucfirst() sẽ chuyển đổi kí tự đầu tiên trong chuỗi thành in hoa nếu kí tự đó là một chữ cái.
            return $title = ucfirst($title);
        }
        public function format_currency($n = 0){
            $n = (string)$n;
            $n = strrev($n);
            $res ='';
            for($i = 0 ; $i < strlen($n) ; $i++ ){
                if($i % 3 == 0 && $i != 0){
                    $res .='.';
                }
                $res.=$n[$i];
            }
            $res = strrev($res);
            return $res;
        }
    }
?>