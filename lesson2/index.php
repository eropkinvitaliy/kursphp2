<?php
include __DIR__ . '/moduls/DB.php';
$db = new DB();
$sql = "SELECT * FROM news ORDER BY data_c DESC";
$news = $db->query($sql);
var_dump($news);

?>