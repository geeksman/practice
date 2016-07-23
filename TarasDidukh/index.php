<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Practice</title>
    <link rel="stylesheet" type="text/css" href="/practice/TarasDidukh/css/style.css">
</head>

<body>
    
    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
        <h1>Генерування матриці</h1>
        
        <div class="generation">
            <input type="radio" name="typeGeneration" value="random" checked>Генерувати випадковими числами
            <br>
            <input type="radio" name="typeGeneration" value="simpleNummber">Генерувати простими числами
        </div>
        
        <div class="mainForm">
            <label for="rows">Кількість рядків:</label>
            <input type="number" name="rows" id="rating" min="1" max="10" step="0.1" required>
            <br><br>

            <label for="columns">Кількість стовбців:</label>
            <input type="number" name="columns" id="rating" min="1" max="10" step="1" required>
            <br><br>



            <label for="typeSort">Тип сортування:</label>
            <select name="typeSort">
                <option value="horizontalSort">Горизонтальне</option>
                <option value="aVerticalSort">Вертикальне по зростанню</option>
                <option value="dVerticalSort">Вертикальне по спаданню</option>
                <option value="aSnailSort">Равликом по зростанню</option>
                <option value="dSnailSort">Равликом по спаданню</option>
                <option value="diagonalSort">Діагональне</option>
                <option value="snakeSort">Змійкою</option>
            </select>
            <br><br>

            <input type="submit" name="sendForm" value="Згенерувати">
            
        </div>
    </form>

    <?php
    
        require_once('HorizontalSort.php');
        require_once('VerticalSort.php');
        require_once('SnailSort.php');
        require_once('DiagonalSort.php');
        require_once('SnakeSort.php');
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $typeSort = $_POST["typeSort"];
        $Matrix = 0;
        
        switch ($typeSort) {
            case 'horizontalSort':
                $Matrix = new HorizontalSort();
                break;
            case 'aVerticalSort':
                $Matrix = new VerticalSort();
                break;
            case 'dVerticalSort':
                $Matrix = new VerticalSort();
                break;
            case 'aSnailSort':
                $Matrix = new SnailSort();
                break;
            case 'dSnailSort':
                $Matrix = new SnailSort();
                break;
            case 'diagonalSort':
                $Matrix = new DiagonalSort();
                break;
            case 'snakeSort':
                $Matrix = new SnakeSort();
                break;
        }
        
        $Matrix->setSize($_POST["rows"], $_POST["columns"]);
        
        if ($_POST["typeGeneration"] == "random") {
            $Matrix->generateRandom();
        } else {
            $Matrix->generateSimpleNumbers();
        }
        
        if ($typeSort == "dSnailSort" || $typeSort == "dVerticalSort") {
            $Matrix->dsort();
        } else {
            $Matrix->sort();
        }
        
        $Matrix->printMatrix();
        $Matrix->printMatrixToFile();
    }
    
    ?>
</body>
</body>
</html>


