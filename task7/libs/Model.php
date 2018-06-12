<?php 
//include_once 'validModel.php';
include_once 'helpers/htmlhelpers.php';

class Model
{ 
	private $error;
	
    public function __construct()
    {
		$this->error = '';
    }
   	
	public function getArray()
    {	$options = array(
                  'subj_1'  => SUBJ_1,
                  'subj_2'  => SUBJ_2,
                  'subj_3'  => SUBJ_3
                );;
		$name = 'subj';
		$select = HtmlHelpers::getDropdown($name, $options, $_POST['subj']);
		
		return array('%TITLE%'=>'Contact Form', 
					 '%ERRORS%'=>'Empty field',
					 '%SELECT%'=> $select
					 );	
    }
	
	public function checkForm()
	{
		/* $valid = new ValidModel();
		
		$email = $valid->checkEmail($_POST['email']);
		$name = $valid->checkName($_POST['name']);
		$subj = $valid->checkSubj($_POST['subj']);
		$message = $valid->checkMessade($_POST['message']);
		
		if (!empty($valid->getError()))
		{
			$this->error = $valid->getError();
			return false
		} */
		return true;			
	}
   
	public function sendEmail()
	{
		// return mail()
	}		
}
