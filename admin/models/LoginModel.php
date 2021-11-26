<?php
    trait LoginModel{
        public function modelLogin(){
            $email = $_POST["email"];
            $password = $_POST["password"];
            // mã hóa password -> mã hóa chuỗi thành đoạn mã 128 bit
            $password = md5($password);
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // chuẩn bị truy vấn
            $query = $db->prepare("select email from users where email=:var_email and password=:var_password");
            // thực thi truy vấn
            $query->execute(["var_email"=>$email,"var_password"=>$password]);
            if($query->rowCount() > 0){
                // đăng nhập thành công
                $_SESSION['email'] = $email;
                header("location:index.php");
            }else{
                header("location:index.php?controller=login");
            }
        }
    }
?>