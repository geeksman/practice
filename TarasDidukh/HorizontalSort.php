<?php

require_once('BaseMatrix.php');

class HorizontalSort extends BaseMatrix
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function sort() 
    {
        $length = $this->rows * $this->columns;
        for ($i = 0; $i < $length - 1; ++$i) {
            for ($j = 0; $j < $length - 1; ++$j) {
                if ($this->matrix[$j / $this->columns][$j % $this->columns] > $this->matrix[($j + 1) / $this->columns][($j + 1) % $this->columns]) {
                    $swap = $this->matrix[$j / $this->columns][$j % $this->columns];
                    $this->matrix[$j / $this->columns][$j % $this->columns] = $this->matrix[($j + 1) / $this->columns][($j + 1) % $this->columns];
                    $this->matrix[($j + 1) / $this->columns][($j + 1) % $this->columns] = $swap;
                }
            }
        }
    }

}
