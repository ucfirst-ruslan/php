<?php


interface iLibSQL
{
    public function select ($table, $columns);
    public function insert ($table, array$updateArray);
    public function update ($table, array$insertArray);
    public function delete ($table);
	public function where($field, $value, $operator);

}