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
        }
        $this->render('add');
    }

    public function show(){
        $id = $_GET['id'];
        $department = Department::find($id);
        $data = array('department' => $department);

        if (isset($_POST['update_depart'])){
            $name = $_POST['name'];
            $db = Department::update($id, $name);
        }

        $this->render('show', $data);
    }

    public function delete(){
        $id = $_GET['id'];
        $db = Department::del($id);
        $data = array('department' => $db);
        $this->render('index', $data);
    }
}
