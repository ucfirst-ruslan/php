<?php

class Mysql extends BaseDb
{

    public function __construct()
    {
        $this->dbType = DB_TYPE_MYSQL;
        $this->dbTable = DB_TABLE_MYSQL;

        $this->db = DB;

        parent::__construct();
    }

}
