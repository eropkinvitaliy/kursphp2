<?php

namespace Application\Classes;

use Application\Classes\DB;
use Application\Classes\E404Ecxeption;

abstract class AbstractModel

{
    static protected $table;
    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __isset($k)
    {
        return isset($this->data[$k]);
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
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        if (!$res = $db->query($sql, [':id' => $id])[0]) {
            $err = new \E404Ecxeption();
            throw $err;
            return false;
        }
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findByColumn($column, $value)
    {
        session_start();
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table .
            ' WHERE ' . $column . '=:value';
        $res = $db->query($sql, [':value' => $value]);
        if (empty($res)) {
            $err = new \E404Ecxeption();
            throw $err;
            return false;
        }
        else {
            return $res[0];
        }
    }

    protected function insert()
    {
        $cols = array_keys($this->data);
        $ins = [];
        $data = [];
        foreach ($cols as $col) {
            $ins[] = ':' . $col;
            $data[':' . $col] = $this->data[$col];
        }
        $sql = 'INSERT INTO ' . static::$table .
            ' (' . implode(', ', $cols) . ')
            VALUES
            (' . implode(', ', $ins) . ')
            ';
        $db = new DB;
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    public function delete()
    {
        $db = new DB();
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        return $db->execute($sql, [':id' => $this->id]);
    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v) {
            $data[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }
        $sql = 'UPDATE ' . static::$table .
            ' SET ' . implode(', ', $cols) .
            ' WHERE id=:id';
        $db = new DB;

        if (!$db->execute($sql, $data)) {
            $errSql = new \E404Ecxeption();
            throw $errSql;
        }
    }

    public function save()
    {
        if (!isset($this->data['id'])) {
            $this->insert();
        } else {
            $this->update();
        }
    }
} 