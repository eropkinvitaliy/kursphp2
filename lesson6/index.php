<?php
session_start();
require_once __DIR__ . '/autoload.php';

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

$controller = new $controllerClassName;
$method = 'action' . $act;
try {
    $controller->$method();
} catch (E404Ecxeption $err) {
    $_SESSION['err'] = $err;

    header('HTTP/1.0 404 Not Found');
    header('Location: ./views/errors/e404.php');
}

