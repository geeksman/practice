<?php

namespace botan\app\components\generators;

class RandomGenerator
{
    public function generate($matrix)
    {
        $_matrix = $matrix->getMatrix();
        $rows = $matrix->getRows();
        $columns = $matrix->getColumns();
        
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $_matrix[$i][$j] = rand(0, 99);
            }
        }
        
        $matrix->setMatrix($_matrix);
    }
}
