<?php
    abstract class AbstractClass 
    {
        private $a = array(array(9, 4, 3, 32, 19),
		    array(1, 93, 29, 12, 4),
		    array(22, 11, 33, 45, 1),
			array(9, 7, 4, 3, 5),
			array(0, 23, 14, 18, 20)
        );

        public function printMatrix()
        {
        	for($i = 0; $i < count($a); $i++) {
        		for($j = 0; $j < count($a[$i]); $j++) {
        			echo $a[$i][$j] . ' ';
        		}
        		echo '<br>';
        	}
        }

        public function printVector($v)
        {
          for ($i=0; $i < count($v); $i++) {
            echo $v[$i] . ' ';
          }
        	echo '<br>';
        }

        public function copyInVector()
        {
        	$copy = [];
        	for($i = 0; $i < count($a); $i++) {
        		for($j = 0; $j < count($a[$i]); $j++) {
              array_push($copy, $a[$i][$j]);
        		}
        	}
        	return $copy;
        }
    }
