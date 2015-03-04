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
        ?><pre><?php var_dump($this->data) ?></pre><?php;
        foreach ($this->data as $item)
        {
            ?><pre><?php var_dump($item) ?></pre><?php;
        }
        if (file_exists($template)) {
            include $template;
        } else {
            die('Файл не найден');
        }

    }
}