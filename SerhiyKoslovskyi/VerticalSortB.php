<?php
    require("AbstractClass.php");
    require("SortInterface.php");

    class VecticalSortB extends AbstractClass implements SortInterface
    {
        public function copyInMatrix($copy)
        {
            $i = count($a) - 1;
        	$j = count($a[$i]) - 1;
        	for ($k = 0; $k < count($copy); $k++) {
            	$a[$j][$i] = $copy[$k];
        		$j--;
        		if ($j < 0 && $i > 0) {
        			$i--;
        			$j = count($a[$i]) - 1;
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
