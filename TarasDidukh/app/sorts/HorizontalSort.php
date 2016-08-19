<?php

namespace botan\app\sorts;

use botan\app\sorts\BaseMatrix;

class HorizontalSort extends BaseMatrix
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function sort() 
    {
        $length = $this->rows * $this->columns;
        $col = $this->columns;
        
        for ($i = 0; $i < $length - 1; ++$i) {
            for ($j = 0; $j < $length - 1; ++$j) {
                if ($this->matrix[$j / $col][$j % $col] > $this->matrix[($j + 1) / $col][($j + 1) % $col]) {
                    $swap = $this->matrix[$j / $col][$j % $col];
                    $this->matrix[$j / $col][$j % $col] = $this->matrix[($j + 1) / $col][($j + 1) % $col];
                    $this->matrix[($j + 1) / $col][($j + 1) % $col] = $swap;
                }
            }
        }
    }

}
