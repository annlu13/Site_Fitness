<?php
	include 'functions.php';
	if (isset($_GET["a"])){
		if ($_GET["a"]=="upd"){
			$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
			$text = $_POST["text"];
			$img = $_POST["img"];
			$q = "UPDATE advertisment SET text = \"{$text}\", img = \"{$img}\"";
			$db->exec($q);
			header("Location: admin_advertisment.php");
		}
	}
	$res = get_advert();
?>
<html>
<head>
	<title>Администратор</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header(); ?>
	<?php get_admin_aside(); ?>
	<main class="part1">
		<h1>Объявление</h1>
		<form method="POST" action="admin_advertisment.php?a=upd">
			<input class="full" type="text" name="text" placeholder="Текст объявления" value="<?php echo($res[0]["text"])?>"><br>
			<input class="full" type="text" name="img" placeholder="Изображение" value="<?php echo($res[0]["img"])?>"><br>
			<input class="full button" type="submit" value="Отправить">
		</form>
	</main>
	<?php get_footer(); ?>
</body>
</html>