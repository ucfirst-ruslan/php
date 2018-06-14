<?php
include ('libs/Task9Model.php');

class Task9Controller
{
	public function __construct()
	{
		$this->model = new Task9Model();
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