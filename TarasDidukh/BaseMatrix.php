<?php

abstract class BaseMatrix {
    protected $matrix;
    protected $rows;
    protected $columns;
    
    public function __construct() 
    {
        $this->rows = 4;
        $this->columns = 5;
        for ($i = 0; $i < $this->rows; $i++) {
            $this->matrix[$i] = array();
        }
    }
    
    abstract public function sort();
    
    public function setSize($rows, $columns) 
    {
        if ($rows > 10 || $columns > 10) {
            return false;
        }
        $this->columns = $columns;
        $this->rows = $rows;
        for ($i = 0; $i < $this->rows; $i++) {
            $this->matrix[$i] = array();
        }
        return true;
    }

    public function getRows() 
    {
        return $this->rows;
    }

    public function getColumns() 
    {
        return $this->columns;
    }
    
    public function printMatrix()
    {
        echo '<table id="printMatrix">';
        
        for ($i = 0; $i < $this->rows; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $this->columns; $j++) {
                echo '<td>' . $this->matrix[$i][$j] . '</td>';
            }
            echo '</tr>';
       }
       
       echo '</table>';
    }
    
    public function generateRandom() 
    {
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                $this->matrix[$i][$j] = rand(0, 99);
            }
        }
    }
    
    public function generateSimpleNumbers() 
    {
        for ($i = 0; $i < $this->rows; $i++) {
            for ($j = 0; $j < $this->columns; $j++) {
                
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
                
                $this->matrix[$i][$j] = $n; 
            }
        }
    }
    
}