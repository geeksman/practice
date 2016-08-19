<?php

namespace botan\app\components\outputs;

class PrintToScreen
{
    public function output($matrix)
    {
        echo '<table class="printMatrix">';
        
        $_matrix = $matrix->getMatrix();
        
        for ($i = 0; $i < $matrix->getRows(); $i++) {
            echo '<tr>';

            for ($j = 0; $j < $matrix->getColumns(); $j++) {
                echo '<td>' . $_matrix[$i][$j] . '</td>';
            }

            echo '</tr>';
        }

        echo '</table>';
    }
}
