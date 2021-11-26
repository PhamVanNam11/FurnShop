<?php
    // kết nối csdl
    class Connection{
        // hàm kết nối csdl, kết quả trả về 1 biến -> kiểu biến này là biến object
        public static function getInstance(){
            $db= new PDO("mysql:host=localhost;dbname=webnoithat","root","");
            // lấy dữ liệu theo kiểu unicode
            $db->exec("set names utf8");
            // lấy kết quả trả về theo kiểu object
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            return $db;
        }
    }
?>