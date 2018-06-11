<?php

include_once 'iInstrument.php';


class Instrument implements iInstrument
{
	private $name;
	private $category;


	public function getName()
	{
		return $this->name;
	}

	public function getCategory()
	{
		return $this->category;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setCategory($category)
	{
		$this->category = $category;
	}
}