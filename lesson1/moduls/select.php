<?php
$sql = "SELECT * FROM news ORDER BY data_c DESC LIMIT 0,15";
$result = mybd_sql($sql);