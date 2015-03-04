<?php


class View
{
    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function display($template, $tempdata)
    {
        $this->data = $tempdata;
        if (file_exists($template)) {
            include $template;
        } else {
            die('Файл не найден');
        }

    }
}