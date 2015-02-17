<?php
require_once __DIR__ . '/../config/sql.php';
function News_getAll()
{
    $sql = "SELECT * FROM news ORDER BY data_c DESC LIMIT 0,15";
    return Sql_query($sql);
}