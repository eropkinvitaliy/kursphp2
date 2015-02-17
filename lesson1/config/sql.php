<?php
function Sql_connect()
{
    mysql_connect('localhost', 'root', '') or die('Нет коннекта');
    mysql_select_db('mynews') or die('Нет базы');
}
function Sql_query($sql) {
    Sql_connect();
    $res = mysql_query($sql);
    $news = [];
    while (false !== $row = mysql_fetch_assoc($res)) {
        $news[] = $row;
    }
    return $news;
}
?>