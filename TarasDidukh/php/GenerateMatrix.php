<?php

class GenerateMatrix
{
    public function generateRandom($matrix)
    {
        for ($i = 0; $i < $matrix->getRows(); $i++) {
            for ($j = 0; $j < $matrix->getColumns(); $j++) {
                $matrix->getMatrix()[$i][$j] = rand(0, 99);
            }
        }
    }
    
    public function generateSimpleNumbers($matrix) 
    {
        for ($i = 0; $i < $matrix->getRows(); $i++) {
            for ($j = 0; $j < $matrix->getColumns(); $j++) {
                
                $n = 0;
                
                while (true) {
                    
                    $n = rand(2, 99);
                    $end = round( sqrt($n) ) + 1;
                    $k = 2;
                    
                    for (; $k < $end; $k++) {
                        if ($n % $k == 0) {
                            break;
                        }
                    }
                    
                    if ($k >= $end) {
                        break;
                    }
                }
                
                $matrix->getMatrix()[$i][$j] = $n; 
            }
        }
    }
}
