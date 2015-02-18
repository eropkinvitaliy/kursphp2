<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    <title>Текст статьи</title>
</head>
<body>
<h2><?php echo addslashes($result[0]['title']); ?></h2>

<div>
    <p><?php echo addslashes($result[0]['text_f']); ?></p>
</div>
<div>
    <br> <p><a href="./index.php">Вернуться к списку новостей</a></p>
</div>
</body>
</html>