<?php 
    $this->fileLayout= "LayoutTrangTrong.php";
?>
<main>
    <nav class="d-flex" aria-label="breadcrumb">
        <ol class=" breadcrumb">
            <li class="bread-left breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="bread-left breadcrumb-item active" aria-current="page">Bàn</li>
        </ol>
    </nav>
</main>
<section class="details">
        <div class="image_container">
            <div class="big-image">
                <img src="assets/upload/products/<?php echo $record->photo; ?>" style="width:100%;">
            </div>    
            <div class="small-images">
                <img src="assets/upload/products/<?php echo $record->photo1; ?>" alt="">
                <img src="assets/upload/products/<?php echo $record->photo2; ?>" alt="">
                <img src="assets/upload/products/<?php echo $record->photo3; ?>" alt="">
                <img src="assets/upload/products/<?php echo $record->photo4; ?>" alt="">
            </div>            
        </div>                 
        <div class="content">
            <h1><?php echo $record->name; ?></h1>
            <div class="stars">
            <a href="index.php?controller=products&action=rating&id=<?php echo $record->id; ?>&star=1"><i class="home-product-item__star--gold fas fa-star"></i></a>
            <a href="index.php?controller=products&action=rating&id=<?php echo $record->id; ?>&star=2"><i class="home-product-item__star--gold fas fa-star"></i></a>
            <a href="index.php?controller=products&action=rating&id=<?php echo $record->id; ?>&star=3"><i class="home-product-item__star--gold fas fa-star"></i></a>
            <a href="index.php?controller=products&action=rating&id=<?php echo $record->id; ?>&star=4"><i class="home-product-item__star--gold fas fa-star"></i></a>
            <a href="index.php?controller=products&action=rating&id=<?php echo $record->id; ?>&star=5"><i class="home-product-item__star--gold fas fa-star"></i></a>
            </div>
                <p>
                <?php echo $record->mota; ?>
                </p>   
            <div class="cart">
                <input class="input-number" type="number" placeholder="1" min="1">
                <a href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>" class="btn">Thêm vào giỏ</a>
            </div>
            <div class="price">
                <div class="price-sale">
                <?php echo number_format($record->price - $record->price * $record->discount/100); ?>đ
                </div>
                <div class="price-cost">
                    <del><?php echo number_format($record->price); ?>đ</del>
                </div>
                <div class="percent"><?php echo number_format($record->discount);?>%</div>
            </div>
            <div class="list-icon">
                <div class="list">
                    <img src="assets/fontend/images/icon/service_1.png" width="12%">
                    <div class="text">
                        <p> 2 tiếng giao hàng<br> Hàng chục nghìn sản phẩm</p>
                    </div>    
                </div> 
                <div class="list">
                    <img src="assets/fontend/images/icon/service_1.png" width="12%">
                    <div class="text">
                        <p>30 ngày đổi trả dễ dàng</p>
                    </div>    
                </div>       
            </div>
        </div>
    </section>

    <div class="description">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mô tả</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Đánh giá (0)</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <ul>
                    <?php echo $record->noidung; ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h4>Đánh giá</h4>
                <p>Chưa có đánh giá nào</p>
                <div class="evaluate">
                    <p>Đánh giá</p>
                    <div class="star1 d-flex">
                        <div class="star_one border-right" style="background-color: #192a56; color:#fff;padding:1px 5px;border-radius:5px">
                            <span style="font-size: 1.1rem;font-weight:bold;"><?php echo $this->modelGetStar($record->id,1); ?> vote</span>
                            <p style="margin-left:5px">1<i class="fas fa-star" style="font-size: 13px; color:gold;"></i></p>
                        </div>
                        <div class="star_one border-right" style="background-color: rgb(216, 122, 21); color:#fff;padding:1px 5px;border-radius:5px">
                            <span style="font-size: 1.1rem;font-weight:bold;"><?php echo $this->modelGetStar($record->id,2); ?> vote</span>
                            <p style="margin-left:5px">2<i class="fas fa-star" style="font-size: 13px; color:gold;"></i></p>
                        </div> 
                        <div class="star_one border-right" style="background-color: rgb(109, 230, 22); color:#fff;padding:1px 5px;border-radius:5px">
                            <span style="font-size: 1.1rem;font-weight:bold;"><?php echo $this->modelGetStar($record->id,3); ?> vote</span>
                            <p style="margin-left:5px">3<i class="fas fa-star" style="font-size: 13px; color:gold;"></i></p>
                        </div> 
                        <div class="star_one border-right" style="background-color: rgb(230, 22, 22); color:#fff;padding:1px 5px;border-radius:5px">
                            <span style="font-size: 1.1rem;font-weight:bold;"><?php echo $this->modelGetStar($record->id,4); ?> vote</span>
                            <p style="margin-left:5px">4<i class="fas fa-star" style="font-size: 13px; color:gold;"></i></p>
                        </div> 
                        <div class="star_one" style="background-color:rgb(230, 180, 22); color:#fff;padding:1px 5px;border-radius:5px">
                            <span style="font-size: 1.1rem;font-weight:bold;"><?php echo $this->modelGetStar($record->id,5); ?> vote</span>
                            <p style="margin-left:5px">5<i class="fas fa-star" style="font-size: 13px; color:gold;"></i></p>
                        </div>     
                    </div>
                    <p>Nhận xét của bạn *</p>
                    <textarea rows="5" cols="130"></textarea>
                    <div class="row justify-content-around">
                        <div class="row1 col-5 d-flex">
                            <p>Tên *</p>
                            <input type="text">
                        </div> 
                        <div class="row1 col-5 d-flex">
                            <p><b>Email *</b></p>
                            <input type="email">
                        </div>
                    </div>
                    <button href="#" class="evaluate-btn btn">Gửi đi</button>
                </div>
            </div>
        </div>
    </div>

    <section class="similar">
        <h3 class="heading">Sản phẩm cùng loại</h3>
        <div class="similar__products">
            <div class="grid__column-2-4-1 d-flex">
                <div class="similar__item">
                    <a class="home-product-item">
                        <img class="home-product-item__img" src="assets/upload/products/<?php echo $record->photo; ?>"></img>
                        <h4 class="home-product-item__name"><a href="index.php?controller=products&action=detail&id=<?php echo $record->id; ?>" style="text-decoration:none; color: #192a56;"><?php echo $record->name; ?></a></h4>
                        <div class="home-product-item__price">
                            <span class="home-product-item__price-current">729.000đ</span>
                            <span class="home-product-item__sold">11 đã bán</span>
                        </div>
                        <!-- <div class="home-product-item__favourite">
                            <i class="fas fa-check"></i>
                            <span>Yêu thích</span>
                        </div> -->
                        <!-- <div class="home-product-item__sale-off">
                            <span class="home-product-item__sale-off-percent">33%</span>
                            <span class="home-product-item__sale-off-label">GIẢM</span>
                        </div>   -->
                    </a>
                </div>
            </div>
        </div>
    </section>