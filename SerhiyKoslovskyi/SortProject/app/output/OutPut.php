<?php

namespace gksmn\app\output;

trait OutPut 
{
    public function printMatrix($a, $row, $col)
    {
        echo '<table class="printMatrix">';
        
        for ($i = 0; $i < $row; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $col; $j++) {
                echo '<td>' . $a[$i][$j] . '</td>';
            }
            echo '</tr>';
        }
       
       echo '</table>';
    }
    
    public function addToFile($a, $row, $col)
    {
        
        $file = fopen("Matrix.txt", "w");
        
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) {
                fwrite($file, $a[$i][$j] . "   ");
            }
            fwrite($file, "\r\n");
        }
        fclose($file);
    }
}
