<?php 
    trait CategoriesModel{
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
            $query = $db->query("select * from categories where parent_id = 0 order by id desc limit $from,$recordPerPage");
            // trả về nhiều bản ghi
            return $query->fetchAll();
        }

        // tính tổng các bản ghi
        public function modelTotalRecord(){
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // thực hiện truy vấn
            $query = $db->query("select * from categories where parent_id = 0");
            // trả về số lượng bản ghi
            return $query->rowCount();
        }

        // hiển thị các danh mục cấp con
        public function modelCategoriesSub($category_id){
            // lấy biến kết nối csdl/
            $db = Connection::getInstance();
            // thực hiện truy vấn
            $query = $db->query("select * from categories where parent_id = $category_id");
            // trả về nhiều bản ghi lấy đc từ câu truy vấn
            return $query->fetchAll();
        }

        // hiển thị các danh mục cấp 0
        public function modelCategories($category_id){
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // thực hiện truy vấn
            $query = $db->query("select * from categories where parent_id = 0 and id <> $category_id");
            // trả về nhiều bản ghi lấy đc từ câu truy vấn
            return $query->fetchAll();
        }

        // lấy 1 bản ghi tương ứng với id truyền vào
        public function modelGetRecord(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // chuẩn bị truy vấn
            $query = $db->prepare("select * from categories where id=:var_id");
            // thực hiện truy vấn, có truyền tham số vào câu lệnh sql
            $query->execute(["var_id"=>$id]);
            // trả về 1 bản ghi
            return $query->fetch(); 
        }
        
        public function modelUpdate(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            $name = $_POST["name"];
            $parent_id = $_POST["parent_id"];
            // update cot name
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // chuẩn bị truy vấn
            $query = $db->prepare("update categories set name=:var_name, parent_id =:var_parent_id where id=:var_id");
            // thực hiện truy vấn, có truyền tham số vào câu lệnh sql
            $query->execute(["var_id"=>$id,"var_name"=>$name,"var_parent_id"=>$parent_id]);
        }

        public function modelCreate(){
            $name = $_POST["name"];
            $parent_id = $_POST["parent_id"];
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // chuẩn bị truy vấn
            $query = $db->prepare("insert into categories set name=:var_name, parent_id =:var_parent_id");
            // thực hiện truy vấn, có truyền tham số vào câu lệnh sql
            $query->execute(["var_name"=>$name,"var_parent_id"=>$parent_id]);
        }

        public function modelDelete(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // chuẩn bị truy vấn
            $query = $db->prepare("delete from categories where id=:var_id or parent_id=:var_id");
            // thực hiện truy vấn, có truyền tham số vào câu lệnh sql
            $query->execute(["var_id"=>$id]);
        }

    }
?>