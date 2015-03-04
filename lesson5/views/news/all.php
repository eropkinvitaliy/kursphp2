<p><a href="../lesson5/index.php?ctrl=Admin&act=Add" style="color: #ff0000">
        Добавить новость</a></p>
<?php
foreach ($this->data as $id => $item): ?>
    <p><a href="../lesson3/index.php?ctrl=News&act=One&id=<?php echo $id ?>">
              <?php echo $item['title']; ?></a></p>
<div><?php echo $item['text']; ?></div>
<?php endforeach; ?>
