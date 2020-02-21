<?php
include_once 'views/nav.php';
$errName='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $errName='Bạn chưa nhập thông tin';
    } else {
        $name =  $_POST["name"];
    }
}
?>
<h2>Nhập thông tin phòng</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-4">
        <label for="inputAddress">Tên phòng ban</label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên phòng ban">
        <span style="color: red"><?php echo $errName?></span>
    </div>
    <div class="form-group col-md-4 text-center">
        <button type="submit" name="add_depart" class="btn btn-success">Thêm mới</button>
    </div>
</form>

