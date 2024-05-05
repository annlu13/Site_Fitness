<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	$DBquery="SELECT * FROM sale";
	$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
	<title>Акции</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header();
	get_price_aside(); ?>
	<main class="part1">
		<h1>Акции</h1>
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
				<td class="special">Условия</td>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<td>";
		echo ($res[$i]["text"]);
		echo "</td>";
	}
?>
			</tr>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>