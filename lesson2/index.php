<?php
include __DIR__ . '/moduls/DB.php';
$DB = new DB();
$sql = "SELECT * FROM news ORDER BY data_c DESC";
if (!($DB->execute($sql))) {
    die ('Ошибка запроса');
}
?>