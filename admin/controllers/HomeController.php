<?php
    class HomeController extends Controller{
        // hàm tạo là hàm mặc định gọi đầu tiên
        public function __construct(){
            // ktra đăng nhập
            $this->authentication(); 
        }

        public function index(){
            // goi view
            $this->loadView("HomeView.php");
        }
    }
?>