<?php

namespace botan\app\sorts;
require_once('../vendor/autoload.php');

class DiagonalSort extends BaseMatrix 
{
    public function __construct() 
    {
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

        $i = 0;
        $j = 0;
        $k = 0;
        $flag = 0;
        $fromArray = 0;
        
        while ($j != $this->columns) {
            while ($i >= 0 && $j <= $this->columns - 1) {
                $this->matrix[$i][$j] = $arr[$fromArray++];
                $i--;
                $j++;
            }
            
            $i = $j;
            $j = 0;
            
            if ($i >= $this->rows - 1) {
                $flag++;
            }
            
            if ($flag >= 2) {
                $k++;
                $i = $this->rows - 1;
                $j += $k;
            }
        }
    }
}
