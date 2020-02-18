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
<h2>Danh sách nhân viên</h2>
<div class="row">
    <div class="col-md-3">
        <a href="<?php echo'index.php?controller=staff&action=add'?>" class="btn btn-info">Thêm mới nhân viên</a>
    </div>
    <div class="col-md-9">
        <form class="form-inline" action="">
            <label for="email">Tên:</label>
            <input type="text" class="form-control" placeholder="Nhập tên" name="">
            <label for="pwd">Phòng:</label>
            <input type="text" class="form-control" placeholder="Phòng" >
            <label for="pwd">SĐT:</label>
            <input type="text" class="form-control" placeholder="Số điện thoại" >
            <label for="pwd">Email:</label>
            <input type="text" class="form-control" placeholder="Email" >
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Tên nhân viên</th>
        <th>Phòng</th>
        <th>Ngày sinh</th>
        <th>Số điện thoai</th>
        <th>Email</th>
        <th>Chức năng</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($staff as $s):?>
    <tr>
        <td><?php echo $s->fullname ?></td>
        <td><?php echo $s->id_department ?></td>
        <td><?php echo $s->birthday ?></td>
        <td><?php echo $s->phone ?></td>
        <td><?php echo $s->email ?></td>
        <td>
            <a href="<?php echo"index.php?controller=staff&action=show&id='$s->id'" ?>" class="btn btn-primary">Xem</a>
            <a href="" class="btn btn-secondary">Sửa</a>
            <a href="" class="btn btn-danger">Xóa</a>
        </td>
    </tr>
   <?php endforeach;?>
    </tbody>
</table>