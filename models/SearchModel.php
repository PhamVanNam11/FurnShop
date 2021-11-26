<?php 
	trait SearchModel{
		public function modelAjaxSearch(){
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//lấy biến kết nối csdl
			$conn = Connection::getInstance();
			//thực hiện truy vấn
			$query = $conn->query("select * from products where name like '%$key%'");
			//trả về tất cả kết quả
			return $query->fetchAll();
		}
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lấy biến kết nối csdl
			$db = Connection::getInstance();
			//thực hiện truy vấn
			$query = $db->query("select * from products where name like '%$key%' limit $from,$recordPerPage");
			//trả về nhiều bản ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecord(){
			//lấy biến kết nối csdl
			$db = Connection::getInstance();
			$key = isset($_GET["key"]) ? $_GET["key"] : "";
			//thực hiện truy vấn
			$query = $db->query("select * from products where name like '%$key%'");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
		public function modelReadSearchPrice($recordPerPage){
			//lay bien page truyen tu url
			$page = isset($_GET["p"]) && $_GET["p"] > 0 ? ($_GET["p"] - 1) : 0;
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lấy biến kết nối csdl
			$db = Connection::getInstance();
			//thực hiện truy vấn
			$query = $db->query("select * from products where price >= $fromPrice and price <= $toPrice limit $from,$recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
		}
		//tinh tong cac ban ghi
		public function modelTotalRecordSearchPrice(){
			//lấy biến kết nối csdl
			$db = Connection::getInstance();
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
			//thực hiện truy vấn
			$query = $db->query("select * from products where price >= $fromPrice and price <= $toPrice");
			//tra ve so luong ban ghi
			return $query->rowCount();
		}
	}
 ?>