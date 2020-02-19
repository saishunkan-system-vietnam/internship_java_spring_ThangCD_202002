<?php
require_once 'config.php';
class Staff
{
    public $id;
    public $id_department;
    public $username;
    public $password;
    public $fullname;
    public $birthday;
    public $phone;
    public $email;


    function __construct($id, $id_department, $username, $password, $fullname, $birthday, $phone, $email)
    {
        $this->id = $id;
        $this->id_department = $id_department;
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM staff');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Staff($item['id'], $item['id_department'], $item['username'], $item['password'], $item['fullname'],$item['birthday'], $item['phone'], $item['email']);
        }

        return $list;
    }

    public function find($id){
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM staff WHERE id = $id");
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['id'])){
            return new Staff($item['id'], $item['id_department'], $item['username'], $item['password'], $item['fullname'],$item['birthday'], $item['phone'], $item['email']);
        }
        return null;

    }

    public function add($id_department,$username, $password, $fullname, $birthday, $phone, $email){
        $db = DB::getInstance();
        if ($id_department == '' || $username == '' || $password == '' || $fullname == '' || $birthday == '' || $email == ''){
            return false;
        }else{
            $req = $db->prepare("INSERT INTO staff(id,id_department,username, password, fullname, birthday, phone,email) VALUES (null, '$id_department', '$username', '$password', '$fullname', '$birthday', '$phone', '$email')");
            $req->execute();
            header("location:index.php?controller=staff&action=index");
        }
    }

    public function update(){

    }

    public function login($username, $password){
       $db = DB::getInstance();
       $req = $db->prepare("SELECT * FROM staff WHERE username = '$username' AND password='$password'");
       $req->execute();
    }
}
