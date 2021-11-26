<?php 
    include "models/UsersModel.php";
    class UsersController extends Controller{
        // kế thừa class UsersModel
        use UsersModel;
        public function index(){
            // quy định số bản ghi trên 1 trang
            $recordPerPage = 5;
            // tính số trang
            // hàm ceil(so) sẽ lấy gtri làm tròn trên của số đó. VD: ceil(3.1) =4
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            // lấy dữ liệu từ model
            $data = $this->modelRead($recordPerPage);
            // gọi view, truyền dữ liệu ra view
            $this->loadView("UsersView.php",["data"=>$data,"numPage"=>$numPage]);
        }

        public function update(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            $record = $this->modelGetRecord();
            $action ="index.php?controller=users&action=updatePost&id=$id";
            $this->loadView("UsersFormView.php",["record"=>$record,"action"=>$action]);
        }

        public function updatePost(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            $this->modelUpdate();
            header("location:index.php?controller=users");
        }

        public function create(){
            $action ="index.php?controller=users&action=createPost";
            $this->loadView("UsersFormView.php",["action"=>$action]);
        }

        public function createPost(){
            $email = $_POST["email"];
            if($this->checkEmailUsers($email) == 0){
                $this->modelCreate();
                header("location:index.php?controller=users");
            }else{
                $error =["email" => "Email $email đã tồn tại!"];
                $action = "index.php?controller=users&action=createPost";
                $this->loadView("UsersFormView.php", ['action'=>$action,'error'=>$error]);
            }
        }

        public function delete(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            $this->modelDelete();
            header("location:index.php?controller=users");
        }
    }    
?>