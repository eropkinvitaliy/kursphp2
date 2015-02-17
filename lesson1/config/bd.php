<?php
define("DB_NAME","mynews");
define("DB_HOST","localhost");
define("USER","root");
define("PASS","");

mysql_connect(DB_HOST, USER, PASS) or die('Нет коннекта');
mysql_select_db(DB_NAME) or die('Нет базы');