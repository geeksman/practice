<?php 
    require("../app/PrintMatrix.class.php");
    require("../app/BaseClassAbstract.class.php");
    require("../app/HorisontalSort.class.php");
    require("../app/VerticalSort.class.php");
    require("../app/SnakeSort.class.php");
    require("../app/SnailSort.class.php");
    $sort = htmlspecialchars($_POST['Sort']);
    echo $sort;
    $N = htmlspecialchars($_POST['N']);
    $M = htmlspecialchars($_POST['M']);
    $generator = htmlspecialchars($_POST['Generator']);
    $sortObj;
    if ($sort == 'Hor'){
        $sortObj = new HorisontalSort($M, $N);
    } elseif ($sort == 'Vert') {
        $sortObj = new VerticalSort($M, $N, 1);
    } elseif ($sort == 'VertR') {
        $sortObj = new VerticalSort($M, $N, -1);
    } elseif ($sort == 'Snake') {
        $sortObj = new SnakeSort($M, $N);
    } elseif ($sort == 'Snail') {
        $sortObj = new SnailSort($M, $N);
    }
    $sortObj->CreateMatrix($generator);
    $sortObj->PrintMatrix();
    echo '<br><br>';
    $sortObj->Sort();
    $sortObj->PrintMatrix();
    $sortObj->PrintToFile();
    echo "<a href='index.html'>Back</a>";
    
    
