<?php
    
    require_once 'BaseMatrixClass.php';

    class SnackSort extends BaseMatrixClass
    {
        public function __construct($row, $col, $type) 
        {
            parent::__construct($row, $col, $type);
        }
        
        protected function copyInMatrix($copy)
        {
            $i = 0;
            $j = 0;
            $dir = 0;
            $mark = 0;
            for ($k = 0; $k < count($copy); $k++) {
                $this->a[$i][$j] = $copy[$k];
        	if($mark) {
                    if($mark == 1) {
                        $j++;
                    } elseif($mark == 2) {
                        $j--;
                    }
                    $i++;
        	}
        	switch($dir) {
                    case 0:
                        if($j < count($this->a[0]) - 1) {
                            $j++;
                            $mark = 0;
                            if ($j == count($this->a[0]) - 1) {
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
