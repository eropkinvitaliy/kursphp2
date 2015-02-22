<?php
include __DIR__ . '/moduls/func.php';
$table = 'news';
$news = News_getAll($table);
var_dump($news);
?>
