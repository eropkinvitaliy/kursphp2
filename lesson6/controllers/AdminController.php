<?php

class AdminController
{

    public function actionAdd()
    {
        $article = new NewsModel();
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $now = date('d-m-Y H:m:s');
        $article->date = $now;
        $article->user = $_POST['user'];
        $article->save();
        include __DIR__ . '/../views/news/add.php';
    }

    public function actionDel()
    {
        $news = new NewsModel();
        $news->id = $_GET['id'];
        $news->delete();
        include __DIR__ . '/../views/news/del.php';
    }

    public function actionUpdate()
    {
        $new = new NewsModel();
        $new->id =$_GET['id'];
        $new = NewsModel::findOneByPk($new->id);
        include __DIR__ . '/../views/news/add.php';
        $new->save();

    }
} 