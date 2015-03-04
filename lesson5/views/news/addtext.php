<!-- Форма ввода новой новости  -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    <title>Добавление новостей</title>
</head>
<body>
<h3>Добавление новостей</h3>

<form action="../lesson5/index.php?ctrl=Admin&act=Add" method="POST">
    Заголовок новости: <input type="text" Size=70 name="title" required=""><br>
    Ваше имя: <input type="text" Size=50 name="user" required=""><br>
    Текст <textarea name="text" cols=60 rows=6 required=""> </textarea>
    <br><br>
    <input type="Submit" Value="Ok">
    <input type="reset" Value=" Очистить ">
</form>
<div>
    <br> <p><a href="./index.php">Вернуться к списку новостей</a></p>
</div>
</body>
</html>
