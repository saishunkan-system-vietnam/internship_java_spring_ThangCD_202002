<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo 'index.php?controller=pages&action=home'?>">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo 'index.php?controller=department&action=index' ?>">Phòng ban <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo 'index.php?controller=staff&action=index' ?>">Nhân vien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Liên hệ</a>
            </li>
        </ul>
    </div>
</nav>
<?php
$errName='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])) {
        $errName='Bạn chưa nhập thông tin';
    } else {
        $name =  $_POST["name"];
    }
}
?>
<h2>Cập nhật thông tin phòng</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group col-md-4">
        <label for="inputAddress">Tên phòng ban</label>
        <input type="text" class="form-control" name="name" value="">
        <span style="color: red"><?php echo $errName?></span>
    </div>
    <div class="form-group col-md-4 text-center">
        <button type="submit" name="add_depart" class="btn btn-success">Thêm mới</button>
    </div>
</form>

