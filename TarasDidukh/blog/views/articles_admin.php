<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Мій перший блог</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
	<div class="container">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a id="blog" class="navbar-brand" href="../index.php">Блог</a>
                </div>
            </div>
        </nav> 
		<div>
		    <a href="index.php?action=add">Добавити статтю</a>
			<table class="admin-table">
			    <tr>
			        <th>Дата</th>
			        <th>Заголовок</th>
			        <th></th>
			        <th></th>
			    </tr>
			    <?php foreach ($articles as $a): ?>
			    <tr>
			        <td><?=$a['date']?></td>
			        <td><?=$a['title']?></td>
			        <td><a href="index.php?action=edit&id=<?=$a['id']?>">Редагувати</a></td>
			        <td><a href="index.php?action=delete&id=<?=$a['id']?>">Видалити</a></td>
			    </tr>
			    <?php endforeach ?>
			</table>
			
		</div>
		<footer>
			<p>Мій перший блог <br> Copyright: &copy; 2016</p>
		</footer>	
	</div>
</body>
</html>