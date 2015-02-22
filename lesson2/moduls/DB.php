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
        $res = mysql_query($sql);
        if ($res) {
            return true;
        } else {
            return false;
        }

    }
    public function query($sql) {
        $res = mysql_query($sql);
        $arr = [];
        while (false !== $row = mysql_fetch_assoc($res)) {
            $arr[] = $row;
        }
        return $arr;
    }
}

?>
сделайте еще один метод
только назовите его query($sql)
 и пусть он умеет у вас выполнить запрос и вернуть все результаты его исполнения