<?php

include_once 'basedb.php';

class Mysql extends BaseDb
{
    private $dbName;

    public __construct()
    {
        $this->dbName = DBNAME_MYSQL;
        $dsn = "mysql:host=$this->host;dbname=$this->dbName;
                charset=$this->charset";
        parent::__construct();
        
    }

}
