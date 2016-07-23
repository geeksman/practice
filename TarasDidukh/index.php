<!DOCTYPE HTML>
<html>
<head>
        <meta charset="UTF-8">
	<title>Practice</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>

    <?php 

    require('HorizontalSort.php');
    require('VerticalSort.php');

    $Matrix1 = new HorizontalSort();
    $Matrix1->generateSimpleNumbers();
    $Matrix1->sort();
    $Matrix1->printMatrix();
    $Matrix2 = new VerticalSort();
    $Matrix2->generateRandom();
    $Matrix2->sort();
    $Matrix2->printMatrix();
//    
    ?>
</body>
</body>
</html>


