<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My blog</title>
        <link rel="stylesheet" href="style2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>My first blog</h1>
            <a href="admin">Admin panel</a>
            <div>
                <?php foreach ($articles as $a): ?>
                <div class="article">
                    <h3>
                        <a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a>
                    </h3>
                    <em>
                        <?=$a['date']?>
                    </em>
                    <p>
                        <?=articles_intro($a['content'])?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
            <footer>
                <p>Oleksiuk Maksim<br>Twilightbishop &copy;2016</p>
            </footer>
        </div>
    </body>
</html>