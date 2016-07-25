<?php
    require_once 'BaseMatrixClass.php';

    class VerticalSort extends BaseMatrixClass
    {
        private $typeSort;
        
        public function __construct($row, $col, $type, $typeSort) 
        {
            parent::__construct($row, $col, $type);
            $this->typeSort = $typeSort;
        }
        
        protected function copyInMatrix($copy)
        {
            $i = 0;
            $j = 0;
            for ($k = 0; $k < count($copy); $k++) {
                $this->a[$j][$i] = $copy[$k];
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
            if ($this->typeSort == 6) {
                sort($copy);
            } elseif($this->typeSort == 7) {
                rsort($copy);
            }
            $this->a = $this->copyInMatrix($copy);
            return $this->a;
        }
    }