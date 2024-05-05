<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if(isset($_GET['id'])){
		$DBquery="SELECT * FROM locations WHERE ID={$_GET["id"]};";
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
		<h1>Залы</h1>
		<form method="POST" action="<?php if(isset($_GET['id'])) echo "admin_locations.php?a=upd&id={$_GET['id']}"; else echo "admin_locations.php?a=add"; ?>">
			<input class="full" type="text" name="name" placeholder="Название зала" <?php if(isset($res)) echo "value=\"{$res[0]['name']}\""; ?>><br>
			<input class="full" type="text" name="square" placeholder="Площадь зала" <?php if(isset($res)) echo "value=\"{$res[0]['square']}\""; ?>><br>
			<input class="full" type="text" name="text" placeholder="Описание зала" <?php if(isset($res)) echo "value=\"{$res[0]['text']}\""; ?>><br>
			<input class="full button" type="submit" value="Отправить">
		</form>
	</main>
	<?php get_footer(); ?>
</body>
</html>

