<?php

require_once __DIR__ . '/../Classes/DB.php';
class News {

    public $id;
    public $title;
    public $text_f;
    public $date_c;
    public $user;

    public static function getAll()
    {
        $db = new DB;
        return $db->query('SELECT * FROM news','News');
    }
} 