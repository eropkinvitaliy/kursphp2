<?php

abstract class AbstractModel
    implements Imodel
{

    protected static $table;
    protected static $class;

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