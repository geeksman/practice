<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="stylesheet" href="../style2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Admin panel</h1>
            <div>
                <a href="index.php?action=add">Add article</a>
                <table id="admin_table" class="table">
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?=$article['date']?></td>
                        <td><?=$article['title']?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?=$article['id']?>">Edit</a>
                        </td>
                        <td>
                            <a href="index.php?action=delete&id=<?=$article['id']?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
            <footer>
                <p>Oleksiuk Maksim<br>Twilightbishop &copy;2016</p>
            </footer>
        </div>
    </body>
</html>

