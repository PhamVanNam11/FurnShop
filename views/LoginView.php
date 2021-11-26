<?php 
    $this->fileLayout = "LayoutTrangTrong.php";
?>
 <div class="modalLogin" style="display:flex;justify-content:center; align-items:center;">
            <!-- Đăng nhập -->
         <div class="auth-form">
                <form method='post' action="index.php?controller=account&action=loginPost" class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">
                            Đăng nhập
                        </h3>
                        <a href="index.php?controller=account&action=register" style="color:#27ae60;" class="auth-form__switch-btn">Đăng ký</a>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group">
                            <input type="email" name="email" class="auth-form__input" placeholder="Email của bạn">
                        </div>
                        <div class="auth-form__group">
                            <input type="password" name="password" class="auth-form__input" placeholder="Mật khẩu của bạn">
                        </div>
                    </div>
                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="">Quên mật khẩu</a>
                            <span class="auth-form__help-separate"></span>
                            <a href="">Cần trợ giúp?</a>
                        </div>
                    </div>
                    <div class="auth-form__controls">
                        <a style="align-items: center;display:flex;" href="" class="auth-form__btn auth-form__controls-back">TRỞ LẠI</a>
                        <button type="submit" class="auth-form__btn auth-form__controls-register">ĐĂNG NHẬP</button>
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
            </div>>    
    </div>