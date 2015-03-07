<?php session_start();?>
<!-- Форма ввода ошибки 404  -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    <title>Ошибка 403</title>
</head>
<body>
<h1>ОШИБКА 403 !!!!</h1>
<?php
// Здесь выводим сообщение на экран:
$edb = $_SESSION['edb'];
echo 'Соединение с БД, с треском провалилось! Посмотри что ты наделал: '.$edb->getMessage();
?>
<div>
    <br> <p><a href="../../index.php">Вернуться к списку новостей</a></p>
</div>
</body>
</html>
