<?php
include __DIR__ . '/class/Article.php';
include __DIR__ . '/class/NEWS.php';
$table = 'news';
$id_new = $_GET['id'];
$newtext = new NEWS();
$newtext->Is_Get($id_new);
$str_new = $newtext->News_getString($table,$id_new);
include __DIR__ . '/view/view_text_news.php';
?>

