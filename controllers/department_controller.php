<?php
require_once ('controllers/base_controller.php');
require_once ('models/department.php');

class DepartmentController extends BaseController
{
    function  __construct()
    {
         $this->folder = 'department';
    }

    public function index()
    {
        $department = Department::all();
        $data = array('department' => $department);
        $this->render('index', $data);
    }


    public function add(){
        if (isset($_POST['add_depart'])){
            $name = $_POST['name'];

            $depart = Department::add($name);
            if ($depart){
                echo"<h3>Them thanh công</h3>>";
            }
        }
        $this->render('add');
    }

    public function delete($id){
        $department = Department::delete($_GET['id'] = $id);
        $data = array('department' => $department);
        $this->render('index', $data);
    }
}
