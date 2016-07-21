
<!-- ВСІ СОРТУВАННЯ КРІМ РАВЛИКОМ -->

<?php 
$values = array(
	array(5,11,18,1,4),
	array(10,7,9,8,6),
	array(3,15,12,14,13),
	array(19,20,17,2,16)
);
// $values = array(
// 	array(5,11,18),
// 	array(10,7,9),
// 	array(3,15,12)
// );

echo 'Sart array:<br>';
echo printArray($values);

$sorted1 = horizontalSort($values);
echo '<br>Sorted-1 array:<br>';
echo printArray($sorted1);

$sorted2 = ascendingVerticaleSort($values);
echo '<br>Sorted-2 array:<br>';
echo printArray($sorted2);

$sorted4 = ascendingSnailSort($values);
echo '<br>Sorted-4 array:<br>';
echo printArray($sorted4);

$sorted5 = descendingSnailSort($values);
echo '<br>Sorted-5 array:<br>';
echo printArray($sorted5);

$sorted3 = descendingVerticalSort($values);
echo '<br>Sorted-3 array:<br>';
echo printArray($sorted3);

$sorted7 = snakeSort($values);
echo '<br>Sorted-7 array:<br>';
echo printArray($sorted7);

$sorted6 = diagonalSort($values);
echo '<br>Sorted-6 array:<br>';
echo printArray($sorted6);

function printArray($matrix) 
{
	foreach ($matrix as $keys) 
	{
		foreach ($keys as $key) 
		{
			printf("%04s", $key . '  ');
		}
		echo '<br>';
	}
}

function horizontalSort($matrix) 
{
	$columns = count($matrix[0]);
	$rows = count($matrix);
	$length = $rows * $columns;
	for ($i = 0; $i < $length - 1; ++$i) 
	{
		for ($j = 0; $j < $length - 1; ++$j) 
		{
			if ($matrix[$j / $columns][$j % $columns] > $matrix[($j + 1) / $columns][($j + 1) % $columns]) 
			{
				$swap = $matrix[$j / $columns][$j % $columns];
				$matrix[$j / $columns][$j % $columns] = $matrix[($j + 1) / $columns][($j + 1) % $columns];
				$matrix[($j + 1) / $columns][($j + 1) % $columns] = $swap;
			}
		}
	}
	return $matrix;
}

function ascendingVerticaleSort($matrix)
{
	$columns = count($matrix[0]);
	$rows = count($matrix);
	$length = $rows * $columns;
	for ($i = 0; $i < $length - 1; ++$i) 
	{
		for ($j = 0; $j < $length - 1; ++$j) 
		{
			if ($matrix[$j % $rows][$j / $rows] > $matrix[($j + 1) % $rows][($j + 1) / $rows]) 
			{
				$swap = $matrix[$j % $rows][$j / $rows];
				$matrix[$j % $rows][$j / $rows] = $matrix[($j + 1) % $rows][($j + 1) / $rows];
				$matrix[($j + 1) % $rows][($j + 1) / $rows] = $swap;
			}
		}
	}
	return $matrix;
}

function descendingVerticalSort($matrix) 
{
	$columns = count($matrix[0]);
	$rows = count($matrix);
	$length = $rows * $columns;
	for ($i = 0; $i < $length - 1; ++$i) 
	{
		for ($j = $length - 1; $j > 0; --$j) 
		{
			if ($matrix[$j % $rows][$j / $rows] > $matrix[($j - 1) % $rows][($j - 1) / $rows]) 
			{
				$swap = $matrix[$j % $rows][$j / $rows];
				$matrix[$j % $rows][$j / $rows] = $matrix[($j - 1) % $rows][($j - 1) / $rows];
				$matrix[($j - 1) % $rows][($j - 1) / $rows] = $swap;
			}
		}
	}
	return $matrix;
}

function snakeSort($matrix) 
{
	$matrix = horizontalSort($matrix);
	$columns = count($matrix[0]);
	$rows = count($matrix);
	for ($i = 1; $i < $rows; $i += 2) 
	{
		for ($j = 0; $j < $columns / 2; ++$j) 
		{
			$swap = $matrix[$i][$j];
			$matrix[$i][$j] = $matrix[$i][$columns - $j - 1];
			$matrix[$i][$columns - $j - 1] = $swap;
		}
	}
	return $matrix;
}	

function diagonalSort($matrix) 
{
	$arr = array();
	$columns = count($matrix[0]);
	$rows = count($matrix);
	$length = $rows * $columns;
	for ($i = 0; $i < $length; ++$i) 
	{
		$arr[$i] = $matrix[$i / $columns][$i % $columns];
	}
	sort($arr);

	$i = 0;
	$j = 0;
	$k = 0;
	$flag = 0;
	$fromArray = 0;
	while($j != $columns) 
	{
		while ($i >= 0 && $j <= $columns - 1) 
		{
			$matrix[$i][$j] = $arr[$fromArray++];
			$i--; $j++;
		}
		$i = $j;
		$j = 0;
		if ($i >= $rows - 1) 
		{
			$flag++;
		}
		if ($flag >= 2) {
			$k++;
			$i = $rows - 1;
			$j += $k;
		}
	}
	return $matrix;
}

function ascendingSnailSort($matrix) 
{
	$arr = array();
	$columns = count($matrix[0]);
	$rows = count($matrix);
	$length = $rows * $columns;

	for ($i = 0; $i < $length; ++$i) {
		$arr[$i] = $matrix[$i / $columns][$i % $columns];
	}
	sort($arr);

	$k = 0;
	for ($c = 0; $c < $columns; ++$c) {
		$matrix[0][$c] = $arr[$k++];
	}

	$direction = 1;
	$i = 0; 
	$j = $columns - 1;
	$iStop = $rows - 1;
	$jStop = $columns - 1;
	$h = 0;

	while ($k < $columns * $rows) {
		switch ($direction) {
			case 1: //down
				for (; $h < $iStop; $h++) {
					$matrix[++$i][$j] = $arr[$k++];
				}
				$iStop--;
				break;
			case 2: // left
				for (; $h < $jStop; $h++) {
					$matrix[$i][--$j] = $arr[$k++];
				}
				$jStop--;
				break;
			case 3: // up
				for (; $h < $iStop; $h++) {
					$matrix[--$i][$j] = $arr[$k++];
				}
				$iStop--;
				break;
			case 4: // right
				for (; $h < $jStop; $h++) {
					$matrix[$i][++$j] = $arr[$k++];
				}
				$jStop--;
				break;
		}
		$direction = $direction % 4 + 1;
		$h = 0;
	}
	return $matrix;
}

function descendingSnailSort($matrix) {
	$arr = array();
	$columns = count($matrix[0]);
	$rows = count($matrix);
	$length = $rows * $columns;

	for ($i = 0; $i < $length; ++$i) {
		$arr[$i] = $matrix[$i / $columns][$i % $columns];
	}
	sort($arr);

	$k = count($arr) - 1;
	for ($c = 0; $c < $columns; ++$c) {
		$matrix[0][$c] = $arr[$k--];
	}

	$direction = 1;
	$i = 0; 
	$j = $columns - 1;
	$iStop = $rows - 1;
	$jStop = $columns - 1;
	$h = 0;

	while ($k >= 0) {
		switch ($direction) {
			case 1: //down
				for (; $h < $iStop; $h++) {
					$matrix[++$i][$j] = $arr[$k--];
				}
				$iStop--;
				break;
			case 2: // left
				for (; $h < $jStop; $h++) {
					$matrix[$i][--$j] = $arr[$k--];
				}
				$jStop--;
				break;
			case 3: // up
				for (; $h < $iStop; $h++) {
					$matrix[--$i][$j] = $arr[$k--];
				}
				$iStop--;
				break;
			case 4: // right
				for (; $h < $jStop; $h++) {
					$matrix[$i][++$j] = $arr[$k--];
				}
				$jStop--;
				break;
		}
		$direction = $direction % 4 + 1;
		$h = 0;
	}
	return $matrix;
}