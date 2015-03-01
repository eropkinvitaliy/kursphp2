<?php


class View
    implements IteratorAggregate
{
    protected $position = 0;
    protected $data = [];
    protected $itm = [];

    public function getIterator()
    {
        return new MyIterator($this->data);
    }

    public function add($value)
    {
        $this->data[$this->position++] = $value;
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function display($template, $object)
    {
        foreach ($object as $key => $val) {
            foreach ($val as $k1 => $v1) {
                foreach ($v1 as $k3 => $temp) {
                    $ttt = [];
                    $ttt[$k3] = $temp;
                    array_push($this->itm, $ttt);
                }
            }
        }

        /*foreach ($this->data as $key => $val) {
            $$key = $val;
        }*/
        if (file_exists($template)) {
            include $template;
        } else {
            die('Файл не найден');
        }

    }

}