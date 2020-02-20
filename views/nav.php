<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    if (isset($_SESSION["username"])){
        $name_s = $_SESSION["username"];
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php?controller=pages&action=home">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?controller=department&action=index">Phòng ban <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=staff&action=index">Nhân vien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Liên hệ</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Xin chào: <b><i><?php echo $name_s ?></i></b>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Thông tin</a>
                        <a class="dropdown-item" href="index.php?controller=pages&action=logout">Đăng xuất</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>