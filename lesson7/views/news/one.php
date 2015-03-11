<h2><?php echo $item->title; ?></h2>
<div><?php echo $item->text; ?></div>
<p><a href="../../Admin/Del/?id=<?php echo $item->id ?>">Удалить </a> <br>
    <a href="../../Admin/Update/?id=<?php echo $item->id ?>">Редактировать </a>
</p>
<p><a href="../../">Вернуться на главную страницу</a></p>