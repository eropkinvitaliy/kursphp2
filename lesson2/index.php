<?php
include __DIR__ . '/moduls/DB.php';
$db = new DB();
$table = 'news';
$news = $db->findAll($table);
var_dump($news);
?>