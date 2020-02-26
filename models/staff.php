<?php
require_once 'config.php';
if(!isset($_SESSION)){
    session_start();
}
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


    public function __construct($id, $id_department, $username, $password, $fullname, $birthday, $phone, $email)
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
        $db = DB::getInstance();
        $req = $db->query('SELECT staff.id, fullname, name, username, birthday, phone, email FROM staff LEFT JOIN department ON staff.id_department = department.id LIMIT 5');
        $list = $req->fetchAll();
        return $list;
    }

    public function find($id){
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM staff WHERE id = $id");
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['id'])){
            return new Staff($item['id'], $item['id_department'], $item['username'],  $item['password'], $item['fullname'], $item['birthday'], $item['phone'], $item['email']);
        }
        return null;

    }

    public function add($id_department,$username, $password, $fullname, $birthday, $phone, $email){
        $db = DB::getInstance();
        if ($id_department == '' || $username == '' || $password == '' || $fullname == '' || $birthday == '' || $email == ''){
            return false;
        }else{
            $req = $db->prepare("INSERT INTO staff(id,id_department,username, password, fullname, birthday, phone,email) VALUES (null, '" .$id_department. "', '" .$username. "', '" .$password. "', '" .$fullname. "', '" .$birthday. "', '" .$phone. "', '" .$email. "')");
            $req->execute();
            header("location:index.php?controller=staff&action=index");
        }
    }

    public function update($id, $id_department,$username, $password, $fullname, $birthday, $phone, $email){
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE staff SET id_department = '$id_department', username = '$username', password = '$password', fullname = '$fullname', birthday = '$birthday', phone = '$phone', email = '$email' WHERE id = '$id'");

        $req->execute();
        header("location:index.php?controller=staff&action=index");
    }

    public function delete($id){
        $db = DB::getInstance();

        $req = $db->prepare("DELETE FROM staff  WHERE id = '$id'");
        if ($req->execute()){
            header('location:index.php?controller=staff&action=index');
        }
    }

    public function login($username, $password){
       $db = DB::getInstance();
       $req = $db->prepare("SELECT * FROM staff WHERE username = '$username' AND password = '$password'");
       $req->execute();
       $result = $req->fetchAll();
       return $result;

    }

    public function logout() {
        session_unset($_SESSION['username']);
        session_destroy();
        header('Location:index.php?controller=pages&action=login');
    }

    public function search($key){
        $db = DB::getInstance();
        $req = $db->prepare("SELECT fullname, name, username, birthday, phone, email FROM staff LEFT JOIN department ON staff.id_department = department.id WHERE username LIKE '%$key%' OR fullname LIKE '$key' OR birthday LIKE '%$key%' OR phone LIKE '%$key%' OR email LIKE '%$key%' OR department.name LIKE '%$key%'");
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }

    public function reset($email){
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM staff WHERE email = '$email'");
        $req->bindParam(":email",$email);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function  paginate(){
        $db = DB::getInstance();
        $req = $db->query('SELECT count(*) FROM staff');
        $req->execute();
        $number_of_rows = $req->fetchColumn();
    }
}
