<?php 
    // include file model vào đây
    include "models/ProductsModel.php";
    class ProductsController extends Controller{
        // kế thừa class ProductsModel
        use ProductsModel;
        public function index(){
            // quy định số bản ghi trên 1 trang
            $recordPerPage = 20;
            // tính số trang
            // hàm ceil(so) sẽ lấy gtri làm tròn trên của số đó. VD: ceil(3.1) =4
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            // lấy dữ liệu từ model
            $data = $this->modelRead($recordPerPage);
            // gọi view, truyền dữ liệu ra view
            $this->loadView("ProductsView.php",["data"=>$data,"numPage"=>$numPage]);
        }

        public function update(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            // lấy 1 bản ghi
            $record = $this->modelGetRecord();
            // tạo biến $action để biết đc khi ấn nút submit thì trang sẽ submit đến đâu
            $action = "index.php?controller=products&action=updatePost&id=$id";
            // gọi view, truyền dữ liệu ra view
            $this->loadView("ProductsFormView.php",["record"=>$record,"action"=>$action]);
        }

        public function updatePost(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            // gọi hàm modelUpdate để update bản ghi
            $this->modelUpdate();
            // quay trở lại trang products
            header("location:index.php?controller=products");
        }

        public function create(){
			//tao bien $action de biet duoc khi an nut submit thi trang se submit den dau
			$action = "index.php?controller=products&action=createPost";
			//goi view, truyen du lieu ra view
			$this->loadView("ProductsFormView.php",["action"=>$action]);
		}

        public function createPost(){
			//goi ham modelCreate de update ban ghi
			$this->modelCreate();
			//quay tro lai trang products
			header("location:index.php?controller=products");
		}

        public function delete(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			//goi ham modelDelete
			$this->modelDelete();
			//quay tro lai trang products
			header("location:index.php?controller=products");
		}
    }
?>