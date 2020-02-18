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

    public function add($name){
        $db = DB::getInstance();
        if ($name == ''){
            return false;
        }else{
            $req = $db->prepare("INSERT INTO department(name) VALUES ('$name')");
            $req->execute();
        }
    }

    public function update($id, $id_parent, $name){
        $db = DB::getInstance();
        $req = $db->prepare("UPDATE department SET id_parent = '$id_parent', name = '$name' WHERE id = '$id'");

        $req->execute();
    }

    public function delete($id){
        $db = DB::getInstance();

        $req = $db->prepare("DELETE FROM department WHERE id = '$id'");
        $req->execute();
    }
}
