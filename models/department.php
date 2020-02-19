<?php
class Department
{
    public $id;
    public $id_parent;
    public $name;

    function __construct($id, $id_parent, $name)
    {
        $this->id = $id;
        $this->id_parent = $id_parent;
        $this->name = $name;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM department');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Department($item['id'], $item['id_parent'], $item['name']);
        }

        return $list;
    }

    public function find($id){
        $db = DB::getInstance();
        $req = $db->prepare("SELECT * FROM department WHERE id = $id");
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['id'])){
            return new Department($item['id'], $item['id_parent'], $item['name']);
        }
        return null;

    }

    public function add($name){
        $db = DB::getInstance();
        if ($name == ''){
            return false;
        }else{
            $req = $db->prepare("INSERT INTO department(name) VALUES ('$name')");
            $req->execute();
            header('Location:index.php?controller=department&action=index');
        }
    }

    public function update($id, $name){
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE department SET id_parent = '1', name = '$name' WHERE id = '$id'");

        $req->execute();
        header('Location:index.php?controller=department&action=index');
    }

    public function delete($id){
        $db = DB::getInstance();

        $req = $db->prepare("DELETE FROM department WHERE id = '$id'");
        if ($req->execute()){
            header('location:index.php?controller=department&action=index');
        }
    }
}
