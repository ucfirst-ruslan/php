<?php

include_once 'services/UrlSendService.php';
include_once 'services/ParseGoogleService.php';

class Model
{
	private $array;

	public function __construct()
	{
		$this->array['%TITLE%'] = 'Search';
		$this->array['%REQUEST%'] = $_POST['search'];
	}

	public function getArray()
	{

		return $this->array;
	}

	public function sendRequest()
	{
		$pageSearch = new UrlSendService();

		$page = $pageSearch->getSearchPage($_POST['search']);

		if($page)
		{
			$this->getPage($page);
		}
		else
		{
			throw new Exception(ERROR_GET_PAGE);
		}

		return true;
	}

	private function getPage($content)
	{
		$pageParse = new ParseGoogleService();

		$this->array['%CONTENT%'] = $pageParse->parse($content);

		return true;
	}
}
