<?php
include '/bd.php';
include '../config/lib_fun.php';
$ntitle = $_POST['title'];
$ntext = $_POST['newstext'];
$now = date('H:i:s  d-m-Y');
$nuser = $_POST['users'];
$sql = "INSERT INTO news(title,text_f,data_c,user_n) VALUES ('$ntitle','$ntext','$now','$nuser')";
$result = mybd_sql($sql);
if (!$result) {
    die('Ошибка. Новость не добавлена');
}
header('Location: http://localhost/php-2/lesson1/index.php');



