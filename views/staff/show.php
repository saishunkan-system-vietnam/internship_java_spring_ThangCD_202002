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
<h2>Thông tin nhân viên <?php echo $staff->fullname?></h2>
<form action="" method="post">
    <div class="form-group col-md-4">
        <label for="inputAddress">Tên nhân viên</label>
        <input type="text" class="form-control" name="username" value="<?php echo $staff->fullname ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Phòng</label>
        <input type="text" class="form-control" name="id_department" value="<?php echo $staff->id_department ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Ngày sinh</label>
        <input type="date" class="form-control" name="birthday" value="<?php echo $staff->birthday ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Số điện thoại</label>
        <input type="number" class="form-control" name="phone" value="<?php echo $staff->phone ?>">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $staff->email ?>">
    </div>
    <div class="form-group col-md-4 text-center">
        <a href="index.php?controller=staff&action=index" class="btn btn-success">Back</a>
    </div>
</form>
