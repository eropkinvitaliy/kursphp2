<?php

namespace Application\Controllers;

use Application\Classes\View;
use Application\Classes\LogicError;
use Application\Classes\E404Ecxeption;
use Application\Models\News as NewsModel;

class Admin
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
        session_start(); // запускаем сессию для контроля id новости, которую редактируем
        $id = $_GET['id'];
        if (!isset($id)) {
            $id = $_SESSION['id']; //берём id из сессии, после апдейта, для показа новости которую проапдейтили
        } else {
            $_SESSION['id'] = $id; //записываем id в сессию, что бы после апдейта сохранить эту новость
        }
        $new = new NewsModel();
        $new->title = isset($_POST['title']) ? $_POST['title'] : null;
        $new->text = isset($_POST['text']) ? $_POST['text'] : null;
        $new->id = $id;
        if (empty($new->title)) {    //если заголовка пока нет, ищем по id новость и выводим на экран форму редактора
            $new = NewsModel::findOneByPk($id);
            $view = new View();
            $view->item = $new;
            $filename = __DIR__ . '/../views/news/update.php';
            $view->display($filename);
        } else { //заголовок новости пришёл из формы редактора и мы обновляем новость и переходим к Фронтконтроллеру
            $new->save();
            header('Location: http://localhost/php-2/lesson7/');
        }
    }

    public function actionLogicErr()
    {
        session_start();
        $date = date('d-m-Y H:m:s');
        $filename = __DIR__ . '\log.txt';
        LogicError::recordErr($filename, $date, $_SESSION['errFile'],
            $_SESSION['errLine'], $_SESSION['errCode'], $_SESSION['errMess']);
        header('HTTP/1.0 404 Not Found');
        header('Location: ./views/errors/e404.php');
    }
    public function actionFileLogicErr()
    {
        $filename = __DIR__ . '\log.txt';
        $data = LogicError::viewErr($filename);
        $view = new View();
        $view->item = $data;
        $view->display($filename);
    }
} 