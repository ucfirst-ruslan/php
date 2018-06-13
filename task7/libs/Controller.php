<?php

class Controller
{
		private $model;
		private $view;

		public function __construct()
		{
echo'<pre>';
var_dump($_POST);
echo'</pre>';

		    $this->model = new Model();
			$this->view = new View(TEMPLATE);

			$this->model->array();
				
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
			}
			else
			{

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
