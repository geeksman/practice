<?php

namespace botan\app\components;

class PrintMatrix
{
    public function printMatrix($matrix)
    {
        echo '<table class="printMatrix">';
        
        for ($i = 0; $i < $matrix->getRows(); $i++) {
            echo '<tr>';
            for ($j = 0; $j < $matrix->getColumns(); $j++) {
                echo '<td>' . $matrix->getMatrix()[$i][$j] . '</td>';
            }
            echo '</tr>';
        }
       
       echo '</table>';
    }
    
     public function printMatrixToFile($matrix) 
    {
        $myfile = fopen("print-matrix.txt", "w") or die("Unable to open file!");
        
        for ($i = 0; $i < $matrix->getRows(); $i++) {
            for ($j = 0; $j < $matrix->getColumns(); $j++) {
                fwrite($myfile, $matrix->getMatrix()[$i][$j]);
                fwrite($myfile, "   ");
            }
            fwrite($myfile, "\r\n");
        }
    }
}
