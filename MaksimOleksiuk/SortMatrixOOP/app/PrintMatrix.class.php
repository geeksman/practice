<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PrintMatrix 
{
    protected $m;
    protected $n;
    protected $matrix;
    
    public function PrintMatrix() 
    {
        echo '<table>';
        for ($i = 0; $i < $this->n; $i++){
            echo '<tr>';
            for ($j = 0; $j < $this->m; $j++){
                echo '<td>'.$this->matrix[$i][$j].'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    
    public function PrintToFile() 
    {
        $fileName = fopen("Sort Matrix.txt", "w") or die("Unable to open file!");
        
        for ($i = 0; $i < $this->n; $i++) {
            for ($j = 0; $j < $this->m; $j++) {
                fwrite($fileName, $this->matrix[$i][$j]);
                fwrite($fileName, "   ");
            }
            fwrite($fileName, "\r\n");
        }
    }
}

