<?php

class Controller
{
		private $model;
		private $view;

		public function __construct()
		{
		    $this->model = new Model();
			$this->view = new View(TEMPLATE);	
				
			if(isset($_POST['email']))
			{	
				$this->pageSendMail();
			}
			else
			{
				$this->pageDefault();	
			}
			
			$this->view->templateRender();			
	    }	
		
		private function pageSendMail()
		{
			if($this->model->checkForm() === true)
			{
				$this->model->sendEmail();
				header("Location: index.php");

			}

			$mArray = $this->model->getArray();		
	        $this->view->addToReplace($mArray);	
		}	
			    
		private function pageDefault()
		{   
		   $mArray = $this->model->getArray();		
	       $this->view->addToReplace($mArray);			   
		}				
}
