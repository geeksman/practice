<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Мій перший блог</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- add Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<h1>Мій перший блог</h1>
		<div>
			<div class="article">
				<h3>
				  <?=$article['title']?>
				</h3>
				<em>Опубліковано: <?=$article['date']?></em>
				<p><?=$article['content']?></p>
			</div>
		</div>
		<footer>
			<p>Мій перший блог <br> Copyright: &copy; 2016</p>
		</footer>	
	</div>
</body>
</html>