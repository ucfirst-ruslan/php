<?php
include_once 'helpers/htmlhelpers.php';

class ModelTask9
{
	private $mArrey;

	public function __construct()
	{
		$this->mArrey = array(
			'%TITLE%'       => 'Task #9',
			'%ERRORS%'      => 'Empty field',
			'%SELECT%'      => $this->select(),
			'%ERR_NAME%'    => '',
			'%ERR_EMAIL%'   => '',
			'%ERR_DEP%'     => '',
			'%ERR_MESS%'    => '',
			'%ERR_DATE%'    => '',
			'%FIELD_NAME%'  => '',
			'%FIELD_EMAIL%' => '',
			'%FIELD_MESS%'  => '',
			'%MAIL_SEND%'   => '',
			'%MAIL_ERROR%'  => ''
		);
	}

	public function getArray()
	{
		return $this->mArrey;
	}

	private function select()
	{
		$selected = 'options_2';
		return HtmlHelpers::getSelect('multi', $this->selectArray(), $selected, 3);
	}

	private function selectArray()
	{
		return array(
			'options_1'  => 'Пункт 1',
			'options_2'  => 'Пункт 2',
			'options_3'  => 'Пункт 3',
			'options_4'  => 'Пункт 4',
			'options_5'  => 'Пункт 5'
		);
	}


}