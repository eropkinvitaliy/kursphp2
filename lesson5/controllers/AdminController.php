<?php

class AdminController {

    public function actionAdd()
    {
        $title = $_POST['title'];
        $text = $_POST['newstext'];
        $user = $_POST['users'];
        $item = News::addOne($title,$text,$user);
        if ($item) {
            include __DIR__ . '/../views/news/addtext.php';
        }
        else {
            die;
        }
    }
} 