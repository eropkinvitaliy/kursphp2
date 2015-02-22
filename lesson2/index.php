<?php
include __DIR__ . '/moduls/DB.php';
$db = new DB();
$table = 'news';
$news = $db->News_getAll($table);
var_dump($news);
?>