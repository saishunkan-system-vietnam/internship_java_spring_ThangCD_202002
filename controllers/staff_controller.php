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
        $depart = Department::all();
        $id = $_GET['id'];
        $staff = Staff::find($_GET['id']);
        $data = array('staff' => $staff, 'depart' => $depart);

        if (isset($_POST['update_staff'])){
            $id_department = $_POST['id_department'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $fullname = $_POST['fullname'];
            $birthday = $_POST['birthday'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            Staff::update($id, $id_department, $username, $password, $fullname, $birthday, $phone, $email);
        }
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

        }
       $this->render('add', $data);
    }

    public function search(){
        $sear = $_GET['keyword'];
        $result = Staff::search($sear);
        var_dump($result);
        $data = array('result' => $result);
        $this->render('search', $data);
    }

    /**
     * @return string
     */
    public function delete(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            Staff::delete($id);
        }
    }
}