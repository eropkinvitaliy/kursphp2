<?php

class DB
{
    public function __construct()
    {
        mysql_connect('localhost', 'root', '') or die('Нет коннекта');
        mysql_select_db('mynews') or die('Нет базы');
    }

    public function execute($sql)
    {
        $this->res = mysql_query($this->sql);
        if (res) {
            return true;
        } else {
            return false;
        }

    }
}

?>

напишите мне публичный метод этого класса
назовите его execute($sql)
он должен выполнить запрос к базе, находящийся в $sql
и вернуть признак успешности запроса - true или false