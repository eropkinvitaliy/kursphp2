<?php

class DB
{
    public $sql;

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
}

?>