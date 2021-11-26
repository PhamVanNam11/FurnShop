<?php 
    trait ProductsModel{
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
            $query = $db->query("select * from products order by id desc limit $from,$recordPerPage");
            // trả về nhiều bản ghi
            return $query->fetchAll();
        }

        // tính tổng các bản ghi
        public function modelTotalRecord(){
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // thực hiện truy vấn
            $query = $db->query("select * from products");
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
        public function modelCategories(){
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // thực hiện truy vấn
            $query = $db->query("select * from categories where parent_id= 0");
            // trả về nhiều bản ghi lấy đc từ câu truy vấn
            return $query->fetchAll();
        }

        // lấy 1 bản ghi category
        public function getCategory($category_id){
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // thực hiện truy vấn
            $query = $db->query("select * from categories where id = $category_id");
            // trả về tất cả các bản ghi lấy đc từ câu truy vấn
            return $query->fetch();
        }

        // lấy 1 bản ghi tương ứng với id truyền vào
        public function modelGetRecord(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // chuẩn bị truy vấn
            $query = $db->prepare("select * from products where id=:var_id");
            // thực hiện truy vấn, có truyền tham số vào câu lệnh sql
            $query->execute(["var_id"=>$id]);
            // trả về 1 bản ghi
            return $query->fetch(); 
        }
        
        public function modelUpdate(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            $name = $_POST["name"];
            $category_id = $_POST["category_id"];
            $mota = $_POST["mota"];
            $noidung = $_POST["noidung"];
            $hot = isset($_POST["hot"]) ? 1 : 0;
            $discount = $_POST["discount"];
            $price = $_POST["price"];
            // update cot name
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            // chuẩn bị truy vấn
            $query = $db->prepare("update products set name=:var_name, category_id =:var_category_id, mota=:var_mota, noidung=:var_noidung, hot=:var_hot, discount=:var_discount, price=:var_price where id=:var_id");
            // thực hiện truy vấn, có truyền tham số vào câu lệnh sql
            $query->execute(["var_id"=>$id,"var_name"=>$name,"var_category_id"=>$category_id,"var_mota"=>$mota,"var_noidung"=>$noidung,"var_hot"=>$hot,"var_discount"=>$discount,"var_price"=>$price]);
            //---
			//neu user upload anh thi thuc hien upload
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				//---
				//lay anh de xoa
				$oldPhoto = $db->query("select photo from products where id=$id");
				if($oldPhoto->rowCount() > 0){
					$record = $oldPhoto->fetch();
					//xoa anh
					if($record->photo != "" && file_exists("../assets/upload/products/".$record->photo))
						unlink("../assets/upload/products/".$record->photo);
				}
				//---
				$photo = time()."_".$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/products/$photo");
				$query = $db->prepare("update products set photo=:var_photo where id=$id");
				$query->execute(['var_photo'=>$photo]);
			}

			//---
            $photo1 = "";
                if($_FILES['photo1']['name'] != ""){
                    //---
                    //lay anh de xoa
                    $oldphoto1 = $db->query("select photo1 from products where id=$id");
                    if($oldphoto1->rowCount() > 0){
                        $record = $oldphoto1->fetch();
                        //xoa anh
                        if($record->photo1 != "" && file_exists("../assets/upload/products/".$record->photo1))
                            unlink("../assets/upload/products/".$record->photo1);
                    }
                    //---
                    $photo1 = time()."_".$_FILES['photo1']['name'];
                    move_uploaded_file($_FILES['photo1']['tmp_name'], "../assets/upload/products/$photo1");
                    $query = $db->prepare("update products set photo1=:var_photo1 where id=$id");
                    $query->execute(['var_photo1'=>$photo1]);
            }
            $photo2 = "";
                if($_FILES['photo2']['name'] != ""){
                    //---
                    //lay anh de xoa
                    $oldphoto2 = $db->query("select photo2 from products where id=$id");
                    if($oldphoto2->rowCount() > 0){
                        $record = $oldphoto2->fetch();
                        //xoa anh
                        if($record->photo2 != "" && file_exists("../assets/upload/products/".$record->photo2))
                            unlink("../assets/upload/products/".$record->photo2);
                    }
                    //---
                    $photo2 = time()."_".$_FILES['photo2']['name'];
                    move_uploaded_file($_FILES['photo2']['tmp_name'], "../assets/upload/products/$photo2");
                    $query = $db->prepare("update products set photo2=:var_photo2 where id=$id");
                    $query->execute(['var_photo2'=>$photo2]);
            }
            $photo3 = "";
                if($_FILES['photo3']['name'] != ""){
                    //---
                    //lay anh de xoa
                    $oldphoto3 = $db->query("select photo3 from products where id=$id");
                    if($oldphoto3->rowCount() > 0){
                        $record = $oldphoto3->fetch();
                        //xoa anh
                        if($record->photo3 != "" && file_exists("../assets/upload/products/".$record->photo3))
                            unlink("../assets/upload/products/".$record->photo3);
                    }
                    //---
                    $photo3 = time()."_".$_FILES['photo3']['name'];
                    move_uploaded_file($_FILES['photo3']['tmp_name'], "../assets/upload/products/$photo3");
                    $query = $db->prepare("update products set photo3=:var_photo3 where id=$id");
                    $query->execute(['var_photo3'=>$photo3]);
            }    
            $photo4 = "";
                if($_FILES['photo4']['name'] != ""){
                    //---
                    //lay anh de xoa
                    $oldphoto4 = $db->query("select photo4 from products where id=$id");
                    if($oldphoto4->rowCount() > 0){
                        $record = $oldphoto4->fetch();
                        //xoa anh
                        if($record->photo4 != "" && file_exists("../assets/upload/products/".$record->photo4))
                            unlink("../assets/upload/products/".$record->photo4);
                    }
                    //---
                    $photo4 = time()."_".$_FILES['photo4']['name'];
                    move_uploaded_file($_FILES['photo4']['tmp_name'], "../assets/upload/products/$photo4");
                    $query = $db->prepare("update products set photo4=:var_photo4 where id=$id");
                    $query->execute(['var_photo4'=>$photo4]);
                }
        }

        public function modelCreate(){
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$mota = $_POST["mota"];
			$noidung = $_POST["noidung"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$discount = $_POST["discount"];
			$price = $_POST["price"];
			//---
			//lay bien ket noi csdl
			$db = Connection::getInstance();
			//neu user upload anh thi thuc hien upload
			$photo = "";
			if($_FILES['photo']['name'] != ""){
				$photo = time()."_".$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], "../assets/upload/products/$photo");
			}
			//---			
			//chuan bi truy van
			$query = $db->prepare("insert into products set name = :var_name, category_id = :var_category_id, mota = :var_mota, noidung = :var_noidung,hot = :var_hot,discount = :var_discount,price = :var_price,photo = :var_photo");
			//thuc thi truy van, co truyen tham so vao cau lenh sql
			$query->execute(["var_name"=>$name,"var_category_id"=>$category_id,"var_mota"=>$mota,"var_noidung"=>$noidung,"var_hot"=>$hot,"var_discount"=>$discount,"var_price"=>$price,"var_photo"=>$photo]);	
			
		}

        public function modelDelete(){
            $id = isset($_GET["id"]) && $_GET["id"] > 0 ? $_GET["id"] : 0;
            // lấy biến kết nối csdl
            $db = Connection::getInstance();
            //---
            //lay anh de xoa
            $oldPhoto = $db->query("select photo from products where id=$id");
            if($oldPhoto->rowCount() > 0){
                $record = $oldPhoto->fetch();
                //xoa anh
                if($record->photo != "" && file_exists("../assets/upload/products/".$record->photo))
                    unlink("../assets/upload/products/".$record->photo);
            }
            // chuẩn bị truy vấn
            $query = $db->prepare("delete from products where id=:var_id");
            // thực hiện truy vấn, có truyền tham số vào câu lệnh sql
            $query->execute(["var_id"=>$id]);
        }

    }
?>