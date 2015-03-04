<?php

class AdminController
{

    public function actionAdd()
    {
        $article = new NewsModel();
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $now = date('d-m-Y H:m:s');
        $article->data = $now;
        $article->user = $_POST['user'];
        $article->insert();
        //$item = NewsModel::addOne($title,$text,$user);
        include __DIR__ . '/../views/news/addtext.php';
    }
} 