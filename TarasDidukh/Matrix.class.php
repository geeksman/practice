<?php 

require('Vector.class.php');

class Matrix extends Vector
{
	private $matrix;
	private $columns;
	private $rows;

	public function __construct() 
	{
		parent::__construct();
		$this->matrix = array();
	}

	public function setMatrixSize($rows, $columns) 
	{
		$this->columns = $columns;
		$this->rows = $rows;
		for ($i = 0; $i < $this->rows; $i++) {
			$this->matrix[$i] = array();
		}
	}

	public function getRows() 
	{
		return $this->rows;
	}

	public function getColumns() 
	{
		return $this->columns;
	}

	public function printMatrix() 
	{
		foreach ($this->matrix as $keys) {
			foreach ($keys as $key) {
				printf("%04s", $key . '  ');
			}
			echo '<br>';
		}
	}

	public function copyMatrixToVector() 
	{
		$this->size = $this->columns * $this->rows;
		$k = 0;
		foreach ($this->matrix as $keys) {
			foreach ($keys as $key) {
				$this->arr[$k++] = $key;
			}
			echo '<br>';
		}
	}

	public function copyVectorToMatrix() 
	{
		$k = 0;
		for ($i = 0; $i < $this->rows; $i++) {
			for ($j = 0; $j < $this->columns; $i++) {
				$this->matrix[$i][$j] = $this->arr[$k++];
			}
		}
	}

	public function horizontalSort() 
	{
		$length = $this->rows * $this->columns;
		for ($i = 0; $i < $length - 1; ++$i) {
			for ($j = 0; $j < $length - 1; ++$j) {
				if ($this->matrix[$j / $this->columns][$j % $this->columns] > $this->matrix[($j + 1) / $this->columns][($j + 1) % $this->columns]) {
					$swap = $this->matrix[$j / $this->columns][$j % $this->columns];
					$this->matrix[$j / $this->columns][$j % $this->columns] = $this->matrix[($j + 1) / $this->columns][($j + 1) % $this->columns];
					$this->matrix[($j + 1) / $this->columns][($j + 1) % $this->columns] = $swap;
				}
			}
		}
	}

	public function ascendingVerticaleSort()
	{
		$length = $this->rows * $this->columns;
		for ($i = 0; $i < $length - 1; ++$i) {
			for ($j = 0; $j < $length - 1; ++$j) {
				if ($this->matrix[$j % $this->rows][$j / $this->rows] > $this->matrix[($j + 1) % $this->rows][($j + 1) / $this->rows]) {
					$swap = $this->matrix[$j % $this->rows][$j / $this->rows];
					$this->matrix[$j % $this->rows][$j / $this->rows] = $this->matrix[($j + 1) % $this->rows][($j + 1) / $this->rows];
					$this->matrix[($j + 1) % $this->rows][($j + 1) / $this->rows] = $swap;
				}
			}
		}
	}

	public function descendingVerticalSort() 
	{
		$length = $this->rows * $this->columns;
		for ($i = 0; $i < $length - 1; ++$i) {
			for ($j = $length - 1; $j > 0; --$j) {
				if ($this->matrix[$j % $this->rows][$j / $this->rows] > $this->matrix[($j - 1) % $this->rows][($j - 1) / $this->rows]) {
					$swap = $this->matrix[$j % $this->rows][$j / $this->rows];
					$this->matrix[$j % $this->rows][$j / $this->rows] = $this->matrix[($j - 1) % $this->rows][($j - 1) / $this->rows];
					$this->matrix[($j - 1) % $this->rows][($j - 1) / $this->rows] = $swap;
				}
			}
		}
	}

	function snakeSort($matrix) 
	{
		$this->horizontalSort();
		for ($i = 1; $i < $this->rows; $i += 2) {
			for ($j = 0; $j < $this->columns / 2; ++$j) {
				$swap = $this->matrix[$i][$j];
				$this->matrix[$i][$j] = $this->matrix[$i][$columns - $j - 1];
				$this->matrix[$i][$columns - $j - 1] = $swap;
			}
		}
	}	

	function diagonalSort($matrix) 
	{
		$length = $this->rows * $this->columns;
		$this->setSize($length);
		$this->copyMatrixToVector();
		sort($this->arr);

		$i = 0;
		$j = 0;
		$k = 0;
		$flag = 0;
		$fromArray = 0;
		while($j != $this->columns) {
			while ($i >= 0 && $j <= $this->columns - 1) {
				$this->matrix[$i][$j] = $this->arr[$fromArray++];
				$i--; $j++;
			}
			$i = $j;
			$j = 0;
			if ($i >= $this->rows - 1) {
				$flag++;
			}
			if ($flag >= 2) {
				$k++;
				$i = $this->rows - 1;
				$j += $k;
			}
		}
	}

	function ascendingSnailSort() 
	{		
		$length = $rows * $columns;
		$this->setSize($length);
		$this->copyMatrixToVector();
		sort($this->arr);

		$k = 0;
		for ($c = 0; $c < $this->columns; ++$c) {
			$this->matrix[0][$c] = $this->arr[$k++];
		}

		$direction = 1;
		$i = 0; 
		$j = $this->columns - 1;
		$iStop = $rows - 1;
		$jStop = $this->columns - 1;
		$h = 0;

		while ($k < $this->columns * $rows) {
			switch ($direction) {
				case 1: //down
					for (; $h < $iStop; $h++) {
						$this->matrix[++$i][$j] = $this->arr[$k++];
					}
					$iStop--;
					break;
				case 2: // left
					for (; $h < $jStop; $h++) {
						$this->matrix[$i][--$j] = $this->arr[$k++];
					}
					$jStop--;
					break;
				case 3: // up
					for (; $h < $iStop; $h++) {
						$this->matrix[--$i][$j] = $this->arr[$k++];
					}
					$iStop--;
					break;
				case 4: // right
					for (; $h < $jStop; $h++) {
						$this->matrix[$i][++$j] = $this->arr[$k++];
					}
					$jStop--;
					break;
			}
			$direction = $direction % 4 + 1;
			$h = 0;
		}
	}

	function descendingSnailSort() {
		$length = $this->rows * $this->columns;
		$this->setSize($length);
		$this->copyMatrixToVector();
		sort($this->arr);

		$k = count($this->arr) - 1;
		for ($c = 0; $c < $this->columns; ++$c) {
			$this->matrix[0][$c] = $this->arr[$k--];
		}

		$direction = 1;
		$i = 0; 
		$j = $this->columns - 1;
		$iStop = $rows - 1;
		$jStop = $this->columns - 1;
		$h = 0;

		while ($k >= 0) {
			switch ($direction) {
				case 1: //down
					for (; $h < $iStop; $h++) {
						$this->matrix[++$i][$j] = $this->arr[$k--];
					}
					$iStop--;
					break;
				case 2: // left
					for (; $h < $jStop; $h++) {
						$this->matrix[$i][--$j] = $this->arr[$k--];
					}
					$jStop--;
					break;
				case 3: // up
					for (; $h < $iStop; $h++) {
						$this->matrix[--$i][$j] = $this->arr[$k--];
					}
					$iStop--;
					break;
				case 4: // right
					for (; $h < $jStop; $h++) {
						$this->matrix[$i][++$j] = $this->arr[$k--];
					}
					$jStop--;
					break;
			}
			$direction = $direction % 4 + 1;
			$h = 0;
		}
	}
}