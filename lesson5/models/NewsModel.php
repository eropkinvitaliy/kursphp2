<?php

class NewsModel
    extends AbstractModel
{
    public $id;
    public $title;
    public $text;
    public $data;
    public $user;

    static protected $table = 'news';

}