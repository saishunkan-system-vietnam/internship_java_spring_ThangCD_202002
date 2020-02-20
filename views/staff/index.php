<?php
include_once 'views/nav.php';
?>
<div style="padding: 0.5em 1em;">
    <h2>Danh sách nhân viên</h2>
    <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-3">
            <a href="<?php echo'index.php?controller=staff&action=add'?>" class="btn btn-info">Thêm mới nhân viên</a>
        </div>
        <div class="col-md-9">
            <form class="form-inline" action="" method="get">
                <input type="hidden" name="controller" value="staff">
                <input type="hidden" name="action" value="search">
                <label for="keyword">Mời nhập </label>
                <input type="text" class="form-control" placeholder="Mời nhập thông tin" name="keyword">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Tên nhân viên</th>
            <th>Phòng</th>
            <th>Tên đăng nhập</th>
            <th>Ngày sinh</th>
            <th>Số điện thoai</th>
            <th>Email</th>
            <th>Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($staff as $s):?>
            <tr>
                <td><?php echo $s['fullname'] ?></td>
                <td><?php echo $s['id_department'] ?></td>
                <td><?php echo $s['username'] ?></td>
                <td><?php echo $s['birthday'] ?></td>
                <td><?php echo '0'.$s['phone'] ?></td>
                <td><?php echo $s['email'] ?></td>
                <td>
                    <a href="index.php?controller=staff&action=show&id=<?php echo $s['id']?>" class="btn btn-primary">Xem</a>
                    <a href="index.php?controller=staff&action=show&id=<?php echo $s['id']?>" class="btn btn-secondary">Sửa</a>
                    <a href="index.php?controller=staff&action=delete&id=<?php echo $s['id']?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>