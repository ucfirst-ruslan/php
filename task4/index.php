<?php

include_once 'libs/config.php';
include_once 'libs/baseDb.php';
include_once 'libs/mysql.php';
include_once 'libs/pgsql.php';

$mysql = new Mysql();

//Insert Mysql
$values = array('userid'=>'user10', 'userdata'=>'Some text');
$mysqlInsertId = $mysql->insert($values);
if ($mysqlInsertId)
{
    $mysqlInsertId = 'Insert in Mysql table: #'.$mysqlInsertId;
}

//Delete Mysql
$where = array('userdata'=>'Some text');
$mysqlDeleteRows = $mysql->delete($where);
if ($mysqlDeleteRows)
{
    $mysqlDeleteRows = 'Delete row(s) in Mysql table: #'.$mysqlDeleteRows;
}

$set = array('userdata'=>"Some other text");
$values = array('userid'=>'user10');
$mysql->update($set, $values);
if ($mysqlDeleteRows)
{
    $mysqlDeleteRows = 'Delete row(s) in Mysql table: #'.$mysqlDeleteRows;
}
//$mysql->setSelect = 'userid';
//$where = array('id'=>5);
//
//print_r($mysql->select('*', $where));
//
//$values = array('genre'=>5);
//$mysql->insert($values);
//
//$values = array('id'=>7);
//$mysql->delete($values);
