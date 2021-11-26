<?php 
    trait UsersModel{
        // lấy về danh sách các bản ghi
        public function modelRead($recordPerPage){
            // lấy biến page truyền từ url
            $page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
            // lấy từ bản ghi nào
            $from = $page * $recordPerPage;
            // --
            // lấy biến kết nối csdl
            $db= Connection::getInstance();
            // thực hiện truy vấn
            $query = $db->query("select * from users order by id desc limit $from,$recordPerPage");
            // trả về nhiều bản ghi
            return $query->fetchAll();
        }

        // tính tổng các bản ghi
        public function modelTotalRecord(){
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // thực hiện truy vấn
            $query = $db->query("select * from users");
            // trả về số lượng bản ghi
            return $query->rowCount();
        }

        public function modelGetRecord(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            $db = Connection::getInstance();
            $query = $db->prepare("select * from users where id=:var_id");
            $query->execute(["var_id"=>$id]);
            return $query->fetch();
        }

        public function modelUpdate(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            $name = $_POST["name"];
            $password = $_POST["password"];
            $db = Connection::getInstance();
            $query = $db->prepare("update users set name =:var_name where id=:var_id");
            $query->execute(["var_id"=>$id,"var_name"=>$name]);
            if($password != ""){
                $password = md5($password);
                $query = $db->prepare("update users set password =:var_password where id=:var_id");
                $query->execute(["var_id"=>$id,"var_password"=>$password]);
            }
        }

        public function modelCreate(){
            $name = $_POST["name"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $password = md5($password);
            $db = Connection::getInstance();
            $query = $db->prepare("insert into users set name=:var_name, email=:var_email, password =:var_password");
            $query->execute(["var_name"=>$name, "var_email"=>$email, "var_password"=>$password]);
        }

        public function modelDelete(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            $db = Connection::getInstance();
            $query = $db->prepare("delete from users where id=:var_id");
            $query->execute(["var_id"=>$id]);
        }

        public function checkEmailUsers($email){
            $db = Connection::getInstance();
            $query = $db->query("select * from users where email='$email'");
            return $query->rowCount();
        }
    }
?>