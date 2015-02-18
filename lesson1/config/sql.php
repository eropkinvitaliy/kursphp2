<?php
function Sql_connect()
{
    mysql_connect('localhost', 'root', '') or die('Нет коннекта');
    mysql_select_db('mynews') or die('Нет базы');
}
function Sql_query($sql) {
    Sql_connect();
    $res = mysql_query($sql);
    $temp = [];
    while (false !== $row = mysql_fetch_array($res)) {
        $temp[] = $row;
    }
    return $temp;
}
function Is_Get () {
if (isset($_GET['id'])) {
    return true;
}
    else {
        return die('ошибка открытия текста новости');
    }
}
function Is_Post () {
    if (isset($_POST['title']) && isset($_POST['users']) && isset($_POST['newstext'])) {
        return true;
    }
    else {
        return die('ошибка отправлены пустые данные');
    }
}
?>