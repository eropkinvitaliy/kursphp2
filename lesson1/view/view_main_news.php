<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    <title>Новостная лента</title>
</head>
<body>
<div style="width: 1500; height: 25">
    <a style="color: #ff0000; text-align: right " href="./view_create_news.php">Добавить новость</a>
</div>
<h1>Cтраница новостей</h1>
<?
include '../moduls/bd.php';
include '../config/lib_fun.php';
include '../moduls/select.php';
?>
<div style="display: inline-block">
    <?php
    while ($row = mysql_fetch_array($result)) {
        ?>
        <p style="color: #0000cc"> <?php echo $row['title']; ?></p>
        <p style="text-align: right; color: #773300 "> Добавил: <?php echo $row['user_n'] . '.'; ?>
            Дата добавления: <?php echo $row['data_c'] ?> </p>
    <?php } ?>
</div>
</body>
</html>

