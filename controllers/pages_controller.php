<?php

require_once ('controllers/base_controller.php');
require_once ('models/staff.php');

class PagesController extends BaseController
{

    function __construct()
    {
        $this->folder = 'pages';
    }

    public function home(){
        if (isset($_POST['login'])){
           $username = $_POST['username'];
           $password = md5($_POST['password']);

            if ($db = Staff::login($username, $password)){
                header('Location:index.php?controller=department&action=index');
            }
        }
        $this->render('home');
    }

    public function error(){
        $this->render('error');
    }
}
