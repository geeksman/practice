<?php 

    class SnailSort extends BaseClassAbstract {
        
        private $rFlag;
        private $iter;
        private $start;
        
        public function __construct($n, $m, $r){
            $this->n = $n;
            $this->m = $m;
            $this->rFlag = $r;
            $this->matrix = array();
            $this->iter = 0;
            $this->start = 0;
        }
        
        public function Min($start_i, $start_j, $stop_i, $stop_j) {
            $size1 = $stop_i + $stop_j - 4;
            $i = $start_i; 
            $j = $start_j;
            $min1 = $this->matrix[$i][$j];
            $min1_i = 0;
            $min1_j = 0;
            while ($i != $start + 1 && $j != $start ) {
                if ($i == $start && $j < $stop_j) {
                    while ($j < $stop_j) {
                        if ($min1 > $this->matrix[$i][$j]){
                            $min = $this->matrix[$i][$j];
                            $min1_i = $i;
                            $min1_j = $j;
                        }
                        $j++;
                    }
                } elseif ($i < $stop_i && $j == $stop_j) {
                    while ($i++ < $stop_i) {
                        if ($min1 > $this->matrix[$i][$j - 1]) {
                            $min = $this->matrix[$i][$j - 1];
                            $min1_i = $i;
                            $min1_j = $j;
                        }
                    }
                } elseif ($i == $N && $j >= $this->start) {
                    while($j - 2 >= $this->start) {
                        if ($min1 > $this->matrix[$i][$j - 2]) {
                            $min = $this->matrix[$i][$j - 2];
                            $min1_i = $i;
                            $min1_j = $j;
                        }
                        $j--;
                    }
                } elseif ($i > $this->start && $j == $this->start - 1) {
                    while($i - 2 >= $this->start) {
                        if ($min1 > $this->matrix[$i - 1][$j]) {
                            $min = $this->matrix[$i - 1][$j];
                            $min1_i = $i;
                            $min1_j = $j;
                        }
                        $i--;
                    }
                }
            }
            echo ' '.$min1.' ';
        }
        
        public function Sort() {
            $size = $this->n * $this->m;
            //$iter = 0;
            //$start = 0;
            $i = $this->start;
            $j = $this->start;
            $N = $this->n;
            $M = $this->m;
            while ($this->iter < $size ) {
                if ($i == $this->start && $j < $M) {
                    for($j = $this->start; $j < $M; $j++) {
                        //printf(" %d ", $this->matrix[$start][$j]);
                        $this->Min($i, $j, $N, $M);
                        $this->iter++;
                    }
                } elseif ($i < $N && $j == $M) {
                    for($i = $this->start + 1; $i < $N; $i++) {
                        //printf(" %d ", $this->matrix[$i][$M - 1]);
                        $this->Min($i, $j, $N, $M);
                        $this->iter++;
                    }
                } elseif ($i == $N && $j >= $this->start) {
                    for($j = $M - 2; $j >= $this->start; $j--) {
                        //printf(" %d ", $this->matrix[$N - 1][$j]);
                        $this->Min($i, $j, $N, $M);
                        $this->iter++;
                    }
                } elseif ($i > $this->start && $j == $this->start - 1) {
                    for($i = $N - 2; $i > $this->start; $i--) {
                        $this->Min($i, $j, $N, $M);
                        //printf(" %d ", $this->matrix[$i][$start]);
                        $this->iter++;
                    }
                    $this->start++;
                    $M--;
                    $N--;
                    $i = $this->start;
                    $j = $this->start;
                }          
            }
        }
    }