<?php 
    class SnakeSort extends BaseClassAbstract
    {
    	public function __construct($m, $n)
        {
            $this->m = $m;
            $this->n = $n;
            $this->matrix = array();
        }
        
        public function Min($start_i, $start_j, $stop_i, $stop_j)
        {
            $Min = $this->matrix[$start_i][$start_j];
            $j = $start_j;
            for($i = $start_i; $i < $this->n; $i++){
                while ($j < $this->m){
                    if ($Min > ($this->matrix[$i][$j])){
                        $Min = $this->matrix[$i][$j];
                        $this->min_i = $i;
                        $this->min_j = $j;
                    }
                    $j++;
                }
                $j = 0;
            }
            return $Min;
        }
        
        public function Swap2($i, $j){
            $tmp = $this->matrix[$i][$j];
            $this->matrix[$i][$j] = $this->matrix[$i][$this->m - 1 - $j];
            $this->matrix[$i][$this->m - 1 - $j] = $tmp;
        }
        
        public function Sort()
        {
            $min = 0;
            for ($i = 0; $i < $this->n; $i++){
                for ($j = 0; $j < $this->m; $j++){
                    $min = $this->Min($i, $j, 0, 0);
                    $this->Swap($i, $j, $min);
                }
            }
            for ($i = 1; $i < $this->n; $i = $i + 2){
                for ($j = 0; $j < $this->m/2; $j++){
                    $this->Swap2($i, $j);
                }
            }
        }
    }