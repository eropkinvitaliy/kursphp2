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

    protected function query($sql)
    {
        $res = mysql_query($sql);
        $arr = [];
        while (false !== $row = mysql_fetch_assoc($res)) {
            $arr[] = $row;
        }
        return $arr;
    }

    protected function queryAdd($sql)
    {
        return mysql_query($sql);
    }

    public function findAll($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        return $this->query($sql);
    }

    public function findOneString($table, $id_new)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE id = ' . $id_new;
        return $this->query($sql);
    }

    public function CreateString($table, $title, $text, $user)
    {
        $now = date('d-m-Y H:m:s');
        $sql = 'INSERT INTO ' . $table . '(title,text_f,data_c,user_n) VALUES (' . "'$title'" . ', ' . "'$text'" . ', ' . "'$now'" . ', ' . "'$user'" . ')';
        return $this->queryAdd($sql);
    }

}

?>