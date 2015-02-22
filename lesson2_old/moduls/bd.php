<?php

/*Создайте класс, работающий с базой данных
 В его конструкторе – подключайтесь к БД
 Его методы пусть умеют добавлять новую запись в таблицу, обновлять существующую и
получать список записей
Создайте абстрактный класс статьи
 От него унаследуйте класс новости
 Перепишите предыдущее задание, используя
классы новостей и базы данных*/

abstract class Artical

{
    public $bdname;
    public $tabname;

    abstract public function __construct($bdname);
}

class Database_work extends Artical
{
    protected $id_n;
    private $sql;
    private $res;
    public $temp;
    private $row;

    public  function __construct($bdname)
    {
        $this->bdname = $bdname;
        mysql_connect('localhost', 'root', '') or die('Нет коннекта');
        mysql_select_db($bdname) or die('Нет базы');
    }

    public function viewbase()
    {
        $this->sql = "SELECT * FROM news ORDER BY data_c DESC ";
        return $this->Sql_qwery(sql);
    }

    public function view_full_base($id_n)
    {
        $this->sql = "SELECT * FROM news WHERE id = '$id_n'";
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

    public function News_getString($id_n)
    {
        $this->sql = "SELECT * FROM news WHERE id = '$id_n'";
        return Sql_query(sql);
    }

    public function News_add($ntitle, $ntext, $nuser, $now)
    {
        $this->sql = "INSERT INTO news(title,text_f,data_c,user_n) VALUES ('$ntitle','$ntext','$now','$nuser')";
        if (mysql_query($this->sql)) {
            return true;
        } else {
            return die ('Ошибка. Запись не добавлена');
        }
    }
}

function Is_Get()
{
    if (isset($_GET['id'])) {
        return true;
    } else {
        return die('ошибка открытия текста новости');
    }
}

function Is_Post()
{
    if (isset($_POST['title']) && isset($_POST['users']) && isset($_POST['newstext'])) {
        return true;
    } else {
        return die('ошибка отправлены пустые данные');
    }
}

?>
