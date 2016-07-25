<?php
    require_once 'BaseMatrixClass.php';

    class SnailSort extends BaseMatrixClass
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
            $tb = 0;
            $bb = count($this->a) - 1;
            $lb = 0;
            $rb = count($this->a[0]) - 1;
            $dir = 0;
            for ($k = 0; $k < count($copy); $k++)
            {
                $this->a[$i][$j] = $copy[$k];
                switch ($dir)
                {
                    case 0:
                        $j++;
                        if($j == $rb) {
                            $dir = 1;
                            $tb++;
                        }
                        break;
                    case 1:
                        $i++;
                        if($i == $bb) {
                            $dir = 2;
                            $rb--;
                        }
                        break;
                    case 2:
                        $j--;
                        if($j == $lb) {
                            $dir = 3;
                            $bb--;
                        }
                        break;
                    case 3:
                        $i--;
                        if($i == $tb) {
                            $dir = 0;
                            $lb++;
                        }
                        break;
                }
            }
            
            return $this->a;
        }
        public function sortMethod()
        {
            $copy = $this->copyInVector();
            if ($this->typeSort == 4) {
                sort($copy);
            } elseif($this->typeSort == 5) {
                rsort($copy);
            }
            $this->a = $this->copyInMatrix($copy);
            return $this->a;
        }
    }
