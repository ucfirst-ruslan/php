<?php

class Controller
{
	private $model;
	private $view;

	public function __construct()
	{
		$this->model = new Model();


		if (isset($_POST['search']))
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
		$this->model->sendRequest();

		$this->view = new View(TEMPLATE_RESULT);

		$mArray = $this->model->getArray();

		$this->view->addToReplace($mArray);
	}

	private function pageDefault()
	{
		$this->view = new View(TEMPLATE);
		$mArray = $this->model->getArray();
		$this->view->addToReplace($mArray);
	}
}
