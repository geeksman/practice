<?php
    abstract class BaseClassAbstract extends PrintMatrix
    {
        protected $min_i;
        protected $min_j;
        
        abstract protected function Sort();
        abstract protected function Min($var1, $var2, $var3, $var4);
        
    	public function CreateMatrix($gen)
        {
            $oneRow = array($this->m);
            if ($gen == 'Rand') {
                for ($i = 0; $i < $this->n; $i++){
                    for ($j = 0; $j < $this->m; $j++){
                        $oneRow[$j] = rand(1, 99);
                    }
                    $this->matrix[$i] = $oneRow;
                }
            } else {
                $simpleNummbers = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 
                    37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97);
                for ($i = 0; $i < $this->n; $i++){
                    for ($j = 0; $j < $this->m; $j++){
                        $oneRow[$j] = $simpleNummbers[rand(0, 24)];
                    }
                    $this->matrix[$i] = $oneRow;
                }
            }
        }
        
        protected function Swap($i, $j, $min)
        {
            $tmp = $this->matrix[$i][$j];
            $this->matrix[$i][$j] = $min;
            $this->matrix[$this->min_i][$this->min_j] = $tmp;
        }
    }