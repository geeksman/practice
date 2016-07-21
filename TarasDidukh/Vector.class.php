<?php
abstract class Vector 
{
	protected $arr;
	protected $size;

	public function __construct() 
	{
		$this->arr = array();
	}

	public function setSize($size) 
	{
		$this->size = $size;
	}

	public function getSize() 
	{
		return $this->size;
	}

	public function initialVector($size) 
	{
		for ($i = 0; $i < $this->size; $i++) {
			$this->arr[$i] = rand(1,100);
		}
	}

	public function printVector() 
	{
		for ($i = 0; $i < $this->size; $i++) {
			printf("%04s", $this->arr[$i] . '  ');
		}
		echo "<br>";
	}

	abstract public function copyMatrixToVector();
	abstract public function copyVectorToMatrix();
}