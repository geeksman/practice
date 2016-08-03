<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/matrixCss.css" >
    <script src="js/FormValid.js"></script>
    <!-- Подлючаем библиотеку jQuery -->

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#"></a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
        <div class="container">
            <form class="size" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <div class="row text-center">
                <h2>Розміри матриці</h2>
            </div>
            <div class="row text-center form-group has-error">
                <div class="col-md-4 col-md-offset-2">
                    <input type="text" name="M" pattern="\d{1,1}" required placeholder="M">
                </div>
                <div class="col-md-4">
                    <input type="text" name="N" pattern="\d{1,1}" required placeholder="N">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <h2>Тип сортування</h2>
                 </div>
                 <div class="col-md-4 col-md-offset-4 text-center">
                     <h2>Метод заповнення</h2>
                  </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="TypeSort">
                        <option value="1">Діагональне</option>
                        <option value="2">Горизонтальне</option>
                        <option value="3">Змійкою</option>
                        <option value="4">Равликом(ззовні)</option>
                        <option value="5">Равликом(зсередини)</option>
                        <option value="6">Вертикальне(спочатку)</option>
                        <option value="7">Вертикальне(з кінця)</option>
                    </select>
                </div>
                <div class="col-md-4 col-md-offset-4 text-center">
                    <select class="form-control" name="TypeNumber">
                        <option value="1">Рандомно</option>
                        <option value="2">Прості числа</option>
                        <option value="3">Чила Фібоначчі</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <input id = 'go' class = 'btn btn-primary text-center' type="submit" name="Generate" value="Сортувати">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="add">Записати в файл
                        </label>
                    </div>
                </div>

            </div>
        </form>
    </div>
<?php

    require __DIR__ . "/../vendor/autoload.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $typeSort = $_POST['TypeSort'];
        $typeNumber = $_POST['TypeNumber'];
        $m = $_POST['M'];
        $n = $_POST['N'];
        $check = $_POST['add'];
    /*$obj = new gksmn\app\output\test();
    $obj->sayhello()*/
        switch($typeSort) {
            case 1:
                $Matrix = new gksmn\app\sort\DiagonalSort($m, $n, $typeNumber);
                break;
            case 2:
                $Matrix = new gksmn\app\sort\HorizonSort($m, $n, $typeNumber);
                break;
            case 3:
                $Matrix = new gksmn\app\sort\SnackSort($m, $n, $typeNumber);
                break;
            case 4:
                $Matrix = new gksmn\app\sort\SnailSort($m, $n, $typeNumber, $typeSort);
                break;
            case 5:
                $Matrix = new gksmn\app\sort\SnailSort($m, $n, $typeNumber, $typeSort);
                break;
            case 6:
                $Matrix = new gksmn\app\sort\VerticalSort($m, $n, $typeNumber, $typeSort);
                break;
            case 7:
                $Matrix = new gksmn\app\sort\VerticalSort($m, $n, $typeNumber, $typeSort);
                break;
        }
    }
    
    $Matrix->printMatrix($Matrix->a, $Matrix->row, $Matrix->col);
    $Matrix->sortMethod();
    echo '<br>';
    $Matrix->printMatrix($Matrix->a, $Matrix->row, $Matrix->col);
    if($check == 'on'){
        $Matrix->addToFile($Matrix->a, $Matrix->row, $Matrix->col);
    }
?>
</body>
</html>
