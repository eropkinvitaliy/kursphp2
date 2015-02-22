<?php
include __DIR__ . './moduls/bd.php';
include __DIR__ . './view/view_create_news.php';
Is_Post();
$ntitle = addslashes($_POST['title']);
$ntext = addslashes($_POST['newstext']);
$nuser = addslashes($_POST['users']);
$data = new DateTime();
$now = $data->format('d-m-Y H:i:s');
$bd = new Database_work('mynews');
$bd->News_add($ntitle,$ntext,$nuser,$now);
?>