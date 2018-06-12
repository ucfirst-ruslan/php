<?php

class HtmlHelpers
{
	public static function getDropdown($name, $options, $selected)
	{
		$select = '<select name="'.$name.'">';
		$select .= '<option selected disabled>Select subj</option>';
			foreach ($options as $key=>$val)
			{
				if ($selected != $key)
					$select .= '<option value="'.$key.'">'.$val.'</option>';
				else
					$select .= '<option selected value="'.$key.'">'.$val.'</option>';
			}
		
		$select .= '</select>';
		
		return $select;
	}
	
	public static function getSelectMulti($name, $options, $selected)
	{
		if (4 < count($options))
			$size = 4;
		else 
			$size = 1;
		
		$select = '<select name="'.$name.'" multiple size="'.$size.'">';
			foreach ($options as $key=>$val)
			{
				if ($selected != $key)
					$select .= '<option value="'.$key.'">'.$val.'</option>';
				else
					$select .= '<option selected value="'.$key.'">'.$val.'</option>';
			}
		
		$select .= '</select>';
		
		return $select;
	}
	
	public static function getSelectMulti($headName, array$headData, array$datas)
	{
		$table = '<table>';
				
		//['', 'q', 'w', 'd']
		if (!empty($headData))
		{
			$table .= '<tr>';
			foreach ($headData as $val)
			{
				$table .= '<th>'.$val.'</th>';
			}
			$table .= '</tr>';
		}
		
		//['0' => ['q', 'w', 'd']]
		foreach ($datas as $data)
		{
			$table .= '<tr>';
				foreach ($data as $val)
				{
					$table .= '<td>'.$val.'</td>';
				}
			$table .= '</tr>';
		}
		$table .= '</table>';
		
		return $table;
	}
	
	public static function getList($type, $data)
	{
		//[ol, A, R, 2]
		//[ul, disc]
		if ($type[0] == 'ol')
		{
			$list = '<ol';
			$listEnd = '</ol>';
		}	
		else	
		{
			$list = '<ul';
			$listEnd = '</ul>';
		}
		
		
			
			
		$select = '<select name="'.$name.'">';
		$select .= '<option selected disabled>Select subj</option>';
			foreach ($options as $key=>$val)
			{
				if ($selected != $key)
					$select .= '<option value="'.$key.'">'.$val.'</option>';
				else
					$select .= '<option selected value="'.$key.'">'.$val.'</option>';
			}
		
		$select .= '</select>';
		
		return $select;
	}
	
}
<ol type="A | a | I | i | 1">...</ol>
<ol reversed>
<ol type="I" start="4">
<ol>
    <li>Чебурашка</li>
    <li>Крокодил Гена</li>
    <li>Шапокляк</li>
  </ol>

<ul type="disc | circle | square">...</ul>
<ul>
    <li>Чебурашка</li>
    <li>Крокодил Гена</li>
    <li>Шапокляк</li>
</ul>









