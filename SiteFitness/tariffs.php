<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	$DBquery="SELECT * FROM tariffs";
	$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
	<title>Абонементы</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header();
	get_price_aside(); ?>
	<main class="part1">
		<h1>Абонементы</h1>
		<table>
			<thead>
				<td class="special">Название</td>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<td>";
		echo ($res[$i]["name"]);
		echo "</td>";
	}
?>
			</thead>
			<tr>
				<td class="special">Время посещения</td>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<td>";
		echo ($res[$i]["time"]);
		echo "</td>";
	}
?>
			</tr>
			<tr>
				<td class="special">Залы, тренировки</td>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<td>";
		echo ($res[$i]["loc"]);
		echo "</td>";
	}
?>
			</tr>
			<tr>
				<td class="special">Стоимость</td>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<td>";
		echo ($res[$i]["price"]);
		echo "</td>";
	}
?>
			</tr>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>