<?php 
    class VerticalSort extends BaseClassAbstract
    {
        private $rFlag;
    	public function __construct($m, $n, $flag)
        {
            $this->m = $m;
            $this->n = $n;
            $this->matrix = array();
            $this->rFlag = $flag;
        }
        
        public function Min($start_i, $start_j, $stop_i, $stop_j)
        {
            $Min = $this->matrix[$start_i][$start_j] * $this->rFlag;
            $j = $start_i;
            for($i = $start_j; $i < $this->m; $i++){
                while ($j < $this->n){
                    if ($Min > ($this->matrix[$j][$i] * $this->rFlag)){
                        $Min = $this->matrix[$j][$i] * $this->rFlag;
                        $this->min_i = $j;
                        $this->min_j = $i;
                    }
                    $j++;
                }
                $j = 0;
            }
            return $Min * $this->rFlag;
        }
        
        public function Sort()
        {
            $min = 0;
            for ($i = 0; $i < $this->m; $i++){
                for ($j = 0; $j < $this->n; $j++){
                    $min = $this->Min($j, $i, 0, 0);
                    $this->Swap($j, $i, $min);
                }
            }
        }
    }