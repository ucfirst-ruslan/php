<?php


class SqlServise
{
	private $select;
	private $selectDistinct;
	private $from;
	private $where;
	private $order;
	private $group;
	private $limit;

	public function __construct()
	{
		$this->select = '';
		$this->selectDistinct = '';
		$this->from = '';
		$this->order = '';
		$this->where = '';
		$this->group = '';
		$this->limit = '';


		$this->bind = array();
		$this->joinQuery = array();
		$this->leftJoin = array();
		$this->joinIndex = 1;


		$this->pdo = null;
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //PDO::ERRMODE_WARNING
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false
		];
		$dsn = $this->dbType.":host=".DB_HOST.";dbname=".$this->db;
		$this->pdo = new PDO($dsn, $this->user, $this->pass, $opt);
	}


	private function selectQuery($columns)
	{
		if ($columns != '*')
		{
			$col = explode(',', $columns);

			foreach ($col as $item)
			{
				if ($item)
					$value[] = $this->stQuotes(trim($item));
			}
			$columns = implode(', ', $value);
		}

		return $columns;
	}

	public function select($columns='*')
	{
		$this->select = 'SELECT '.$this->selectQuery($columns);

		return $this;
	}

	public function selectDistinct($columns='*')
	{
		$this->selectDistinct = 'SELECT DISTINCT '.$this->selectQuery($columns);

		return $this;
	}


	//from('tbl_user, tbl_profile')
	public function from($table)
	{
		$tabs = explode(',', $table);

		foreach ($tabs as $val)
		{
			$vals[] = $this->stQuotes(trim($val));
		}

		$this->from = ' FROM '.implode(', ', $vals);
		return $this;
	}

	// ORDER BY `name`, `id` DESC
	//order('name, id', desc')
	public function order($fields, $sort)
	{
		$fieldsArray = explode(',', $fields);

		foreach ($fieldsArray as $val)
		{
			$vals[] = $this->stQuotes(trim($val));
		}
		$sort = strtoupper($sort);
		$this->order = ' ORDER BY '.implode(', ', $vals)." $sort";
		return $this;
	}


	// WHERE id=:id1
	// where('id=:id1 or id=:id2', array(':id1'=>1))
	// WHERE id=:id1 or id=:id2
	// where('id=:id1 or id=:id2', array(':id1'=>1, ':id2'=>2))
	public function where($conditions, $params=array())
	{
		foreach ($params as $key=>$val)
		{
			$this->pdo->bindParam($key, $val);
		}
		$this->where = ' WHERE '.$conditions;
	}


	// GROUP BY `name`, `id`
	//group('name, id')
	public function group($columns)
	{

	}


}