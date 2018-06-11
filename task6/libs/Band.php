<?php


class Band implements iBand
{
	private $nameBand;
	private $genreBand;

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

	}

	public function getMusician()
	{

	}
}