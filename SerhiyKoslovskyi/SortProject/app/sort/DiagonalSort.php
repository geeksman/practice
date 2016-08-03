<?php

    namespace gksmn\app\sort;
    use gksmn\app\sort\BaseMatrixClass as BC;
    use gksmn\app\output\OutPut;

    class DiagonalSort extends BC 
    {
       use OutPut; 
       
        public function __construct($row, $col, $type) 
        {
            parent::__construct($row, $col, $type);
        }
        
        protected function copyInMatrix($copy)
        {
            $i = 0;
            $i2 = 0;
            $j = 0;
            $j2 = 0;
            $dir = 0;
            $start = 0;
            for ($k = 0; $k < count($copy); $k++) {
                $this->a[$i][$j] = $copy[$k];
        	switch($dir) {
                    case 0:
                        if ($i > 0 && $i < count($this->a)) {
                            $i--;
                            $j++;
                            $start = $j;
                        } elseif ($i == 0 && $i < count($this->a)) {
                            $i = ++$start;
                            $j = 0;
        		}
        		if ($j == (count($this->a) - 1)) {
                            $dir = 1;
                            $i2 = count($this->a);
                            $j2 = 0;
                            $start = 1;
                        }
                        break;
                    case 1:
                        if ($j2 < count($this->a[0]) - 1) {
                            $i2--;
                            $j2++;
        		}elseif ($j2 == count($this->a[0]) - 1) {
                            $i2 = count($this->a) - 1;
                            $j2 = ++$start;
        		}
        		$i = $i2;
        		$j = $j2;
        		break;
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