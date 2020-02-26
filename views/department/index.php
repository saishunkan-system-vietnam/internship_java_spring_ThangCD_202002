<?php
    include_once 'views/nav.php';
?>
<div style="padding: 0.5em 1em">
    <h2>Danh sách phòng ban</h2>
    <a href="index.php?controller=department&action=add" class="btn btn-success" style="margin-bottom: 10px;">Thêm mới phòng ban</a>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
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
                    <a href="index.php?controller=department&action=show&id=<?php echo $d->id?>" class="btn btn-primary">Xem</a>
                    <a href="index.php?controller=department&action=show&id=<?php echo $d->id?>" class="btn btn-secondary">Sửa</a>
                    <a href="index.php?controller=department&action=delete&id=<?php echo $d->id?>" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <div class="text-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="index.php?controller=department&action=index&page=5">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
