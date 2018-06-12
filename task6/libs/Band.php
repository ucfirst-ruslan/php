<?php

include_once 'iBand.php';

class Band implements iBand
{
	private $nameBand;
	private $genreBand;

	private $allMusician;

	public function __construct()
	{
		$this->allMusician = [];
	}

	public function getName()
	{
		return $this->nameBand;
	}

	public function getGenre()
	{
		return $this->genreBand;
	}

	public function setName($nameBand)
	{
		$this->nameBand = $nameBand;
	}

	public function setGenre($genre)
	{
		$this->genreBand = $genre;
	}

	public function addMusician(iMusician $obj)
	{
		array_push($this->allMusician, $obj);
	}

	public function getMusician()
	{
		return $this->allMusician;
	}
}