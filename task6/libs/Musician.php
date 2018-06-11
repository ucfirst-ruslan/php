<?php

include_once 'iMusician.php';

class Musician implements iMusician
{
	private $instrument;
	private $instrumentCat;

	private $musicianType;

	public function addInstrument(iInstrument $obj)
	{
		$this->instrument = $obj->getName();
		$this->instrumentCat = $obj->getCategory();
	}

	public function getInstrument()
	{

	}

	public function assingToBand(iBand $nameBand)
	{

	}

	public function getMusicianType()
	{
		return $this->musicianType;
	}

	public function setMusicianType($type)
	{
		$this->musicianType = $type;
	}
}