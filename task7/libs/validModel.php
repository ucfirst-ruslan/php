<?php

class ValidModel
{ 
	private $error;
	
	public function __construct
	{
		$this->error = [];
	}	
 	
	public function getError()
	{
		return $this->error;
	}
	
	public function checkEmail($email)
    {	    
		if (preg_match( '/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i',$email))
		{
			return 	$email;
		}
		else
		{
			$this->error['email'] = ERROR_VALIDATE_EMAIL;
			return false;
		}
			
    }
	
	public function checkName($name)
	{
		$options = array(
			'options' => array(
                'min_range' => 3,
                'max_range' => 30,
            )
        );
        
        if (filter_var($name, FILTER_VALIDATE_INT, $options) !== FALSE) 
        {
            return htmlspecialchars(trim($name));
        }
		else
		{
			$this->error['name'] = ERROR_VALIDATE_NAME;
			return false;
		}	
	}
   
	public function checkSubj($subj)
	{
		$options = array(
			'options' => array(
                'min_range' => 7,
                'max_range' => 10,
            )
        );
        
        if (filter_var($subj, FILTER_VALIDATE_INT, $options) !== FALSE) 
        {
            return htmlspecialchars(trim($subj));
        }
		else
		{
			$this->error['subj'] = ERROR_VALIDATE_SUBJ;
			return false;
		}
	}	

	public function checkMessade($message)
	{
		$options = array(
			'options' => array(
            'min_range' => 3,
            'max_range' => 1000,
            )
        );
        
        if (filter_var($message, FILTER_VALIDATE_INT, $options) !== FALSE) 
        {
            return htmlspecialchars(trim($message));
        }
		else
		{
			$this->error['message'] = ERROR_VALIDATE_MESSAGE;
			return false;
		}
	}
	
		
}