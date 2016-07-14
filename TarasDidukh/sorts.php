<?php 
	$values = array(
		array(5,11,18,1,4),
		array(10,7,9,8,6),
		array(3,15,12,14,13),
		array(19,20,17,2,16));
	echo 'Sart array:<br>';
	echo printArray($values);
 //    $sorted1 = horizontalSort($values);
	// echo '<br>Sorted-1 array:<br>';
	// echo printArray($sorted1);

	function printArray($arr) {
		foreach ($arr as $keys) {
			foreach ($keys as $key) {
				printf("%04s", $key . '  ');
			}
			echo '<br>';
		}
	}

	// function horizontalSort($arr) {
	// 	$horizontalLenght = count($arr[0]);
	// 	$verticalLength = count($arr);
	// 	$length = $horizontalLenght * $verticalLength;
	// 	for ($i = 0; $i < $length - 1; ++$i) 
	// 		for ($k = 0; $k < $verticalLength; ++$k) 
	// 			for ($c = 0; $c < $horizontalLenght; ++$c)
	// 				if ($arr[$k][$c % $horizontalLenght + 1] < $arr[$k][$c]) {
	// 	                $swap = $arr[$i][$j];
	// 	                $arr[$i][$j] = $arr[$k][$c];
	// 	                $arr[$k][$c] = $swap;
	// 	            }
	// 	return $arr;
	// }
	// function ascendingVerticaleSort($arr) {
	// 	for ($i = 0, $length1 = count($arr); $i < $length1; ++$i) 
	// 		for ($j = 0, $length2 = count($arr[0]); $j < $length2 - 1; ++$j)
	// 			for ($k = $i; $k < $length1; ++$k) 
	// 				for ($c = $j+1; $c < $length2; ++$c)
	// 					if ($arr[$i][$j] > $arr[$k][$c]) {
	// 		                $swap = $arr[$i][$j];
	// 		                $arr[$i][$j] = $arr[$k][$c];
	// 		                $arr[$k][$c] = $swap;
	// 		                // echo $swap . '  -  ';
	// 		            }
	// 	return $arr;
	// }
	echo 10 / 4;
?>