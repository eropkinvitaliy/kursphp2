<?php
function News_getAll($table)
{
    $sql = 'SELECT * FROM ' . $table;
    return $this->query($sql);
}

?>
