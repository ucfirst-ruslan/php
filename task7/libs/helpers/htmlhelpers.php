<?php

class HtmlHelpers
{
	/**
	 * For task7
	 * @param $name
	 * @param $options
	 * @param $selected
	 * @return string
	 */
	public static function getDropdown($name, $options, $selected)
	{
		$select = '<select name="' . $name . '">';
		$select .= '<option selected disabled>Select department</option>';
		foreach ($options as $key => $val) {
			if ($selected != $key)
				$select .= '<option value="' . $key . '">' . $val . '</option>';
			else
				$select .= '<option selected value="' . $key . '">' . $val . '</option>';
		}

		$select .= '</select>';

		return $select;
	}

	/**
	 * Может работать аналогично предыдущему,
	 * но развернут до multiple
	 *
	 * @param $name string
	 * @param $selected string
	 * @param $data array
	 * @param $multi int
	 * @return string
	 */
	public static function getSelect($name, $data, $selected, $multi)
	{
		if (is_numeric($multi)) {
			$multiple = '" multiple size="' . $multi;
		}

		$select = '<select name="' . $name . $multiple . '">';
		foreach ($data as $key => $val) {
			if ($selected != $key)
				$select .= '<option value="' . $key . '">' . $val . '</option>';
			else
				$select .= '<option selected value="' . $key . '">' . $val . '</option>';
		}

		$select .= '</select>';

		return $select;
	}

	/**
	 * @param array $headData [1, 2, 3]
	 * @param array $datas ['0' => ['q', 'w', 'd']]
	 * @return string
	 */
	public static function getTable($headData, $datas)
	{
		$table = '<table>';

		//Заголовочные ячейки писать так['', 'q', 'w', 'd']
		$i = 1;
		if (!empty($headData)) {
			$table .= '<tr>';
			foreach ($headData as $val) {
				$table .= '<th>' . $val . '</th>';
				$i++;
			}
			$table .= '</tr>';
		}

		$a = 0;
		foreach ($datas as $data) {
			$table .= '<tr>';

			foreach ($data as $val) {

				if ($i >= $a)
					$table .= '<td>' . $val . '</td>';
				else
					continue;

				$a++;
			}
			$table .= '</tr>';
		}
		$table .= '</table>';

		return $table;
	}

	/**
	 * @param $type
	 * @param $data
	 * @return string
	 */
	public static function getList($type, $data)
	{
		//ol|ul | [ol, 'rever', 4]
		if (is_array($type) && $type[0] === 'ol')
		{
			$list = '<ol ';
			$listEnd = '</ol>';

			if ($type[1])
				$list .= 'reversed';

			if ($type[2])
				$list .= ' start='. $type[2].'"';
		}
		else if ($type === 'ol')
		{
			$list = '<ol';
			$listEnd = '</ol>';
		}
		else
		{
			$list = '<ul';
			$listEnd = '</ul>';
		}
		$list .= '>';

		foreach ($data as $val) {
			$list .= '<li>'.$val.'</li>';
		}

		$list .= $listEnd;

		return $list;
	}

	public static function getDefinitions(array $data)
	{
		$def = '<dl>';
		foreach ($data as $key => $val) {
			$def .= '<dt>'. $key .'</dt><dd>'. $val .'</dd>';
		}

		$def .= '</dl>';

		return $def;
	}

	//$type string radio|checkbox
	//$name string (имя группы радиокнопок)
	//$data array [key=>value]($key передается на сервер)
	//$check array [key=>check]('key' должен быть равен аналогичному значению из массива $data)
	public static function getRadio($type, $name, $data, $check = null)
	{
		$radio = '';
		$i=1;

		if ($type !== 'radio')
			$type = 'checkbox';

		foreach ($data as $key=>$val)
		{
			if ($key===$check) 
			{
				$radio .= '<input type="'.$type.'" checked id="choice'.$i.'" name="'.$name.'" value="'.$key. '">';
			}
			else
			{
				$radio .= '<input type="'.$type.'" id="choice'.$i.'" name="'.$name.'" value="'.$key.'">';
			}
			$radio .= '<label for="choice'.$i.'">'.$val.'</label><br>';
			$i++;
		}
		return $radio;
	}

}









