<?php
    class Controller{
        public $fileName = NULL;
        public $fileLayout = NULL;
        public $view = NULL;
        public function loadView($fileName,$data = NULL){
            if($data != NULL)
                extract($data);
            // kiểm tra xem đường dẫn file có tồn tại ko
            if(file_exists("views/$fileName")){
                $this->fileName = $fileName;
                // đọc nội dung bên trong đường dẫn $fileName để gán vào 1 biến
                ob_start();
                    include "views/$fileName";
                    $this->view = ob_get_contents();
                ob_get_clean();
                // kiểm tra nếu biến $this->fileLayout ko NULL thì include nó
                if($this->fileLayout != NULL)
                    include "views/$this->fileLayout";
                else
                    echo $this->view;
            } 
        }

        // hàm ktra đăng nhập sử dụng cho trang admin
        public function authentication(){
            if(isset($_SESSION['email']) == false)
                header("location:index.php?controller=login");
        }
    }
?>