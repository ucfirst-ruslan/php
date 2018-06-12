<?php

include_once 'iMusician.php';

class Musician implements iMusician
{
	private $allInstruments;

	private $musicianType;
	private $musicianName;
	//private $assingToBand;


	public function __construct()
	{
		$this->allInstruments = [];
	}

	public function addInstrument(iInstrument $obj)
	{
		array_push($this->allInstruments, $obj);
	}

	public function getInstrument()
	{
		return $this->allInstruments;
	}

	public function assingToBand(iBand $nameBand)
	{
		$nameBand->addMusician($this);
	}

	public function getMusicianType()
	{
		return $this->musicianType;
	}

	public function setMusicianType($type)
	{
		$this->musicianType = $type;
	}

	public function getMusicianName()
	{
		return $this->musicianName;
	}

	public function setMusicianName($musicianName)
	{
		$this->musicianName = $musicianName;
	}
}