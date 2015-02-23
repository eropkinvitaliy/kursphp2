<?php
include __DIR__ . '/class/Article.php';
include __DIR__ . '/class/NEWS.php';
$table = 'news';
$create = new NEWS();
include __DIR__ . './view/view_create_news.php';
$create->Is_Post();
$create->News_create($table);
?>