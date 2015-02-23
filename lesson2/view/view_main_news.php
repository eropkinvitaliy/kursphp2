<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css"/>
    <title> Новостная лента </title>
</head>
<body>
<div style="height: 25">
    <a style="color: #ff0000; text-align: right " href="./create_news.php">Добавить новость</a>
</div>
<h1> Страница новостей </h1>

<div>
    <?php foreach ($news as $row) { ?>
        <p><a href="./text_news.php?id=<?php echo $row['id'] ?>">
                <?php echo addslashes($row['title']); ?></a></p>
        <p style="color: #773300 "> Добавил: <?php echo $row['user_n'] . '.'; ?>
            Дата добавления: <?php echo $row['data_c'] ?> </p>
    <?php } ?>
</div>
</body>
</html>