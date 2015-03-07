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
    $_SESSION['errFile'] = $err->getFile();
    $_SESSION['errLine'] = $err->getLine();
    $_SESSION['errCode'] = $err->getCode();
    $_SESSION['errMess'] = $err->getMessage();
    header('Location: ./index.php?ctrl=Admin&act=LogicErr');
}
catch (E404Ecxeption $errSql) {
    $_SESSION['err'] = $errSql;
    $_SESSION['errFile'] = $errSql->getFile();
    $_SESSION['errLine'] = $errSql->getLine();
    $_SESSION['errCode'] = $errSql->getCode();
    $_SESSION['errMess'] = $errSql->getMessage();
    header('Location: ./index.php?ctrl=Admin&act=LogicErr');
}

