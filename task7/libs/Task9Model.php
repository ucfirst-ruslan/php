<?php
include_once 'helpers/htmlhelpers.php';

class Task9Model
{
	private $mArrey;
	private $table;

	public function __construct()
	{
		$this->table = [];
		$this->tableArray();
		
		$this->mArrey = array(
			'%TITLE%'       => 'Task #9',
			'%SELECT%'      => $this->select(),
			'%TABLE%'    	=> $this->table(),
			'%LIST_UL%'     => $this->listOl(),
			'%LIST_OL%'     => $this->listUl(),
			'%DEF%'   		=> $this->def(),
			'%RADIO%'	    => $this->radio(),
			'%CHECKBOX%'  	=> $this->checkbox()
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
	
	private function table()
	{
		return HtmlHelpers::getTable($this->table['head'], $this->table['body']);
	}

	public function listOl()
	{
		$data = array('ol', 'rever', '10');
		return HtmlHelpers::getList($data, $this->listArray());
	}
	
	public function listUl()
	{
		return HtmlHelpers::getList('ul', $this->listArray());
	}
	
	private function def()
	{
		return HtmlHelpers::getDefinitions($this->defArrey());
	}
	
	public function radio()
	{
		return HtmlHelpers::getRadio('radio', 'radiobutton', $this->radioArray(), 'radio_3');
	} 
		
	public function checkbox()
	{
		return HtmlHelpers::getRadio('checkbox', 'checkbutton',$this->selectArray());
		
	}
	
	private function radioArray()
	{
		return array(
			'radio_1'  => 'Пункт 1',
			'radio_2'  => 'Пункт 2',
			'radio_3'  => 'Пункт 3'
		);
	}
	
	
	private function listArray()
	{
		return array('Пункт 1', 'Пункт 2', 'Пункт 3', 'Пункт 4', 'Пункт 5');
	}
	
	private function defArrey()
	{
		return array(
			'JPG'  => 'Формат для хранения изображений со сжатием',
			'TIFF'  => 'Формат для хранения изображений без сжатия'
		);
	}
	
	private function tableArray()
	{
		$this->table['head'] = array('Пункт 1', 'Пункт 2');
		$this->table['body'] = array('0' => array('ячейка 1', 'ячейка 2'),
									 '1' => array('ячейка 3', 'ячейка 4')
									 );
									 
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