<?php 

namespace botan\app\sorts;
use botan\app\sorts\BaseMatrix;
    
class VerticalSort extends BaseMatrix 
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function sort() 
    {
        $length = $this->rows * $this->columns;
        $row = $this->matrix;
        
        for ($i = 0; $i < $length - 1; ++$i) {
            for ($j = 0; $j < $length - 1; ++$j) {
                if ($this->matrix[$j % $row][$j / $row] > $this->matrix[($j + 1) % $row][($j + 1) / $row]) {
                    $swap = $this->matrix[$j % $row][$j / $row];
                    $this->matrix[$j % $row][$j / $row] = $this->matrix[($j + 1) % $row][($j + 1) / $row];
                    $this->matrix[($j + 1) % $row][($j + 1) / $row] = $swap;
                }
            }
        }
    }
    
    public function dsort() 
    {
        $length = $this->rows * $this->columns;
        $row = $this->matrix;
        
        for ($i = 0; $i < $length - 1; ++$i) {
            for ($j = $length - 1; $j > 0; --$j) {
                if ($this->matrix[$j % $row][$j / $row] > $this->matrix[($j - 1) % $row][($j - 1) / $row]) {
                    $swap = $this->matrix[$j % $row][$j / $row];
                    $this->matrix[$j % $row][$j / $row] = $this->matrix[($j - 1) % $row][($j - 1) / $row];
                    $this->matrix[($j - 1) % $row][($j - 1) / $row] = $swap;
                }
            }
        }
    }
}
