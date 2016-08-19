<?php

namespace botan\app\sorts;

abstract class BaseMatrix 
{
    protected $matrix;
    protected $rows;
    protected $columns;
    
    public function __construct() 
    {
        $this->rows = 4;
        $this->columns = 5;
        $this->matrix = array();

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
        $this->matrix = array();

        for ($i = 0; $i < $this->rows; $i++) {
            $this->matrix[$i] = array();
        }

        return true;
    }
    
    public function setMatrix($matrix)
    {
        $this->matrix = $matrix;
        $this->rows = count($matrix);
        $this->columns = count($matrix[0]);
    }

    public function getMatrix()
    {
        return $this->matrix;
    }
    
    public function getRows() 
    {
        return $this->rows;
    }

    public function getColumns() 
    {
        return $this->columns;
    }
       
}