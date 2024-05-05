<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if(isset($_GET['id'])){
		$DBquery="SELECT * FROM trainers WHERE ID={$_GET["id"]};";
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
		<h1>Теренеры</h1>
		<form method="POST" action="<?php if(isset($_GET['id'])) echo "admin_trainers.php?a=upd&id={$_GET['id']}"; else echo "admin_trainers.php?a=add"; ?>">
			<input class="full" type="text" name="name" placeholder="Имя тренера" <?php if(isset($res)) echo "value=\"{$res[0]['name']}\""; ?>><br>
			<input class="full" type="text" name="experience" placeholder="Стаж тренера" <?php if(isset($res)) echo "value=\"{$res[0]['experience']}\""; ?>><br>
			<input class="full" type="text" name="text" placeholder="Текст о тренере" <?php if(isset($res)) echo "value=\"{$res[0]['text']}\""; ?>><br>
			<input class="full button" type="submit" value="Отправить">
		</form>
	</main>
	<?php get_footer(); ?>
</body>
</html>

