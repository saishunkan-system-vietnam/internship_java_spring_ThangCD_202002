<?php

require_once 'controllers/base_controller.php';
require_once 'models/staff.php';
require_once 'models/department.php';

class StaffController extends BaseController
{
    function __construct()
    {
        $this->folder = 'staff';
    }

    public function index()
    {
        $staff = Staff::all();
        $data = array('staff' => $staff);
        $this->render('index', $data);
    }

    public function show(){
        $staff = Staff::find($_GET['id']);
        $data = array('staff' => $staff);
        $this->render('show', $data);
    }

    public function add(){
        $depart = Department::all();
        $data = array('depart' => $depart);
        if (isset($_POST['add_staff'])){
            $id_department = $_POST['id_department'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];
            $birthday = $_POST['birthday'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            $db = Staff::add($id_department,$username,$password,$fullname,$birthday,$phone,$email);
            if($db){
               alert('thêm mới thanh công');
            }

        }
       $this->render('add', $data);
    }
}