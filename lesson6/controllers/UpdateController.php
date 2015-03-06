<?php

$new = new NewsModel();
$new->title = isset($_POST['title']) ? $_POST['title'] : null;
$new->text = isset($_POST['text']) ? $_POST['text'] : null;
$new->user = isset($_POST['user']) ? $_POST['user'] : null;
$new->date = isset($_POST['date']) ? $_POST['date'] : null;
$new->id = isset($_POST['idd']) ? $_POST['idd'] : null;
var_dump($new);
die;
$new->save();

?>