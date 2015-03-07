<?php

class DB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        // Здесь потенциально опасный код
        try {
            if (!$this->dbh = new PDO('mysql:dbname=mynews;host=localhost', 'root', '')) {
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $edb = new PDOException();
                throw $edb;
            }
        } catch (PDOException $edb) {
            header('HTTP/1.0 403 Forbidden');
            header('Location: ./views/errors/e403.php');
        }
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $this->className;
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

}