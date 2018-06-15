<?php

include_once 'servises/UrlSendServise.php';
include_once 'servises/ParseGoogleServise.php';

class Model
{
	private $request;

	public function __construct()
	{
		$this->request = [];
	}

	public function getArray()
	{
		return array('%TITLE%' => 'Search', '%ERRORS%' => 'Empty field');
	}

	public function sendRequest()
	{
		$pageSearch = new UrlSendServise();

		$page = $pageSearch->getSearchPage($_POST['query']);

		if(is_array($page))
		{
			$this->request = $page;
		}
		else
		{
			throw new Exception(ERROR_GET_PAGE);
		}

		return true;
	}

	public function getPage()
	{
		$pageParse = new ParseGoogleServise();

		$parse = $pageParse->parse($this->request);




		// return mail()
	}
}
