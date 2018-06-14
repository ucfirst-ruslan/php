<?php
include ('config.php');
include ('libs/Controller.php');
include('libs/task9Controller.php');
include ('libs/View.php');
include ('libs/Model.php');
try
{
	if (9 == $_GET['task'])
		$obj = new Task9Controller();
	else
		$obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}






