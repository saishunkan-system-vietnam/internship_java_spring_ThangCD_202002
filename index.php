<?php

require_once('config.php');
if (!isset($_SESSION['username'])){
    session_start();
}

if (isset($_GET['controller']) && isset($_SESSION['username'])){
    $controller = $_GET['controller'];
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }else{
        $action = 'index.php';
    }
}elseif(isset($_GET['action'])) {
    $controller = 'pages';
    $action = $_GET['action'];
}else{
    $controller = 'pages';
    $action = 'login';
}
require_once('route.php');