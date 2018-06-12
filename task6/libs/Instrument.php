<?php

include_once 'iInstrument.php';


class Instrument implements iInstrument
{
	private $nameInstrument;
	private $categoryInstrument;


	public function getName()
	{
		return $this->nameInstrument;
	}

	public function getCategory()
	{
		return $this->categoryInstrument;
	}

	public function setName($name)
	{
		$this->nameInstrument = $name;
	}

	public function setCategory($category)
	{
		$this->categoryInstrument = $category;
	}
}