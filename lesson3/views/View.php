<?php


class View
{
    public $items;

    public function __construct($dataItems)
    {
        $this->items = $dataItems;
    }

    public function display($filename)
    {
        if (file_exists($filename)) {
            include $filename;
        } else {
            die('Файл не найден');
        }

    }

}