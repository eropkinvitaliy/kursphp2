<?php

abstract class AbstractModel
{

    static protected  $table;

    public static function getTable()
    {
        return static::$table;
    }




    public static function getAll()
    {
        $db = new DB;
        return $db->queryAll('SELECT * FROM ' . static::$table, static::$class);
    }

    public static function getOne($id)
    {
        $db = new DB;
        return $db->queryOne('SELECT * FROM ' . static::$table . ' WHERE id=' . $id, static::$class);
    }

} 