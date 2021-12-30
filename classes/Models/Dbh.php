<?php

class Dbh
{
    private $host = "root";
    private $user = "";
    private $pwd = "";
    private $dbName = "car-rental";

    protected function connect()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbName=" . $this->dbName;
            $dbh = new PDO($dsn, $this->user, $this->pwd);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;
        } catch (PDOException $e) {
            print "Error:" . $e->getMessage() . '<br/>';
            die();
        }
    }
}
