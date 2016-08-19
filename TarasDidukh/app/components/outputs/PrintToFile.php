<?php

namespace botan\app\components\outputs;

class PrintToFile
{
    public function output($matrix) 
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
