<?php 
    $rememberedUsername = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
    $rememberedPassword = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
    $errAccount = "";
    // Post data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["nameAccount"]) || empty($_POST["passwordAdmin"])){
            $errAccount = "Do not leave account and password blank";
        }
        else{
            $nameAccount = $_POST["nameAccount"];
            $passwordAdmin = $_POST["passwordAdmin"];

            $rememberMe = isset($_POST["remember_me"]) && $_POST["remember_me"] === 'on';
            $checkAccount = $connect->prepare("SELECT * FROM `employees` WHERE `Email` = ?");
            $checkAccount->bind_param("s", $nameAccount);
            $checkAccount->execute();

            // Get result from query 
            $result = $checkAccount->get_result();
            // Status = 0: Employee's account
            // Status = 1: Account has not been approved
            // Status = 2: Account has been approved
            // Status = 3: Supper admin's account

            if ($result->num_rows > 0) {
                // Convert result to array 
                $row = $result->fetch_assoc();
                $passwordEncode = $row['Password'];
                $status = $row['Status'];
                // Decrypt password
                $verify = password_verify($passwordAdmin,$passwordEncode);
                if(!$verify){
                    $errAccount = "Name account or password is incorrect !";
                }
                else{
                    if($rememberMe){
                        $hour = time() + 3600 * 24 * 30;
                        setcookie('username', $nameAccount, $hour);
                        // setcookie('password', $passwordAdmin, $hour);
                    }
                    else {
                        setcookie('username', '', time() - 3600); 
                        // setcookie('password', '', time() - 3600);
                    }
                    if($status == 0){
                        header("Location: test_login_register.html"); // For employee
                    }
                    else if($status == 1){
                        header("Location: test_login_register.html"); // Wait to approve
                    }
                    else if($status == 2){
                        echo "Đăng nhập thành công";
                        header("Location: test_login_register.html"); // Change to home page (admin)
                    }
                    else{
                        header("Location: test_login_register.html");
                        echo "Đăng nhập với quyền supper admin thành công";
                    }
                    $checkAccount->close();
                }
            } else {
                $errAccount = "Name account or password is incorrect";
                $checkAccount->close();
            }
        }
        
    }
?>
<div class="register">
    <div class="register-container">
        <div class="row m-0 container-fluid p-0">
            <div class="register-intro col-md-6 ">
                <div class="register-intro-logo">
                    <img src="/user/assets/img/login_register/logo-w.svg" alt="" class="img-svg">
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
                        <input type="text" name="nameAccount" id="nameAccount" placeholder="Email" value="<?php echo $rememberedUsername; ?>"><br>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="form-group group-password-login">
                        <input type="password" name="passwordAdmin" id="passwordAdmin" placeholder="Password"><br>
                        <i class="fa-solid fa-eye-slash close-eye-icon"></i>
                        <i class="fa-solid fa-eye open-eye-icon"></i>
                        <span style="color:yellow"><?php echo $errAccount ?></span><br>
                    </div>
                    <div class="group-checkbox">
                        <input type="checkbox" class="checkbox-login" name="remember_me" <?php echo $rememberedUsername !== '' ? 'checked' : ''; ?>/><span style="color:#fff">Remember me </span> <br>
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