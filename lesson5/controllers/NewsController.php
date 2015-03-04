<?php

class NewsController
{
    public function actionAll()
    {
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