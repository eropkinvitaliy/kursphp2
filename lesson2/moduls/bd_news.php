<?php

/*Создайте класс, работающий с базой данных
 В его конструкторе – подключайтесь к БД
 Его методы пусть умеют добавлять новую запись в таблицу, обновлять существующую и
получать список записей
Создайте абстрактный класс статьи
 От него унаследуйте класс новости
 Перепишите предыдущее задание, используя
классы новостей и базы данных*/


class Database_work
{
    public $bdname;

    public function __construct($bdname)
    {
        $this->bdname = $bdname;
        mysql_connect('localhost', 'root', '') or die('Нет коннекта');
        mysql_select_db($bdname) or die('Нет базы');
    }
}
?>
