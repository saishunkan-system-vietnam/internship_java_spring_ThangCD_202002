<?php
$controllers = array(
    'pages' => ['login','logout', 'error', 'forgotpassword'],
    'department' => ['index', 'show', 'add', 'delete'],
    'staff' => ['index', 'show', 'add', 'delete', 'search'],
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

include_once('controllers/' . $controller . '_controller.php');
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();

