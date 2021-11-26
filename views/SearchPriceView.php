<?php 
    $this->fileLayout= "LayoutTrangTrong.php";
?>
<main>
    <nav class="d-flex" aria-label="breadcrumb">
        <ol class=" breadcrumb">
            <li class="bread-left breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="bread-left breadcrumb-item active" aria-current="page">Cửa hàng</li>
        </ol>
        
    </nav>
</main>

    <h3 class="category-parent" style="margin-left:265px;color:#192a56; margin-top:10px;">
    Giá từ <?php echo number_format($fromPrice); ?> VNĐ - đến <?php echo number_format($toPrice); ?> VNĐ
    </h3>
    <div class="underline"><span></span></div>

 <div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-2">
                <nav class="category">
                    <h3>Danh mục</h3>

                    <ul class="category-list">
                        <li class="category-item ">
                            <a href="#" class="category-item__link " >
                            <?php 
                                    $db = Connection::getInstance();
                                    $query = $db->query("select * from categories where parent_id=0 order by id desc");
                                    $categories = $query->fetchAll();
                                  ?>
                                  <?php foreach($categories as $rows): ?>
                                  <h4><a class="category-item__link" href="index.php?controller=products&action=category&id=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a></h4>
                                  <?php 
                                    $querySub = $db->query("select * from categories where parent_id={$rows->id} order by id desc");
                                    $categoriesSub = $querySub->fetchAll();
                                  ?>
                                  <?php foreach($categoriesSub as $rowsSub): ?>
                                  <a class="category-item__link category-item--active" href="index.php?controller=products&action=category&id=<?php echo $rowsSub->id; ?>">- <?php echo $rowsSub->name; ?></a>
                                  <?php endforeach ?>
                                  <?php endforeach ?>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div class="grid__column-10">
                <div class="home-product">
                    <div class="grid__row">
                    <?php foreach($data as $rows): ?>
                        <div class="grid__column-2-4">
                            <a class="home-product-item">
                                <img class="home-product-item__img" src="assets/upload/products/<?php echo $rows->photo; ?>" width="100%"></img>
                                <h4 class="home-product-item__name"><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>" style="text-decoration:none; color: #192a56;"><?php echo $rows->name; ?></a></h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-old"><?php echo number_format($rows->price);?> đ</span>
                                    <span class="home-product-item__price-current"> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> đ</span>
                                </div>
                                <div class="home-product-item__action">
                                    <span class="home-product-item__like home-product-item__like--liked">
                                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                    </span>
                                    <div class="home-product-item__rating">
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1"><i class="home-product-item__star--gold fas fa-star"></i></a>
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2"><i class="home-product-item__star--gold fas fa-star"></i></a>
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3"><i class="home-product-item__star--gold fas fa-star"></i></a>
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4"><i class="home-product-item__star--gold fas fa-star"></i></a>
                                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5"><i class="home-product-item__star--gold fas fa-star"></i></a>
                                    </div>
                                    <!-- <span class="home-product-item__sold">110 đã bán</span> -->
                                </div>
                                <!-- <div class="home-product-item__favourite">
                                    <i class="fas fa-check"></i>
                                    <span>Yêu thích</span>
                                </div> -->
                                <!-- <div class="home-product-item__sale-off">
                                    <span class="home-product-item__sale-off-percent">23.1%</span>
                                    <span class="home-product-item__sale-off-label">GIẢM</span>
                                </div> -->
                            </a>
                            <div class="home-product-item__button">
                                <a href="index.php?controller=products&action=cart" class="btn">Thêm vào giỏ hàng</a>
                            </div>    
                        </div>
                    <?php endforeach; ?>    
                    </div>
                    
                </div>

                <ul class="pagination home-product__pagination" style="margin-left: -850px;">
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link" style="color: #192a56;">
                            Trang
                        </a>
                    </li>
                    <?php for($i =1; $i <= $numPage; $i++): ?>
                    <li class="pagination-item pagination-item--active">
                        <a href="index.php?controller=search&action=price&fromPrice=<?php echo $fromPrice; ?>&toPrice=<?php echo $toPrice; ?>" class="pagination-item__link"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
    </div>