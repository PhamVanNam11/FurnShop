<header>
        <div class="head-top container-fluid d-flex justify-content-between align-items-center">
            <div class="store-left d-flex">
                <div class="store-left__marker">
                    <i class="fas fa-map-marker-alt"></i> Hệ thống cửa hàng
                </div>
                <!-- <div class="store-left__link d-flex">    
                    <a class="nav-link border-right" href="#">Về chúng tôi</a>
                    <a class="nav-link border-right" href="#">Phương thức thanh toán</a>
                    <a class="nav-link" href="#">Trợ giúp</a>
                </div>    			 -->
            </div> 
            <div class="store-right">
                <nav class="nav d-flex">
                    <?php if(isset($_SESSION["customer_email"])): ?>
                        <a href="#" class="nav-link js-login border-right">Xin chào <?php echo $_SESSION["customer_email"]; ?></a>
                        <a href="index.php?controller=account&action=logout" class="nav-link js-register">Đăng xuất</a>
                    <?php else: ?>
                        <a href="index.php?controller=account&action=login" class="nav-link js-login border-right">Đăng nhập</a>
                        <a href="index.php?controller=account&action=register" class="nav-link js-register">Đăng ký</a>  
                        <?php endif; ?>  			
                </nav>
            </div>
        </div>

        <div class="head-bottom">
            <div class="header__logo">
                <a href="" class="header__logo-link">
                    <img class="header__logo-img" src="assets/fontend/images/logo.png">
                </a>
            </div>
            <div class="header__search">
                <form id="form_search">
                    <div class="input-group">
                            <input type="text" autocomplete="off" class="form-control" placeholder="Tìm kiếm ..."
                            id="key" aria-describedat="basic-addon2">
                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul class="header__search-history-list" style="overflow:auto">
                                    <li class="header__search-history-item" style="">
                                        <img src="http://localhost/webNT1-master/assets/upload/products/1635778590_pro1.jpg" >
                                        <a style="margin-left:10px" href="#">Marco Reus</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <img src="http://localhost/webNT1-master/assets/upload/products/1635778590_pro1.jpg" alt="">
                                        <a style="margin-left:10px" href="#">Marco Reus</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <img src="http://localhost/webNT1-master/assets/upload/products/1635778590_pro1.jpg" alt="">
                                        <a style="margin-left:10px" href="#">Marco Reus</a>
                                    </li>
                                </ul>
                            </div>
                        <div class="input-group-append">
                            <a type="submit" class="input-group-text" id="basic-addon2">Tìm kiếm</a>
                        </div>
                    </div>
                    <style type="text/css">
                        .header__search-history{position: absolute; width: 555px; background: white; height: 250px; overflow:auto; z-index: 100; display: none; }
                        .header__search-history ul{padding: 0px; margin: 0px; list-style: none;}
                        .header__search-history img{width: 70px; margin: 10px;}
                        .header__search-history ul a{text-decoration:none;font-size:14px;color:#192a56;}
                    </style>
                    
                    <script type="text/javascript">
                        //tinh nang nay phai dung ket hop voi jquery -> phai load thu vien jquery
                        $(document).ready(function(){
                            //bat su kien click cua id=basic-addon2
                            $("#basic-addon2").click(function(){
                            var key = $("#key").val();
                            //di chuyen den url tim kiem
                            location.href="index.php?controller=search&action=name&key="+key;
                            });
                            //---
                            $(".form-control").keyup(function(){
                            var strKey = $("#key").val();
                            if(strKey.trim() == "")
                                $(".header__search-history").attr("style","display:none");
                            else{
                                $(".header__search-history").attr("style","display:block");
                                //---
                                //su dung ajax de lay du lieu
                                $.get("index.php?controller=search&action=ajaxSearch&key="+strKey,function(data){
                                //clear cac the li ben trong the ul
                                $(".header__search-history .header__search-history-list").empty();
                                //them du lieu vua lay duoc bang ajax vao the ul
                                $(".header__search-history .header__search-history-list").append(data);
                                });
                                //---
                            }
                            });
                            //---
                        });
                    </script>
                </form>
            </div>

            <div class="contact col-3 d-none d-lg-block">
                <div class="contact_top position-relative">
                    <div class="phone_number">0984253398</div>
                    <p class="time w-100 text-center mb-0">(7h30 - 12h45 & 13h30 - 21h00)</p>
                    <span class="icon-phone"><i class="fas fa-phone-alt"></i></span>
                </div>
            </div>
            
            <div class="header__cart">
                    <?php 
                        $ProductNumberCart = 0;
                        if(isset($_SESSION['cart']))
                            foreach($_SESSION['cart'] as $product)
                            $ProductNumberCart++;
                    ?>
                <div class="header__cart-wrap">
                    <i class="header__cart-icon fas fa-shopping-cart"></i>
                    <span class="header__cart-notice"><?php echo $ProductNumberCart; ?></span>

                    <!--cart -->
                    <div class="header__cart-list header__cart-list--no-cart">
                        <h4 class="header__cart-heading">
                            Sản phẩm đã thêm
                        </h4>
                        <ul class="header__cart-list-item">
                        <?php if(isset($_SESSION['cart'])): ?>
                            <?php foreach($_SESSION['cart'] as $product): ?>
                            <li class="header__cart-item">
                                <img src="assets/upload/products/<?php echo $product["photo"]; ?>" alt="" class="header__cart-img">
                                <div class="header__cart-item-info">
                                    <div class="header__cart-item-head">
                                        <h5 class="header__cart-item-name"><a style="color:#192a56;text-decoration:none;" href="index.php?controller=products&action=detail&id=<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></h5>
                                        <div class="header__cart-item-price-wrap">
                                            <span class="header__cart-item-price">
                                                <?php echo number_format(($product["price"]-($product["price"]*$product["discount"])/100)*$product["number"]); ?>
                                            </span>
                                            <span class="header__cart-item-multiply">x</span>
                                            <span class="header__cart-item-qnt"><?php echo $product["number"]; ?></span>
                                        </div>
                                    </div>
                                    <div class="header__cart-item-body">
                                        <span class="header__cart-item-description">Phân loại: Bạc</span>
                                        <span class="header__cart-item-remove"><a style="color:#192a56;text-decoration:none;" href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>">Xóa</a></span>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </ul>
                        <?php if($_SESSION['cart'] != NULL): ?>
                            <a href="index.php?controller=cart&action=checkout" class="header__cart-view-cart btn">Thanh toán</a>
                        <?php endif; ?>    
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- menu section  -->
    <section class="menu">
        <ul id="nav">
            <li><a href="index.php"><i class="fas fa-home"></i></a></li>
            <li><a href="index.php">Trang chủ</a></li>
            <li>
                <a href="#">Cửa hàng
                    <i class="nav-arrow-down fas fa-caret-down"></i>
                </a>
                <div class="subnav">
                    <ul class="subnav-list">
                        <?php
                            $db = Connection::getInstance();
                            $query= $db->query("select *from categories where parent_id=0 order by id desc");
                            $categories = $query->fetchAll();
                        ?>
                        <?php foreach($categories as $rows): ?>
                        <li><a href="index.php?controller=products&action=category&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></li>
                            <?php
                                $querySub = $db->query("select * from categories where parent_id={$rows->id} order by id desc");
                                $categoriesSub = $querySub->fetchAll();
                            ?>
                        <?php foreach($categoriesSub as $rowsSub): ?>    
                        <li style="padding-left: 20px;"><a href="index.php?controller=products&action=category&id=<?php echo $rowsSub->id; ?>"><?php echo $rowsSub->name; ?></a></li>  
                        <?php endforeach; ?>
                      <?php endforeach; ?>               
                    </ul>
                </div>
            </li>
            <li><a href="index.php?controller=cart">Giỏ hàng</a></li>
            <li><a href="index.php?controller=news">Tin tức</a></li>
        </ul>
    </section>
