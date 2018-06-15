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
				$this->pageSendRequest();
			}
			else
			{
				$this->pageDefault();	
			}
			
			$this->view->templateRender();			
	    }	
		
		private function pageSendRequest()
		{
			if($this->model->sendRequest() === true)
			{
				$this->model->getPage();
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
