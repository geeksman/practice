<?php

    require_once 'BaseMatrixClass.php';

    class HorizonSort extends BaseMatrixClass
    {
        public function __construct($row, $col, $type) 
        {
            parent::__construct($row, $col, $type);
        }
        
        protected function copyInMatrix($copy)
        {
            $i = 0;
            $j = 0;
            
            for ($k = 0; $k < count($copy); $k++) {
                $this->a[$i][$j] = $copy[$k];
        	$j++;
        	if ($j == count($this->a[$i])) {
                    $i++;
                    $j = 0;
        	}
            }
            
            return $this->a;
        }
        
        public function sortMethod()
        {
            $copy = $this->copyInVector();
            sort($copy);
            $this->a = $this->copyInMatrix($copy);
            return $this->a;
        }
    }