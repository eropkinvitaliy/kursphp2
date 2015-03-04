<?php

class NewsController
{
    public function actionAll()
    {


        /*

        $news = News::getAll();
        $view = new View();
        $iter = new RecursiveArrayIterator($news);
        $data = [];
        foreach (new RecursiveIteratorIterator($iter) as $key => $value) {
            $ttt = [];
            $ttt[$key] = $value;
            array_push($data, $ttt);
        }*/
        $news = NewsModel::findAll();
        $view = new View();
        $file_n = __DIR__ . '/../views/news/all.php';
        $view->display($file_n, $news);
        die;
        ?><pre><?php var_dump(NewsModel::findAll()) ?></pre><?php;


    }

    public function actionOne()
    {
        ?><pre><?php var_dump(NewsModel::findOneByPk(27)) ?></pre><?php
        die;
        $id = isset($_GET['id']) ? ($_GET['id']) : (null);
        $new = NewsModel::findOneByPk($id);
        $view = new View();
        $file_n = __DIR__ . '/../views/news/one.php';
        $view->display($file_n, $view);

    }


}