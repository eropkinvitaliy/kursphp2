<?php

class NewsController
{
    public function actionAll()
    {
        var_dump(NewsModel::findOneByPk(37));
        var_dump(NewsModel::findByColumn('id',37)); die;

        $news = NewsModel::findAll();
        $view = new View();
        $view->items = $news;
        $file_n = __DIR__ . '/../views/news/all.php';
        $view->display($file_n);


    }

    public function actionOne()
    {

        $id = isset($_GET['id']) ? ($_GET['id']) : (null);
        $new = NewsModel::findOneByPk($id);
        $view = new View();
        $view->item = $new;
        $file_n = __DIR__ . '/../views/news/one.php';
        $view->display($file_n);
    }

}