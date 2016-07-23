<?php 

require_once('BaseMatrix.php');
    
class VerticalSort extends BaseMatrix 
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
                if ($this->matrix[$j % $this->rows][$j / $this->rows] > $this->matrix[($j + 1) % $this->rows][($j + 1) / $this->rows]) {
                    $swap = $this->matrix[$j % $this->rows][$j / $this->rows];
                    $this->matrix[$j % $this->rows][$j / $this->rows] = $this->matrix[($j + 1) % $this->rows][($j + 1) / $this->rows];
                    $this->matrix[($j + 1) % $this->rows][($j + 1) / $this->rows] = $swap;
                }
            }
        }
    }
    
    public function dsort() 
    {
        $length = $this->rows * $this->columns;
        for ($i = 0; $i < $length - 1; ++$i) {
            for ($j = $length - 1; $j > 0; --$j) {
                if ($this->matrix[$j % $this->rows][$j / $this->rows] > $this->matrix[($j - 1) % $this->rows][($j - 1) / $this->rows]) {
                    $swap = $this->matrix[$j % $this->rows][$j / $this->rows];
                    $this->matrix[$j % $this->rows][$j / $this->rows] = $this->matrix[($j - 1) % $this->rows][($j - 1) / $this->rows];
                    $this->matrix[($j - 1) % $this->rows][($j - 1) / $this->rows] = $swap;
                }
            }
        }
    }
}
