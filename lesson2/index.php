<?php
include __DIR__ . '/moduls/DB.php';
include __DIR__ . '/moduls/DB_NEWS.php';
$db = new DB();
$table = 'news';
$db_news = new DB_NEWS();
$news = $db_news->News_getAll($table);
var_dump($news);
?>
