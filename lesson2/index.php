<?php
include __DIR__ . '/moduls/DB.php';
$db = new DB();
$sql = "SELECT * FROM news ORDER BY data_c DESC";
if (!($db->execute($sql))) {
    die ('Ошибка запроса');
}
?>