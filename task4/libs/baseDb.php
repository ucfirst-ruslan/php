<?php

class BaseDb 
{
    protected $dbType;
    protected $db;  //user1
    protected $dsn;
    protected $pdo;
    protected $dbTable; //MY_TEST|PG_TEST

//    protected $select;
//    protected $where;
//    protected $set;

    public function __construct()
    {
        $dsn = $this->dbType.":host=".DB_HOST.";dbname=".$this->db;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    }


    public function select()
    {
        //Тут и далее сделано с жесткой привязкой к одному параметру в $where,
        //но заложено расширение функционала
        foreach ($this->where as $key => $value)
        {
            $wh = $key.' = ?';
            $param = $value;
        }

        $sql = 'SELECT '. $this->select .' FROM '.$this->dbTable.' WHERE '. $wh;

        $stm = $this->pdo->prepare($sql);
        $stm->bindParam(1, $param);
        $stm->execute();

        return $stm->fetch(PDO::FETCH_ASSOC);
    }


    public function update(array $set ,array $where)
    {
        foreach ($set as $key => $value)
        {
            $sets[] = $key.' = ?';
            $params[] = $value;
        }
        $sets = implode('; ', $sets);

        foreach ($where as $key => $value)
        {
            $whereSql = $key.'='.$value;
        }

        $sql = 'UPDATE '. $this->dbTable .' SET '.$sets.' WHERE '. $whereSql;
        echo $sql. '<br>'; var_dump($params);

        $stm = $this->pdo->prepare($sql);
        $stm->execute($params);

        return $stm->rowCount();
    }

    public function insert(array $values)
    {
        foreach ($values as $columns => $value)
        {
            $col[] = '`'.$columns.'`';
            $val[] = '?';
            $params[] = $value;
        }

        $cols = implode(', ', $col);
        $vals = implode(', ', $val);

        $sql = 'INSERT INTO '.$this->dbTable.' ('.$cols.') VALUES ('.$vals.')';

        $stm = $this->pdo->prepare($sql);
        $stm->execute($params);

        return $this->pdo->lastInsertId();
    }


    public function delete($where)
    {
        foreach ($where as $key => $value)
        {
            $wherePh = $key.' = ?';
            $val[] = $value;
        }

        $sql = 'DELETE FROM '.$this->dbTable.' WHERE '. $wherePh;

        $stm = $this->pdo->prepare($sql);
        $stm->execute($val);

        return $stm->rowCount();
    }

//    public function setSelect($select)
//    {
//        $this->select = $select;
//    }
//
//    public function setWhere(array $where = [])
//    {
//        $this->where = $where;
//    }
//
//    public function setSet($set)
//    {
//        $this->set = $set;
//    }
//
//    public function setValues(array $values = [])
//    {
//        $this->values = $values;
//    }



}

