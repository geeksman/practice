<?php
    require("AbstractClass.php");
    require("SortInterface.php");

    class VecticalSortA extends AbstractClass implements SortInterface
    {
        public function copyInMatrix($copy)
        {
            $i = 0;
        	$j = 0;
        	for ($k = 0; $k < count($copy); $k++) {
            	$a[$j][$i] = $copy[$k];
        		$j++;
        		if ($j == count($a[$i])) {
        			$i++;
        			$j = 0;
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
