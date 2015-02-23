<?php
include __DIR__ . '/class/Article.php';
include __DIR__ . '/class/NEWS.php';
$table = 'news';
$allnews = new NEWS();
$news = $allnews->News_getAll($table);
include __DIR__ . '/view/view_main_news.php';
?>
