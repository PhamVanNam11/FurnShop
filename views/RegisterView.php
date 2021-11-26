<?php 
    $this->fileLayout = "LayoutTrangTrong.php";
?>
<div class="modalRegister" style="display:flex;justify-content:center; align-items:center;">
        <!-- Đăng ký -->
        <div class="auth-form">
            <?php if(isset($_GET["notify"])&&$_GET["notify"]=="error"): ?>
                <p style="color:red;">Đăng ký chưa thành công, bạn hãy kiểm tra lại thông tin!</p>
            <?php else: ?>
                <p> Nếu bạn chưa có tài khoản, hãy đăng ký ngay để nhận thông tin ưu đãi cùng những ưu đãi từ cửa hàng.</p>
            <?php endif; ?>
            <form method='post' action="index.php?controller=account&action=registerPost" class="auth-form__container">
                <div class="auth-form__header">
                    <h3 class="auth-form__heading">
                        Đăng ký
                    </h3>
                    <a href="index.php?controller=account&action=login" style="color:#27ae60;" class="auth-form__switch-btn">Đăng nhập</a>
                </div>
                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <input type="text" name="name" class="auth-form__input" placeholder="Họ tên">
                    </div>
                    <div class="auth-form__group">
                        <input type="text" name="email" class="auth-form__input" placeholder="Email của bạn" required>
                    </div>
                    <div class="auth-form__group">
                        <input type="password" name="password" class="auth-form__input" placeholder="Mật khẩu của bạn" required>
                    </div>
                    <div class="auth-form__group">
                        <input type="text" name="address" class="auth-form__input" placeholder="Địa chỉ">
                    </div>
                    <div class="auth-form__group">
                        <input type="text" name="phone" class="auth-form__input" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="auth-form__aside">
                    <p class="auth-form__policy-text">
                        Bằng việc đăng kí, bạn đã đồng ý với Nam về
                        <a href="">Điều khoản dịch vụ</a> & <a href="">Chính sách và bảo mật</a>
                    </p>
                </div>
                <div class="auth-form__controls">
                    <button class="auth-form__btn auth-form__controls-back">TRỞ LẠI</button>
                    <button type="submit" class="auth-form__btn auth-form__controls-register">ĐĂNG KÝ</button>
                </div>
            </form>
            <div class="auth-form__socials">
                <a href="" class="auth-form__btn">
                    <i class="fab fa-facebook-square"></i>
                    <span>Kết nối với Facebook</span>
                </a>
                <a href="" class="auth-form__btn auth-form__socials--google">
                    <i class="fab fa-google"></i>
                    <span>Kết nối với Google</span>
                </a>
            </div>
        </div>
</div>