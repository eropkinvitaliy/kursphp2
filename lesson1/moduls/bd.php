<?php
define("DB_NAME","mynews"); // имя базы данных
define("DB_HOST","localhost"); //хост базы данных
define("USER","root"); // имя пользователя БД
define("PASS",""); // пароль БД

mysql_connect(DB_HOST, USER, PASS) or die('Нет коннекта');
mysql_select_db(DB_NAME) or die('Нет базы');