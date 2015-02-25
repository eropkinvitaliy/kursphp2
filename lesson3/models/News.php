<?php

class News
    extends AbstractModel
{
    public $id;
    public $title;
    public $text;
    public $data;
    public $user;

    protected static $table = 'news';
    protected static $class = 'News';

    public static function addOne($title,$text,$user)
    {
        $db = new DB;
        $now = date('d-m-Y H:m:s');
        $sql = 'INSERT INTO ' . static::$table . '(title,text,data,user) VALUES ('
                                        . "'$title'" . ', ' . "'$text'" . ', ' . "'$now'" . ', ' . "'$user'" . ')';
        return $db->queryAdd($sql);

    }
}