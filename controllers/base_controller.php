<?php
class BaseController
{
    protected $folder;
    function render($file, $data = array())
    {
        $view_file = 'views/' . $this->folder . '/' . $file . '.php';
        if (is_file($view_file)) {
            extract($data);
            ob_start();
            require_once($view_file);
//            $content = ob_get_clean();
            // Sau khi có kết quả đã được lưu vào biến $content, gọi ra template chung của hệ thống đế hiển thị ra cho người dùng
            require_once('views/layouts/main.php');
        } else {
            header('Location: index.php?controller=pages&action=error');
        }
    }
}