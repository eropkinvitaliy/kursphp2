<h2><?php echo $item->title; ?></h2>
<div><?php echo $item->text; ?></div>
<p><a href="./index.php?ctrl=Admin&act=Del&id=<?php echo $item->id ?>">Удалить </a> <br>
    <a href="./index.php?ctrl=Admin&act=Update&id=<?php echo $item->id ?>">Редактировать </a>
</p>
<p><a href="./index.php">Вернуться на главную страницу</a></p>