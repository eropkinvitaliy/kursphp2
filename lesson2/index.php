<?php

include __DIR__ . './moduls/bd.php';
$bd = new Database_work('mynews');
$bd->viewbase();
include __DIR__ . './view/view_main_news.php';
?>