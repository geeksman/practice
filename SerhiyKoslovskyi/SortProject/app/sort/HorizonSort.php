<?php

    namespace gksmn\app\sort;
    use gksmn\app\sort\BaseMatrixClass;
    use gksmn\app\output\OutPut;

    class HorizonSort extends BaseMatrixClass
    {
        use OutPut;
        
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