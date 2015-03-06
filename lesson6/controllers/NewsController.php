<?php

class NewsController
{
    public function actionAll()
    {
        $news = NewsModel::findOneByColumn('title','Новый 232323');
        $news->title = 'опять 2323';
        $news->save();

        die;

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

    public function actionFindByColumn()
    {
        $column = $_POST['column'];
        $value = $_POST['value'];
        $new = NewsModel::findByColumn($column,$value);
        $view = new View();
        $view->items = $new;
        $file_n = __DIR__ . '/../views/news/all.php';
        $view->display($file_n);
    }

}