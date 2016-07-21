<?php
    include 'AbstractClass';
    include 'SortInterface';

    class SnailSortA extends AbstractClass implements SortInterface
    {
        public function copyInMatrix($copy)
        {
            $i = 0;
        	$j = 0;
            $tb = 0;
            $bb = count($a) - 1;
            $lb = 0;
            $rb = count($a[0]) - 1;
            $dir = 0;
            for ($k = 0; $k < count($copy); $k++)
            {
                $a[$i][$j] = $copy[$k];
                switch ($dir)
                {
                    case 0:
                        $j++;
                        if($j == $rb)
                        {
                            $dir = 1;
                            $tb++;
                        }
                        break;
                    case 1:
                        $i++;
                        if($i == $bb)
                        {
                            $dir = 2;
                            $rb--;
                        }
                        break;
                    case 2:
                        $j--;
                        if($j == $lb)
                        {
                            $dir = 3;
                            $bb--;
                        }
                        break;
                    case 3:
                        $i--;
                        if($i == $tb)
                        {
                            $dir = 0;
                            $lb++;
                        }
                        break;
                }
            }
        	return $a;
        }
        public function sortMethod()
        {
            $copy = copyInVector();
            sort($copy);
            $a = copyInMatrix($copy);
            return $a;
        }
    }
