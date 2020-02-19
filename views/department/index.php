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
<h2>Danh sách phòng ban</h2>
<a href="index.php?controller=department&action=add" class="btn btn-success">Thêm mới phòng ban</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên phòng</th>
        <th>Chức năng</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($department as $d):?>
        <tr>
            <td><?php echo $d->id ?></td>
            <td><?php echo $d->name ?></td>
            <td>
                <a href="" class="btn btn-primary">Xem</a>
                <a href="index.php?controller=department&action=show&id=<?php echo $d->id?>" class="btn btn-secondary">Sửa</a>
                <a href="index.php?controller=department&action=delete&id=<?php echo $d->id?>" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
