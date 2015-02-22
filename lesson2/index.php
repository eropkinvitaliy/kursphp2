<?php
include __DIR__ . '/moduls/DB.php';
$news = new db();
$sql = "SELECT * FROM news ORDER BY data_c DESC";
if (!($news->execute($sql))) {
    die ('Ошибка запроса');
}
?>