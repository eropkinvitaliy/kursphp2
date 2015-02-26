<?php


class View
{
    public $items;

    public function __construct($dataItems)
    {
        $this->items = $dataItems;
    }

    public function display($filename,$item)
    {
        if (file_exists($filename)) {
            $this->items = $item;
            include $filename;
        } else {
            die('Файл не найден');
        }

    }

}