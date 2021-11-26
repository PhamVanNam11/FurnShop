<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FURN Store</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="assets/fontend/lib/bootstrap4/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/fontend/css/Danhmuc.css">
	<link rel="stylesheet" type="text/css" href="assets/fontend/css/TrangChu.css">
	<link rel="stylesheet" type="text/css" href="assets/fontend/css/Chitietsanpham.css">
    <link rel="stylesheet" type="text/css" href="assets/fontend/css/base.css">
</head>
<body>

<!-- plugin chat -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61986ca06885f60a50bca941/1fktmglon';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

    <?php include "views/HeaderView.php"; ?>

    <!-- main -->
    
    <?php echo $this->view; ?>
    


    <!-- footer -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <img src="../images/logo.png" alt=""> <span>Furn</span>
                <p>Mang đến cho ngôi nhà của bạn một phong cách mới</p>
                <div class="share">
                    <a href="#" class="btn fab fa-facebook-f"></a>
                    <a href="#" class="btn fab fa-twitter"></a>
                    <a href="#" class="btn fab fa-instagram"></a>
                    <a href="#" class="btn fab fa-linkedin"></a>
                </div>
            </div>

            <div class="box">
                <h3>Về Furn</h3>
                <div class="links">
                    <a href="index.php">Trang chủ</a>
                    <a href="#">Cửa hàng</a>
                    <a href="index.php?controller=cart">Giỏ hàng</a>
                    <a href="#">Tin tức</a>
                </div>
            </div>

            <div class="box" style="margin-top:10px">
                <h3>Danh mục</h3>
                <div class="box-link">
                    <div class="links">
                    <a href="#">Bàn</a>
                        <a href="#">Ghế</a>
                        <a href="#">Nội thất gia đình</a>
                        <a href="#">Đồ gia dụng</a>
                        <a href="#">Vách ngăn</a>
                    </div>
                    <!-- <div class="links">
                        <a href="#">Tủ</a>
                        <a href="#">Vách ngăn</a>
                        <a href="#">Nội thất hội trường</a>
                        <a href="#">Đồ gia dụng</a>
                        <a href="#">Két sắt</a>
                    </div> -->
                </div>    
            </div>

            <div class="box">
                <h3>Download app</h3>
                <div class="links">
                    <a href="#">Google play</a>
                    <a href="#">App store</a>
                    <a href="#">Window xp</a>
                </div>
            </div>
        </div>

        <h3 class="credit">Created by <span>Nam's healer</span></h3>
    </section>


</body>
<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script type="text/javascript" src="assets/fontend/lib/bootstrap4/popper.min.js"></script>
<script type="text/javascript" src="assets/fontend/lib/bootstrap4/bootstrap.min.js"></script>

<script src="assets/fontend/cript.js"></script>
</html>    