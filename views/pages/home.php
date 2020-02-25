<link rel="stylesheet" href="public/css/home.css">

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first" style="padding: 20px;">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="LOGIN" />
        </div>
        <?php
        $errUsername = $errPassword = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["username"])) {
                $errUsername='Mời bạn nhập tên';
            } else {
                $username =  $_POST["username"];
            }
            if(empty($_POST["password"])) {
                $errPassword='Mời bạn nhập mật khẩu';
            } else {
                $password =  $_POST["password"];
            }
        }

        ?>
        <!-- Login Form -->
        <form METHOD="POST">
            <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" value="<?php if (isset($_COOKIE['r_username'])){ echo $_COOKIE['r_username']; }?>"></br>
            <span style="color: red"><?php echo $errUsername?></span>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" value="<?php if (isset($_COOKIE['r_password'])){ echo  $_COOKIE['r_password']; }?>"></br>
            <span style="color: red"><?php echo $errPassword?></span></br>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="check" <?php if (isset($_COOKIE['r_username'])){echo 'checked'; }?>>
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="index.php?controller=pages&action=forgotpassword">Forgot Password?</a>
        </div>
    </div>
</div>