<?php


class View
   // implements IteratorAggregate
{
//    protected $position = 0;
    protected $data = [];
    protected $itm = [];

 /*   public function getIterator()
    {
        return new MyIterator($this->data);
    }

    public function add($value)
    {
        $this->data[$this->position++] = $value;
    }
*/
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