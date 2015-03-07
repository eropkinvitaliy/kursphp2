<?php session_start();?>
<!-- Форма ввода ошибки 404  -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    <title>Ошибка 404</title>
</head>
<body>
<h1>ОШИБКА 404 !!!!</h1>
<?php
// Здесь выводим сообщение на экран:
$err = $_SESSION['err'];
//var_dump($err);
echo 'Статья не найдена.<br>';
echo 'Ошибка произошла при выполнении <b> метода </b> ' . $_SESSION['errFile'].' в ';
echo $_SESSION['errLine'].' строке.';
echo ' Код ошибки : ' . $_SESSION['errCode'];

?>
<div>
    <br> <p><a href="../../index.php">Вернуться к списку новостей</a></p>
</div>
</body>
</html>
