<?php

abstract class Article
{
    abstract public function News_create($table);

    abstract public function News_getAll($table);

    abstract public function News_getString($table, $id_new);

    abstract public function Is_Get($var);

    abstract public function Is_Post();

    abstract protected static function getDb();
}