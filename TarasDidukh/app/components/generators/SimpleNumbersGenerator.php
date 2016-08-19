<?php

namespace botan\app\components\generators;

class SimpleNumbersGenerator
{
    public function generate($matrix) 
    {
        $_matrix = $matrix->getMatrix();
        
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
                
                $_matrix[$i][$j] = $n; 
            }
        }
        
        $matrix->setMatrix($_matrix);
    }
}
