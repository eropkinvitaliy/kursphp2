<?php

class NewsController
{
    public function actionAll()
    {

        ?><pre><?php var_dump(NewsModel::findAll())?></pre><?php
        die;
        /*
        $db = new DB;
        $res = $db->query('SELECT * FROM news');

        ?><pre><?php var_dump($res)?></pre><?php


        die;
        $news = News::getAll();
        $view = new View();
        $iter = new RecursiveArrayIterator($news);
        $data = [];
        foreach (new RecursiveIteratorIterator($iter) as $key => $value) {
            $ttt = [];
            $ttt[$key] = $value;
            array_push($data, $ttt);
        }
        $file_n = __DIR__ . '/../views/news/all.php';
        $view->display($file_n, $data); */


    }

    public function actionOne()
    {
        $id = isset($_GET['id']) ? ($_GET['id']) : (null);
        $new = News::getOne($id);
        $view = new View();
        $view->item = $new;
        $file_n = __DIR__ . '/../views/news/one.php';
        $view->display($file_n, $view);

    }

}