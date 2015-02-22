<?php

class DB
{

    public function __construct()
    {
        mysql_connect('localhost', 'root', '') or die('Нет коннекта');
        mysql_select_db('mynews') or die('Нет базы');
    }

    protected function execute($sql)
    {
        $res = mysql_query($sql);
        if ($res) {
            return true;
        } else {
            return false;
        }

    }
    protected function query($sql) {
        $res = mysql_query($sql);
        $arr = [];
        while (false !== $row = mysql_fetch_assoc($res)) {
            $arr[] = $row;
        }
        return $arr;
    }
    public function findAll($table) {
        $sql = 'SELECT * FROM '.$table.' ORDER BY data_c DESC';
        return $this->query($sql);
    }
}

?>
findAll($table)
 публичный
 который используя нужный защищенный метод вернет вам все записи из указанной таблицы