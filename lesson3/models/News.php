<?php

require_once __DIR__ . '/../Classes/DB.php';
class News {

    public $id;
    public $title;
    public $text_f;
    public $data_c;
    public $user_n;

    public static function getAll()
    {
        $db = new DB;
        return $db->queryAll('SELECT * FROM news','News');
    }
    public function getOne($id)
    {
        $db = new DB;
        return $db->queryOne('SELECT * FROM news WHERE id=' . $id,'News');
    }
} 