<?php

include_once 'libSQL.php';

class MySQL extends libSQL
{
	protected $dbType;
	protected $pass;
	protected $user;

	public function __construct()
    {
        try {
	        $this->db = DB;
        	$this->dbType = DB_TYPE_MYSQL;
            $this->pass = DB_PASSWORD;
            $this->user = DB_USER;

            parent::__construct();
        }
        catch(PDOException $e)
        {
            $this->errorMessage = DB_NOT_CONNECT .$e->getMessage();
        }
    }

	public function limit($limit, $offset)
	{
		if (is_numeric($offset) && is_numeric($limit))
		{	//LIMIT 10 OFFSET 20
			$result = ' LIMIT '.(int)$limit.' OFFSET '.(int)$offset;
		}
		else if (is_numeric($offset))
		{	//LIMIT 10
			$result = ' LIMIT '.(int)$limit;
		}
		$this->limit = $result;
		
		return $this;
	}
	
	
	
	
	 /**
	 * 'Limit' method for mysql
	 *
	 * @param bool $start
	 * @param bool $end
	 * @return bool|string
	 */
	/*public function limit_($start = false, $end = false)
	{
		if (is_numeric($start) && is_numeric($end))
			$result = ' LIMIT ' . (int)$start.','. (int)$end;
		else if (is_numeric($start))
			$result = ' LIMIT ' . (int)$start;

		$this->limit = $result;
		return true;
	}
 */
	
	protected function slQuotes($quotes)
	{
		return "'".addslashes($quotes)."'";
	}
	
	protected function stQuotes($quotes)
	{
		return '`'.addslashes($quotes).'`';
	}

}
