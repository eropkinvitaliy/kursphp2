<?php
include __DIR__ . '\moduls\bd.php';
Is_Get();
$bd = new Database_work('mynews');
$id_news = $_GET['id'];
$bd->view_full_base($id_news);
include __DIR__ . '\view\view_text_news.php';
?>

