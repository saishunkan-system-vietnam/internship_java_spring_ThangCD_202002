<?php
require_once ('controllers/base_controller.php');
require_once ('models/staff.php');
class PagesController extends BaseController
{

    function __construct()
    {
        $this->folder = 'pages';
    }

    public function login(){
        if (isset($_POST['username']) && isset($_POST['password'])){
            $username = $this->check($_POST['username']);
            $password = $this->check(md5($_POST['password']));
            if (!$username || !$password){
                echo '<script> alert("Bạn chưa nhập thông tin");</script>';
            }else{
                $result = Staff::login($username, $password);
                if ($result){
                    $_SESSION['username'] = $username;
                    if (isset($_POST['check'])){
                        setcookie('r_username', $username, time() + 60 * 60 * 24 * 30);
                        setcookie('r_password', $_POST['password'], time() + 60 * 60 * 24 * 30);
                    }else{
                        if (isset($_COOKIE['r_username'])){
                            setcookie('r_username','');
                        }
                        if (isset($_COOKIE['r_password'])){
                            setcookie('r_password','');
                        }
                    }
                    header('Location:index.php?controller=staff&action=index');
                }else{
                    echo '<script>alert("Sai thông tin đăng nhập. Mời nhập lại");</script>';
                }
            }

        }
        $this->render('home');
    }

    public function logout(){
        Staff::logout();
    }

    public function error(){
        $this->render('error');
    }

    function forgotpassword(){
        $message = 'fsfsferrs';
        if(isset($_POST['email']) || (!empty($_POST['email']))){
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $result = Staff::reset($email);
            if ($result){
                print_r($result);
                echo"<br>";
                $res_password = rand(100000,999999);
                $password_hash = md5($res_password);
                $db = DB::getInstance();
                $req_up = $db->prepare("UPDATE staff SET password='$password_hash' WHERE email='$email'");
                $req_up->execute();
                echo "<br>";
                print_r($res_password);
                $to = $email;
                $subject = "Reset password";
                $message = "Su dung mat khau moi de dang nhap :".$res_password;
                $headers = 'From: testemailsaishunkan@gmail.com';
                if (mail($to, $subject, $message, $headers)){
                    echo "<br>Mật khẩu được gửi đến email của bạn.<br>";
                }else{
                    echo "Vui lòng nhập eamil đăng ký để cấp lại mật khẩu";
                }
            }else{
                echo 'Không được để trống';
            }
        }

        $this->render('forgot_pass');
    }
}
