<?php

class NewsController
{
    public function actionAll()
    {
        $news = News::getAll();
        $view = new View();
        //$view->items = $news;
        $iter = new RecursiveArrayIterator($news);
        $data = [];
        foreach (new RecursiveIteratorIterator($iter) as $key => $value) {
            // echo $key . ": " . $value . "<br>";
            $ttt = [];
            $ttt[$key] = $value;
            array_push($data, $ttt);
        }
        $file_n = __DIR__ . '/../views/news/all.php';
        $view->display($file_n, $data);


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