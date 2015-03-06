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
        if (isset($article->title) && isset($article->text) && isset($article->user))
        {
            $article->insert();
            include __DIR__ . '/../views/news/addtext.php';
        }
        else {
            die ('Не заполнены поля');
        }

    }
    public function actionDell()
    {
        $article = new NewsModel();
        $this->$id = '37';
        $article->delete();
    }
} 