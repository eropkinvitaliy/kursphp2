<!-- Форма ввода новой новости  -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    <title>Добавление новостей</title>
</head>
<body>
<h3>Добавление новостей</h3>

<form action="../moduls/createnews.php" method="POST">
    Заголовок новости: <input type="text" Size=70 name="title"><br>
    Ваше имя: <input type="text" Size=50 name="users"><br>
    Текст <textarea name="newstext" cols=60 rows=6>
    </textarea>
    <br><br>
    <input type="Submit" Value="Ok">
    <input type="reset" Value=" Очистить ">
</form>
</body>
</html>