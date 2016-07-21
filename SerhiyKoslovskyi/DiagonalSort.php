<?php
    require("AbstractClass.php");
    require("SortInterface.php");

    class DiagonalSort extends AbstractClass implements SortInterface
    {
        public function copyInMatrix($copy)
        {
            $i = 0;
        	$i2 = 0;
        	$j = 0;
        	$j2 = 0;
        	$dir = 0;
        	$start = 0;
        	for ($k = 0; $k < count($copy); $k++) {
                $a[$i][$j] = $copy[$k];
        		switch($dir) {
        			case 0:
        				if ($i > 0 && $i < count($a)) {
        					$i--;
        					$j++;
        					$start = $j;
        				}elseif ($i == 0 && $i < count($a)) {
        					$i = ++$start;
        					$j = 0;
        				}
        				if ($j == (count($a) - 1)) {
        					$dir = 1;
        					$i2 = count($a);
        					$j2 = 0;
        					$start = 1;
        				}
        				break;
        			case 1:
        				if ($j2 < count($a[0]) - 1) {
        					$i2--;
        					$j2++;
        				}elseif ($j2 == count($a[0]) - 1) {
        					$i2 = count($a) - 1;
        					$j2 = ++$start;
        				}
        				$i = $i2;
        				$j = $j2;
        				break;
        		}
        	}
        	return $a;
        }
        public function sortMethod()
        {
            $copy = copyInVector();
            sort($copy);
            $a = copyInMatrix($copy);
            return $a;
        }
    }
