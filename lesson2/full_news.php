<?php
include __DIR__ . '\moduls\bd.php';
Is_Get();
$id_news = $_GET['id'];
$result = News_getString($id_news);
include __DIR__ . '\view\view_text_news.php';
?>

