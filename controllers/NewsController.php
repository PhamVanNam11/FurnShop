<?php 
    // include file model vào đây
    include "models/NewsModel.php";
    class NewsController extends Controller{
        // kế thừa class NewsModel
        use NewsModel;
        public function index(){
            // quy định số bản ghi trên 1 trang
            $recordPerPage = 20;
            // tính số trang
            // hàm ceil(so) sẽ lấy gtri làm tròn trên của số đó. VD: ceil(3.1) =4
            $numPage = ceil($this->modelTotalRecord()/$recordPerPage);
            // lấy dữ liệu từ model
            $data = $this->modelRead($recordPerPage);
            // gọi view, truyền dữ liệu ra view
            $this->loadView("NewsView.php",["data"=>$data,"numPage"=>$numPage]);
        }
        public function detail(){
			$id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
			// lấy 1 bản ghi
			$record = $this->modelGetRecord();
			// gọi view, truyền dữ liệu ra view
			$this->loadView("NewsDetailView.php",["record"=>$record]);
		}
    }
?>