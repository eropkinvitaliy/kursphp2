<p><a href="../lesson3/index.php?ctrl=Admin&act=Add" style="color: #ff0000">
        Добавить новость</a></p>
<?php foreach ($items as $item): ?>
    <p><a href="../lesson3/index.php?ctrl=News&act=One&id=<?php echo $item->id ?>">
              <?php echo ($item->title); ?></a></p>
<div><?php echo $item->text; ?></div>
<?php endforeach; ?>
