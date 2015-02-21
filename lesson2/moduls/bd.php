<?php

/*Создайте класс, работающий с базой данных
 В его конструкторе – подключайтесь к БД
 Его методы пусть умеют добавлять новую запись в таблицу, обновлять существующую и
получать список записей*/

class Database_work
{
    public $bdname;
    public $tabname;
    private $sql;
    private $res;
    public $temp;
    private $row;

    public function __construct($bdname)
    {
        $this->bdname = $bdname;
        mysql_connect('localhost', 'root', '') or die('Нет коннекта');
        mysql_select_db($bdname) or die('Нет базы');
    }

    public function viewbase()
    {
        $this->sql = "SELECT * FROM news ORDER BY data_c";
        return $this->Sql_qwery(sql);
    }

    public function Sql_qwery($sql)
    {
        $this->res = mysql_query($this->sql);
        $this->temp = [];
        while (false !== $this->row = mysql_fetch_assoc($this->res)) {
            $this->temp[] = $this->row;
        }
        return $this->temp;
    }

}
?>
