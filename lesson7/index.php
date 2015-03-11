<?php
session_start();
require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[3]) ? ucfirst($pathParts[3]) : 'News';
$act = !empty($pathParts[4]) ? ucfirst($pathParts[4]) : 'All';

$controllerClassName = 'Application\\Controllers\\' . $ctrl;

$controller = new $controllerClassName;
$method = 'action' . $act;
try {
    $controller->$method();
} catch (E404Ecxeption $err) {
    $_SESSION['err'] = $err;
    $_SESSION['errFile'] = $err->getFile();
    $_SESSION['errLine'] = $err->getLine();
    $_SESSION['errCode'] = $err->getCode();
    $_SESSION['errMess'] = $err->getMessage();
    header('Location: ./Admin/LogicErr');
}
catch (E404Ecxeption $errSql) {
    $_SESSION['err'] = $errSql;
    $_SESSION['errFile'] = $errSql->getFile();
    $_SESSION['errLine'] = $errSql->getLine();
    $_SESSION['errCode'] = $errSql->getCode();
    $_SESSION['errMess'] = $errSql->getMessage();
    header('Location: ./Admin/LogicErr');
}

