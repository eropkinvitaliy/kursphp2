<?php

abstract class AbstractModel
{
    static protected $table;

    protected $data = [];
    public $id;

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }


    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findByColumn($column, $value)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table .
            ' WHERE ' . $column . '=:' . $column;
        $db = new DB();
        $db->setClassName($class);
        $column = ':' . $column;
        return $db->query($sql,[$column => $value]);
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $ins = [];
        $data = [];
        foreach ($cols as $col) {
            $ins[] = ':' . $col;
            $data[':' . $col] = $this->data[$col];
        }
        $sql = 'INSERT INTO ' .static::$table.
            ' (' . implode(', ', $cols). ')
            VALUES
            (' . implode(', ', $ins). ')
            ';
        $db = new DB;
        echo $this->data['id'] = $db->executeInsert($sql, $data);
    }

    public function delete()
    {
        $db = new DB();
        $sql = 'DELETE * FROM ' . static::$table . ' WHERE id=:id';
        return $db->execute($sql, [':id' => $this->id]);
    }
} 