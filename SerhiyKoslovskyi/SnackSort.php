<?php
    require("AbstractClass.php");
    require("SortInterface.php");

    class SnackSort extends AbstractClass implements SortInterface
    {
        public function copyInMatrix($copy)
        {
            $i = 0;
        	$j = 0;
        	$dir = 0;
        	$mark = 0;
        	for ($k = 0; $k < count($copy); $k++) {
        		$a[$i][$j] = $copy[$k];
        		if($mark) {
        			if($mark == 1) {
        				$j++;
        			}elseif($mark == 2) {
        				$j--;
        			}
        			$i++;
        		}
        		switch($dir) {
        			case 0:
        				if($j < count($a[0]) - 1) {
        					$j++;
        					$mark = 0;
        					if ($j == count($a[0]) - 1) {
        						$dir = 1;
        						$mark = 1;
        					}
        				}
        				break;
        			case 1:
        				if($j > 0) {
        					$j--;
        					$mark = 0;
        					if ($j == 0) {
        						$dir = 0;
        						$mark = 2;
        					}
        				}
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
