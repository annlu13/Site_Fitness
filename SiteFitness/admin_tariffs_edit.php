<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if(isset($_GET['id'])){
		$DBquery="SELECT * FROM tariffs WHERE ID={$_GET["id"]};";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
	}
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
		<h1>Абонементы</h1>
		<form method="POST" action="<?php if(isset($_GET['id'])) echo "admin_tariffs.php?a=upd&id={$_GET['id']}"; else echo "admin_tariffs.php?a=add"; ?>">
			<input class="full" type="text" name="name" placeholder="Название абонемента" <?php if(isset($res)) echo "value=\"{$res[0]['name']}\""; ?>><br>
			<input class="full" type="text" name="time" placeholder="Время посещения" <?php if(isset($res)) echo "value=\"{$res[0]['time']}\""; ?>><br>
			<input class="full" type="text" name="loc" placeholder="Залы, тренировки" <?php if(isset($res)) echo "value=\"{$res[0]['loc']}\""; ?>><br>
			<input class="full" type="text" name="price" placeholder="Стоимость" <?php if(isset($res)) echo "value=\"{$res[0]['price']}\""; ?>><br>
			<input class="full button" type="submit" value="Отправить">
		</form>
	</main>
	<?php get_footer(); ?>
</body>
</html>

