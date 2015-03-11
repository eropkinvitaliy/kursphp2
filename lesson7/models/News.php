<?php


namespace Application\Models;
use Application\Classes\AbstractModel;

/**
 * Class NewsModel
 * @property $id;
 * @property $title;
 * @property $text;
 * @property $data;
 * @property $user;
 */

class News
    extends AbstractModel
{
    static protected $table = 'news';
}