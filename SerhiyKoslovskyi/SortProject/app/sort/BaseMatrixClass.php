<?php
namespace gksmn\app\sort;

abstract class BaseMatrixClass 
{
    protected $a;
    protected $col;
    protected $row;
    protected $type;

    public function __construct($row, $col, $type) {
        $this->row = $row;
        $this->col = $col;
        $this->type = $type;
        for($i = 0; $i < $this->row; $i++) {
            $this->a[$i] = array();
        }
        if ($this->type == 1) {
            for ($i = 0; $i < $this->row; $i++) {
                for ($j = 0; $j < $this->col; $j++) {
                    $this->a[$i][$j] = rand(0, 99);
                }
            }
        } elseif($this->type == 2) {
            $sarr = array(2);
            $mark = 0;
            $count = 0;
            $i = 2;
            while($count <= 25) {	
		for($j = 0; $j < count($sarr); $j++) {			
                    if($i % $sarr[$j] == 0) {
			$mark = 0;
			break;
                    } 
                    $mark = 1;
		}
		if($mark) {
                    array_push($sarr, $i);
                    $count++;
		}
                $i++;
            }
            $k = 0;
            for ($i = 0; $i < $this->row; $i++) {
                for ($j = 0; $j < $this->col; $j++) {
                    $this->a[$i][$j] = $sarr[$k++];
                }
            }
        } elseif($this->type == 3) {
            $a = 0;
            $b = 0;
            $c = 1;
            for($i = 0; $i < $this->row; $i++) {
                for($j = 0; $j < $this->col; $j++) {
                    $this->a[$i][$j] = $c;
                    $a = $b;
                    $b = $c;
                    $c = $a + $b;				
                }
            }
        }
    }

    abstract protected function copyInMatrix($copy);
    
    abstract public function sortMethod();
    
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
	}
    }
        
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    protected function printVector($v)
    {
        for ($i=0; $i < count($v); $i++) {
            echo $v[$i] . ' ';
        }

        echo '<br>';
    }

    protected function copyInVector()
    {
        $copy = [];
        for($i = 0; $i < count($this->a); $i++) {
            for($j = 0; $j < count($this->a[$i]); $j++) {
                array_push($copy, $this->a[$i][$j]);
            }
        }

        return $copy;
    }
    
}