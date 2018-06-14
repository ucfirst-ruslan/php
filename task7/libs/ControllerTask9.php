<?php
include ('libs/ModelTask9.php');

class ControllerTask9
{
	public function __construct()
	{
		$this->model = new ModelTask9();
		$this->view = new View(TEMPLATE_TASK9);

		$this->page();
	}

	private function page()
	{
		$mArray = $this->model->getArray();

		$this->view->addToReplace($mArray);

		$this->view->templateRender();
	}


}