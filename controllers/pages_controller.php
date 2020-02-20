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
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            if (!$username || !$password){
                echo '<script> alert("Bạn chưa nhập thông tin");</script>';
            }else{
                $result = Staff::login($username, $password);
                var_dump($result);
                if ($result){
                    session_start();
                    $_SESSION['username'] = $username;
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
        if(isset($_POST['forgot']))
        {
            $email=$_POST['email'];
            $que=$this->db->query("select email,password from staff where email='$email'");
            $row=$que->row();
            $user_email=$row->email;
            if((!strcmp($email, $user_email))){
                $pass=$row->pass;
                /*Mail Code*/
                $to = $user_email;
                $subject = "Password";
                $txt = "Your password is $pass .";
                $headers = "From: password@example.com" . "\r\n" .
                    "CC: ifany@example.com";
                mail($to,$subject,$txt,$headers);
            }
        }
        $this->render('forgot_pass');
    }
}
