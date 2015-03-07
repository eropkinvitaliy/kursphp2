<?php

class AdminController
{

    public function actionAdd()
    {
        $new = new NewsModel();
        $new->title = $_POST['title'];
        $new->text = $_POST['text'];
        $now = date('d-m-Y H:m:s');
        $new->date = $now;
        $new->user = $_POST['user'];
        $new->save();
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
        session_start();
        $id = $_GET['id'];
        if (!isset($id)) {
            $id = $_SESSION['id'];
        } else {
            $_SESSION['id'] = $id;
        }
        $view = new NewsModel();
        $view->title = isset($_POST['title']) ? $_POST['title'] : null;
        $view->text = isset($_POST['text']) ? $_POST['text'] : null;
        $view->id = $id;
        if (empty($view->title)) {
            $view = NewsModel::findOneByPk($id);
            include __DIR__ . '/../views/news/update.php';
        }
        else {
            $view->save();
            header('Location: http://localhost/php-2/lesson6/index.php');
        }
    }
} 