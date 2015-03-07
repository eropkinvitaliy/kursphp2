<?php

class NewsController
{
    public function actionAll()
    {
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
        $column = 'title';
        $value = $_POST['value'];
        try {
            $new = NewsModel::findByColumn($column, $value);
        } catch (E404Ecxeption $err) {
            die ('Новость не найдена');
        }
        $view = new View();
        $view->item = $new;
        $file_n = __DIR__ . '/../views/news/one.php';
        $view->display($file_n);
    }

}