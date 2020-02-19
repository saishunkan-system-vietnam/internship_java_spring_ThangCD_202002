<?php
require_once ('controllers/base_controller.php');
require_once ('models/staff.php');
require_once ('config.php');

class PagesController extends BaseController
{

    function __construct()
    {
        $this->folder = 'pages';
    }

    public function login(){
        $staff = Staff::all();
        print_r($staff);
        if (!empty($_POST['login'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
                $result = Staff::login($username,$password);
                if ($result){
                    echo "Chúc mừng bạn đăng nhập thành công .";
                }else{
                    echo "Sai thông tin đăng nhập";
                }
            }
        $this->render('home');
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
