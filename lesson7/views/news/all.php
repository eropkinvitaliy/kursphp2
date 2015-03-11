<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    <title>Новости</title>
</head>
<body>
<form action="./News/findByColumn" method="post" class="search">
    <input type="search" name="value" placeholder="поиск" class="input" />
    <input type="submit" name="" value="" class="submit" />
</form>

<p><a href="./Admin/Add" style="color: #ff0000">
        Добавить новость</a></p>
<?php
foreach ($items as $item): ?>
    <p><a href="./news/one/?id=<?php echo $item->id ?>">
            <?php echo $item->title; ?></a></p>
    <div><?php echo $item->text; ?></div>
    <div><?php echo 'Добавил новость: ' . $item->user . '  Дата:  ' . $item->date ?></div>
<?php endforeach; ?> <br>
<p><a href="./Admin/FileLogicErr" style="color: #fff000">
        Посмотреть журнал ошибок</a></p>
</body>
</html>
