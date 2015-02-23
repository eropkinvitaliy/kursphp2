<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    <title>Текст статьи</title>
</head>
<body>
<h2><?php foreach ($str_new as $row) {echo $row['title'];} ?></h2>

<div>
    <p><?php foreach ($str_new as $row) {echo $row['text_f'];} ?></p>
</div>
<div>
    <br> <p><a href="./index.php">Вернуться к списку новостей</a></p>
</div>
</body>
</html>