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
        //Paginate
        $total = Staff::paginate();
        echo $total;
    }

    public function show(){
        $depart = Department::all();
        $id = is_numeric($_GET['id']);
        if ($id == ''){
            header('Location:index.php?controller=staff&action=index');
        }else{
            $staff = Staff::find($id);
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
        }

        $this->render('show', $data);
    }

    public function add(){
        $depart = Department::all();
        $data = array('depart' => $depart);
        if (isset($_POST['add_staff'])){
            $id_department = $_POST['id_department'];
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
            $password = md5($_POST['password']);
            $fullname = htmlspecialchars($_POST['fullname'], ENT_QUOTES, 'UTF-8');
            $birthday = $_POST['birthday'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            var_dump($username);
            var_dump($fullname);

            Staff::add($id_department,$username,$password,$fullname,$birthday,$phone,$email);

        }
       $this->render('add', $data);
    }
    public function search2(){
        if (isset($_GET['keyword'])){
            $key = $_GET['keyword'];
            $result = Staff::search($key);
            $data = array('result' => $result);
        }
        $this->render('search', $data);
    }

    public function search(){
        if (isset($_GET['key_name']) || isset($_GET['key_part']) || isset($_GET['key_user']) || isset($_GET['key_date']) || isset($_GET['key_phone']) || isset($_GET['key_email'])){
            $arr = array(
                'keyname' => htmlspecialchars($_GET['key_name'], ENT_QUOTES, 'UTF-8'),
                'keydepart' => htmlspecialchars($_GET['key_depart'], ENT_QUOTES, 'UTF-8'),
                'keyuser' => htmlspecialchars($_GET['key_user'], ENT_QUOTES, 'UTF-8'),
                'keydate' => $_GET['key_date'],
                'keyphone' => $this->check($_GET['key_phone']),
                'keyemail' => $_GET['key_email']
            );
            $where = array();
            if ($arr['keyname']){
                $parttens = array('%','_');
                $replace = array('\%','\_');
                $r = str_replace($parttens,$replace,$arr['keyname']);
                $where[] = "fullname LIKE '%$r%'" ;
            }
            if ($arr['keydepart']){
                $where[] = "department.name LIKE '%{$arr['keydepart']}%'";
            }
            if ($arr['keyuser']){
                $parttens = array('%','_');
                $replace = array('\%','\_');
                $r = str_replace($parttens,$replace,$arr['keyuser']);
                $where[] = "username LIKE '%$r%'" ;
            }
            if ($arr['keydate']){
                $where[] = "birthday LIKE '%{$arr['keydate']}%'";
            }
            if ($arr['keyphone']){
                $where[] = "phone LIKE '%{$arr['keyphone']}%'";
            }
            if ($arr['keyemail']){
                $where[] = "email LIKE '%{$arr['keyemail']}%'";
            }
            include_once 'config.php';
            $db = DB::getInstance();
            $sql = "SELECT fullname, name, username, birthday, phone, email FROM staff LEFT JOIN department ON staff.id_department = department.id";
            if ($where){
                $sql .= ' WHERE ' .implode('AND', $where);
            }
//            var_dump($sql);
            $req = $db->prepare($sql);
            $req->execute();

            $result = $req->fetchAll();

            $data = array('result' => $result);
        }
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
    public function page(){
       Staff::paginate();
    }

}