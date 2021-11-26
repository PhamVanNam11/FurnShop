<?php
    // start session
    session_start();

    // load file Connection.php
    include "application/Connection.php";
    // load file Controller.php
    include "application/Controller.php";

    // ---
    // load đọng MVC đưa cào tham số controller truyền lên url
    $controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
    $action = isset($_GET["action"]) ? $_GET["action"] : "index";
    // tạo đg dẫn vật lý của file controller trong mvc. VD: cotrller/PhongBan Controller.php
    // hàm usfirst(string) sẽ viết hoa ký tự đầu tiên
    $controllerFile = "controllers/".ucfirst($controller)."Controller.php";
    // file_exists(duongdan) trả về nếu file tồn tại, ngược lại trả về false
    if(file_exists($controllerFile)){
        include $controllerFile;
        $controllerClass = ucfirst($controller)."Controller";
        // khởi tạo object của class
        $obj = new $controllerClass();
        // gọi đến action
        $obj->$action();
    }else die("File $controllerFile không tồn tại");
    // hàm else die("chuoi") xuất thông báo chuỗi lên màn hình
    // ---

?>