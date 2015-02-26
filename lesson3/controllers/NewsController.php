<?php

class NewsController
{

    public function actionAll()
    {
        $items = News::getAll();
        $view = new View($items);
        $file_n = __DIR__ . '/../views/news/all.php';
        $view->display($file_n);

    }

    public function actionOne()
    {
        $id = isset($_GET['id'])?($_GET['id']):(null);
        $item = News::getOne($id);
        var_dump($item); echo '<br>';
        $view = new View($item);
        $file_n = __DIR__ . '/../views/news/one.php';

        var_dump($view); die;
        $view->display($file_n);

    }

} 