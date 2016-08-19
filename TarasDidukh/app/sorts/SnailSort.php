<?php

namespace botan\app\sorts;

use botan\app\sorts\BaseMatrix;

class SnailSort extends BaseMatrix
{
    public function __construct() {
        parent::__construct();
    }

    public function sort() 
    {
        $length = $this->rows * $this->columns;
        $arr = array();

        for ($i = 0; $i < $length; $i++) {
            $arr[$i] = $this->matrix[$i / $this->columns][$i % $this->columns];
        }

        sort($arr);

        $k = 0;
        for ($c = 0; $c < $this->columns; ++$c) {
            $this->matrix[0][$c] = $arr[$k++];
        }

        $direction = 1;
        $i = 0;
        $j = $this->columns - 1;
        $iStop = $this->rows - 1;
        $jStop = $this->columns - 1;
        $h = 0;

        while ($k < $this->columns * $this->rows) {
            switch ($direction) {
                case 1: //down
                    for (; $h < $iStop; $h++) {
                        $this->matrix[++$i][$j] = $arr[$k++];
                    }

                    $iStop--;
                    break;
                case 2: // left
                    for (; $h < $jStop; $h++) {
                        $this->matrix[$i][--$j] = $arr[$k++];
                    }

                    $jStop--;
                    break;
                case 3: // up
                    for (; $h < $iStop; $h++) {
                        $this->matrix[--$i][$j] = $arr[$k++];
                    }

                    $iStop--;
                    break;
                case 4: // right
                    for (; $h < $jStop; $h++) {
                        $this->matrix[$i][++$j] = $arr[$k++];
                    }

                    $jStop--;
                    break;
            }

            $direction = $direction % 4 + 1;
            $h = 0;
        }
    }
    
    public function dsort() 
    {
        $length = $this->rows * $this->columns;
        $arr = array();
        
        for ($i = 0; $i < $length; $i++) {
            $arr[$i] = $this->matrix[$i / $this->columns][$i % $this->columns];
        }
        
        sort($arr);

        $k = count($arr) - 1;
        
        for ($c = 0; $c < $this->columns; ++$c) {
            $this->matrix[0][$c] = $arr[$k--];
        }

        $direction = 1;
        $i = 0;
        $j = $this->columns - 1;
        $iStop = $this->rows - 1;
        $jStop = $this->columns - 1;
        $h = 0;

        while ($k >= 0) {
            switch ($direction) {
                case 1: //down
                    for (; $h < $iStop; $h++) {
                        $this->matrix[++$i][$j] = $arr[$k--];
                    }
                    
                    $iStop--;
                    break;
                case 2: // left
                    for (; $h < $jStop; $h++) {
                        $this->matrix[$i][--$j] = $arr[$k--];
                    }
                    
                    $jStop--;
                    break;
                case 3: // up
                    for (; $h < $iStop; $h++) {
                        $this->matrix[--$i][$j] = $arr[$k--];
                    }
                    
                    $iStop--;
                    break;
                case 4: // right
                    for (; $h < $jStop; $h++) {
                        $this->matrix[$i][++$j] = $arr[$k--];
                    }
                    
                    $jStop--;
                    break;
            }
            
            $direction = $direction % 4 + 1;
            $h = 0;
        }
    }
}
