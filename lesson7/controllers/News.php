<?php

namespace Application\Controllers;

use Application\Models\News as NewsModel;
use Application\Classes\View;
use Carbon\Carbon;


class News
{

    public function actionAll()
    {
        $news = NewsModel::findAll();
        $view = new View();
        $view->items = $news;
        $file_n = __DIR__ . '/../views/news/all.php';
        $view->display($file_n);

        $mailer = new \PHPMailer();
        // Устанавливаем тему письма
        $mailer->Subject = 'Это тест';

        // Задаем тело письма
        $mailer->Body = 'Это тест моей почтовой системы!';

        $mailer->addAddress('ist70@mail.ru', 'Vitaliy');
        if(!$mailer->Send())
        {
            echo 'Не могу отослать письмо!';
        }
        else
        {
            echo 'Письмо отослано!';
        }
        $mailer->ClearAddresses();
        $mailer->ClearAttachments();
        echo '<br>' . $tomorrow = Carbon::now()->addDay() . '<br>';
        echo $lastWeek = Carbon::now()->subWeek();


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
        session_start();
        $column = 'title';
        $value = $_POST['value'];
        $new = NewsModel::findByColumn($column, $value);
        $view = new View();
        $view->item = $new;
        $file_n = __DIR__ . '/../views/news/one.php';
        $view->display($file_n);
    }

}