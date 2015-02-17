<?php
include __DIR__ . '\moduls\bd.php';
$result = News_getAll();
include __DIR__ . '\view\view_main_news.php';
?>