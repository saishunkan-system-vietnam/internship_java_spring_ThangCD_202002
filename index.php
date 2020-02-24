<?php
require_once('config.php');
session_start();

if (isset($_GET['controller']) && isset($_SESSION['username'])) {
    $controller = $_GET['controller'];
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index.php';
    }
} elseif (isset($_GET['action']) == 'login'){
    $controller = 'pages';
    $action = 'login';
}else {
    $controller = 'pages';
    $action = 'forgotpassword';
}
require_once('route.php');

