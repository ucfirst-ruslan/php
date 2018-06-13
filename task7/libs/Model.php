<?php 
include_once 'validModel.php';
include_once 'helpers/htmlHelpers.php';

class Model
{ 
	private $select;
	
	public function __construct()
	{
		$this->select = [];
	}
   	
	public function getArray()
   {	    
		return array(
		'%TITLE%'=>'Contact Form', 
		'%ERRORS%'=>'Empty field',
		'%ERR_NAME%'=> 'Error name',
		'%ERR_EMAIL%'=> 'Error email',
		'%ERR_DEP%'=> 'Error departure',
		'%ERR_MESS%'=> 'Error message',
		'%FIELD_NAME%'=> '',
		'%FIELD_EMAIL%'=> '',
		'%SELECT%'=> $this->select,
		'%FIELD_MESS%'=> ''
		);	
   }
	
	public function checkForm()
	{
		$valid = new ValidModel();
		
		return true;			
	}
   
	public function sendEmail()
	{
		// return mail()
	}

	private function 
}
