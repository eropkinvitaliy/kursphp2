<?php

class DB_NEWS
{

    public function __construct()
    {
        mysql_connect('localhost', 'root', '') or die('Нет коннекта');
        mysql_select_db('mynews') or die('Нет базы');
    }

    protected function query($sql) {
        $res = mysql_query($sql);
        $arr = [];
        while (false !== $row = mysql_fetch_assoc($res)) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function News_getAll($table)
    {
        $sql = 'SELECT * FROM '.$table;
        return $this->query($sql);
    }
}

?>
