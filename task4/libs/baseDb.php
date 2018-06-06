<?php

class BaseDb 
{
    private $charset;
    private $userName;
    private $password;
    protected $host;
    protected $pdo;


    public __construct()
    {
        $this->carset = CHARSET;
        $this->userName = USERNAME;
        $this->password = PASWORD;
        $this->host = HOST;

        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        $this->pdo = new PDO($dsn, $this->userName, $htis->password, $opt);    
    }
}

