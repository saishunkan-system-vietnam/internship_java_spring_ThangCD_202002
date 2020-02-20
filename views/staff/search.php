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
    <?php
    if ($result){
        ?>
        <table class="table table-striped table-bordered">
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
            <?php foreach ($result as $r):?>
                <tr>
                    <td><?php echo $r['fullname'] ?></td>
                    <td><?php echo $r['id_department'] ?></td>
                    <td><?php echo $r['birthday'] ?></td>
                    <td><?php echo '0'.$r['phone'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td>
                        <a href="index.php?controller=staff&action=show&id=<?php echo $r['id']?>" class="btn btn-primary">Xem</a>
                        <a href="index.php?controller=staff&action=show&id=<?php echo $r['id']?>" class="btn btn-secondary">Sửa</a>
                        <a href="index.php?controller=staff&action=delete&id=<?php echo $r['id']?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php
    }else{
        echo '<div class="alert alert-info">
                <strong>Mời nhập lại!</strong> Không tìm thấy kết quả nào phù hợp.
              </div>';
    }
    ?>

</div>