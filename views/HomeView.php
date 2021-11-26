<?php 
    $this->fileLayout = "LayoutTrangChu.php";
?>
<div>
    <div class="representative" id="representative">
        <h2 class="heading">Sản phẩm tiêu biểu</h2>

        <div class="box-container">
            <?php 
                $hotProduct = $this->modelHotProduct();
            ?>
            <?php foreach($hotProduct as $rows): ?>
                <div class="box">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img src="assets/upload/products/<?php echo $rows->photo; ?>" alt=""></a>
                    <h3><a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"  style="color:black;text-decoration: none; font-size:2rem;"><?php echo $rows->name; ?></a></h3>
            
                    <div class="stars">
                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1"><i class="fas fa-star"></i></a>
                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2"><i class="fas fa-star"></i></a>
                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3"><i class="fas fa-star"></i></a>
                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4"><i class="fas fa-star"></i></a>
                        <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5"><i class="fas fa-star"></i></a>
                    </div>
                    <span><?php echo number_format($rows->discount);?>%</span>
                    <a href="index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>" class="btn">Add to Cart</a>
                   
                </div>
            <?php endforeach; ?>    
        </div>
    </div>
    <!-- Hàng mới -->
    <section class="products-new" id="products-new">
        <h2 class="heading">Hàng mới</h2>
        <div class="box-container">
            <div class="box">
                <img src="assets/fontend/images/new11.jpg" alt="">
                <div class="content">
                    <h3>FURN SHOP</h3>
                    <p> Chất liệu tốt sẽ tạo nên sản phẩm nội thất chất lượng luôn là yếu tố quan trọng được chú trọng lựa chọn. Từ mọi chi tiết vật liệu gỗ tự nhiên và công nghiệp, kim loại các loại phụ kiện sơn điều được các chuyên gia của nội thất UMA lựa chọn kỹ càng từ các nhà cung cấp tốt nhất.</p>
                    <!-- <a href="#" class="btn">Đặt hàng ngay</a> -->
                </div>
            </div>
            <div class="box">
                <img src="assets/fontend/images/new12.jpg" alt="">
                <div class="content">
                    <h3>FURN SHOP</h3>
                    <p>FURN trở nên hoàn hảo qua quá trình sản xuất và chất lượng thi công, từ bàn tay những người thợ lành nghề của chúng tôi. Các sản phẩm của FURN đa phần được chúng tôi làm từ khâu đầu tiên đến khâu cuối cùng. Kiểm tra chặt chẽ trước khi cho ra ngoài thị trường</p>
                    <!-- <a href="#" class="btn"> Đặt hàng ngay</a> -->
                </div>
            </div>
            <div class="box">
                <img src="assets/fontend/images/new13.jpg" alt="">
                <div class="content">
                    <h3>FURN SHOP</h3>
                    <p>Mẫu thiết kế đơn giản dựa trên các nguyên tắc chuẩn trong sản phẩm nội thất UMA được chúng tôi nghiên cứu từ kiểu dáng đến quy cách hiện đại với các  tiêu chuẩn hiện hành, bên cạnh việc phù hợp các chất liệu tốt và thi công nhanh  gọn chính xác .</p>
                    <!-- <a href="#" class="btn">Đặt hàng ngay</a> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Tin tuc -->
    <section class="blogs" id="blogs">
    
        <h1 class="heading"> tin <span>tức</span></h1>
    
        <div class="swiper blogs-slider" style="margin: 0 70px;">
    
            <div class="swiper-wrapper" style="height: 580px;">
                <?php 
                    $news = $this->modelHotNews();
                ?>
                <?php foreach($news as $rows): ?>
                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="assets/upload/news/<?php echo $rows->photo; ?>" alt="">
                    </div>
                    <div class="content">
                        <h3 style="heigth:400px"><a href="index.php?controller=news&action=detail&id=<?php echo $rows->id ?>" style="text-decoration: none;color:black"><?php echo $rows->name; ?></a></h3>
                        <p><?php echo $rows->mota; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
    
        </div>
    
    </section>
    
    
    
</div>