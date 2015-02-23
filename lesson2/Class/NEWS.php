<?php
require_once __DIR__.'/Article.php';

class NEWS extends Article
{
    static protected $db;

    public function News_create($table)
    {
        include __DIR__ . '/../class/DB.php';
        $title = $_POST['title'];
        $text = $_POST['newstext'];
        $user = $_POST['users'];
        //$db = new DB();
        $db = static::getDb();
        return $db->CreateString($table, $title, $text, $user);
    }

    public function News_getAll($table)
    {
        include __DIR__ . '/../class/DB.php';
        //$db = new DB();
        $db = static::getDb();
        return $db->findAll($table);
    }

    public function News_getString($table, $id_new)
    {
        include __DIR__ . '/../class/DB.php';
        //$db = new DB();
        $db = static::getDb();
        return $db->findOneString($table, $id_new);
    }

    public function Is_Get($var)
    {
        if (isset($var)) {
            return true;
        } else {
            return die('ошибка открытия текста новости');
        }

    }

    public function Is_Post()
    {
        if (isset($_POST['title']) && isset($_POST['users']) && isset($_POST['newstext'])) {
            return true;
        } else {
            return die;
        }
    }

    protected static function getDb()
    {
        static $db = null;
        if (null === $db) {
            $db = new DB();
        }
        return $db;
    }

}