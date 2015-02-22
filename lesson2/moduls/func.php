<?php
function News_getAll($table)
{
    include __DIR__ . './DB.php';
    $db = new DB();
    return $db->findAll($table);
}

?>
