<?php

namespace botan\app\sorts;

use botan\app\sorts\BaseMatrix;
use botan\app\sorts\HorizontalSort;

class SnakeSort extends BaseMatrix
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function sort()
    {
        $tmp = new HorizontalSort();
        $tmp->setMatrix($this->matrix);
        $tmp->sort();

        $this->matrix = $tmp->getMatrix();

        for ($i = 1; $i < $this->rows; $i += 2) {
            for ($j = 0; $j < $this->columns / 2; ++$j) {
                $swap = $this->matrix[$i][$j];
                $this->matrix[$i][$j] = $this->matrix[$i][$this->columns - $j - 1];
                $this->matrix[$i][$this->columns - $j - 1] = $swap;
            }
        }
    }
}
