<!DOCTYPE html>
<hmtl>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link rel="stylesheet" href="../style2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div id="addart">
                <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
                    <label>
                        Title
                        <input type="text" name="title" value="<?=$article['title']?>" class="form-item" autofocus required>
                    </label>
                    <label>
                        Date
                        <input type="date" name="date" value="<?=$article['date']?>" class="form-item" required>
                    </label>
                    <label>
                        Content
                        <textarea class="form-item" name="content" required><?=$article['content']?></textarea>
                    </label>
                    <input type="submit" value="Save" class="btn">
                </form>
            </div>
            <footer>
                <p>Oleksiuk Maksim<br>Twilightbishop &copy;2016</p>
            </footer>
        </div>
    </body>
</hmtl>

