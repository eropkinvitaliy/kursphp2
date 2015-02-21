<?php
require_once __DIR__ . '/../config/sql.php';
function News_getAll()
{
    $sql = "SELECT * FROM news ORDER BY data_c";
    return Sql_query($sql);
}
function News_getString($id_n)
{
    $sql = "SELECT * FROM news WHERE id = '$id_n'";
    return Sql_query($sql);
}
function News_Insert()
{
    Sql_connect();
    $ntitle = addslashes($_POST['title']);
    $ntext = addslashes($_POST['newstext']);
    $now = date('H:i:s  d-m-Y');
    $nuser = addslashes($_POST['users']);
    $sql = "INSERT INTO news(title,text_f,data_c,user_n) VALUES ('$ntitle','$ntext','$now','$nuser')";
    mysql_query($sql);
    unset ($_POST['title']);
    unset ($_POST['user']);
    if ($sql) {
        return true;
    }
    else {
        return die ('Запись не добавлена');
    }
}