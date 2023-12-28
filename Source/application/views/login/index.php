<?php include(__DIR__ . '\\..\\include\\header-Links.html'); ?>

<div class="register">
    <div class="register-container">
        <div class="row m-0 container-fluid p-0">
            <div class="register-intro col-md-6 ">
                <div class="register-intro-logo">
                    <!-- <img src="/user/assets/img/login_register/logo-w.svg" alt="" class="img-svg"> -->
                </div>
                <div class="register-intro-heading">
                    <h1>Welcome! <br>To Our Website </h1>
                </div>
                <div class="register-intro-desc">
                    <p>Travel is life, experiencing wonderful things,<br> we bring you memorable trips, helping you love life more.</p>
                </div>
                <div class="register-intro-contact">
                    <div class="register-contact-fb">
                        <a href="#">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </div>
                    <div class="register-contact-ig">
                        <a href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                    <div class="register-contact-tw">
                        <a href="#">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="register-form col-md-6 col-sm-12">
                <h1>Sign In</h1>
                <form action="<?php echo base_url('login-user')?>" method="POST">
                    <div class="form-group group-nameAccount">
                        <input type="text" name="nameAccount" id="nameAccount" placeholder="Email"><br> <!--  value="<?php echo $rememberedUsername; ?>" -->
                        <i class="fa-solid fa-user"></i>
                    </div>
                    
                    <div class="form-group group-password-login">
                        <input type="password" name="passwordAdmin" id="passwordAdmin" placeholder="Password"><br>
                        <i class="fa-solid fa-eye-slash close-eye-icon"></i>
                        <i class="fa-solid fa-eye open-eye-icon"></i>
                        <!-- <span style="color:yellow"><?php echo $errAccount ?></span><br> -->
                    </div>
                    <div class="group-checkbox">
                        <input type="checkbox" class="checkbox-login" name="remember_me" /><span style="color:#fff">Remember me </span> <br> <!-- <?php echo $rememberedUsername !== '' ? 'checked' : ''; ?> -->
                    </div>
                    <div class="form-group group-submit group-login">
                        <input type="submit" value="Login">
                    </div>
                    <div class="register-navigate-login">
                        <p>Don't have an account? <a href="./register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>    
    </div>     
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        var closeEye = $('.group-password-login .open-eye-icon');
        var openEye = $('.group-password-login .close-eye-icon');
        var passwordInput = $('#passwordAdmin');

        openEye.on('click', function () {
            openEye.hide();
            closeEye.show();
            passwordInput.attr('type', 'text');
        });

        closeEye.on('click', function () {
            openEye.show();
            closeEye.hide();
            passwordInput.attr('type', 'password');
        });
    });
</script>