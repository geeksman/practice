<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Мій перший блог</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
		<a href="admin">Панель адміністратор</a>
		<div>
		    <?php foreach ($articles as $a): ?>
			<div class="article">
				<h3>
				    <a href="article.php?id=<?=$a['id']?>"><?=$a['title']?></a>
				</h3>
				<em>Опубліковано: <?=$a['date']?></em>
				<p><?=articles_intro($a['content'])?></p>
			</div>
			<?php endforeach ?>
		</div>
		<footer>
			<p>Мій перший блог <br> Copyright: &copy; 2016</p>
		</footer>	
	</div>
</body>
</html>