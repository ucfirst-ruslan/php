<?php

class Pgsql extends BaseDb
{

    public function __construct($dbTable)
    {
        $this->dbType = DB_TYPE_PGSQL;
        $this->dbName = DB_NAME_PGSQL;

        $this->dbTable = $dbTable;

        parent::__construct();
    }
}
