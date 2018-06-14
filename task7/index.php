<?php
include ('config.php');
include ('libs/Controller.php');
include ('libs/ControllerTask9.php');
include ('libs/View.php');
include ('libs/Model.php');
try
{
	if (9 == $_GET['task'])
		$obj = new ControllerTask9();
	else
		$obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}






