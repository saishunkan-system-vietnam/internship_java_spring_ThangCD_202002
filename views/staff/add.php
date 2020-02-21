<?php
include_once 'views/nav.php';
$errUsername = $errFullname = $errPhone = $errEmail = $errPassword = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = ($_POST["phone"]);
    $email = ($_POST["email"]);

    if(empty($_POST["username"])) {
        $errUsername='Bạn chưa nhập tên';
    } else {
        $username =  $_POST["username"];
    }
    if(empty($_POST["password"])) {
        $errPassword='Bạn chưa nhập mật khẩu';
    } else {
        $password =  $_POST["password"];
    }
    if(empty($_POST["fullname"])) {
        $errFullname='Bạn chưa nhập tên đầy đủ';
    } else {
        $fullname =  $_POST["fullname"];
    }
    if(empty($_POST["email"])) {
        $errEmail='Bạn chưa nhập email';
    } else{
        if(!preg_match("/^[a-zA-Z][\\w-]+@([\\w]+\\.[\\w]+|[\\w]+\\.[\\w]{2,}\\.[\\w]{2,})$/",$email)){
            $errEmail = "Email không đúng định dạng, mời nhập lại";
        }
    }
    if(empty($_POST["phone"])) {
        $errPhone='Bạn chưa nhập số điện thoại';
    } elseif(!preg_match("/((09|03|07|08|05)+([0-9]{8})\b)/",$phone)) {
        $errPhone = "Số điện thoại không đúng định dạng, mời nhập lại";
    } else{
        $phone = $_POST['phone'];
    }
}
?>
<h2>Nhập thông tin nhân viên</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-4">
        <label for="inputAddress">Tên đăng nhập</label>
        <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập">
        <span style="color: red"><?php echo $errUsername?></span>
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Phòng</label>
        <select class="browser-default custom-select" name="id_department">
            <option selected>Lựa chọn phòng</option>
            <?php foreach ($depart as $d):?>
            <option value="<?php echo $d->id?>"><?php echo $d->name?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Tên nhân viên</label>
        <input type="text" class="form-control" name="fullname" >
        <span style="color: red"><?php echo $errFullname?></span>
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Mật khẩu</label>
        <input type="text" class="form-control" name="password" >
        <span style="color: red"><?php echo $errPassword?></span>
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Ngày sinh</label>
        <input type="date" class="form-control" name="birthday" value="">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Số điện thoại</label>
        <input type="text" class="form-control" name="phone">
        <span style="color: red"><?php echo $errPhone?></span>
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Email</label>
        <input type="text" class="form-control" name="email">
        <span style="color: red"><?php echo $errEmail?></span>
    </div>
    <div class="form-group col-md-4 text-center">
        <button type="submit" name="add_staff" class="btn btn-success">Thêm mới</button>
    </div>
</form>
