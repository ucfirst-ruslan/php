<?php

class ValidModel
{ 
 	
	protected function checkEmail()
    {	    
		return preg_match( '/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i',$_POST['email']);	
    }
	
	public function checkName()
	{
		$options = array(
			'options' => array(
                'min_range' => 3,
                'max_range' => 30,
            )
        );
        
        if (filter_var($_POST['name'], FILTER_VALIDATE_INT, $options) !== FALSE) 
        {
            return htmlspecialchars(trim($_POST['name']));
        }
		return false;			
	}
   
	public function checkSubj()
	{
		$options = array(
			'options' => array(
                'min_range' => 7,
                'max_range' => 10,
            )
        );
        
        if (filter_var($_POST['subj'], FILTER_VALIDATE_INT, $options) !== FALSE) 
        {
            return htmlspecialchars(trim($_POST['name']));
        }
		return false;
	}		
}