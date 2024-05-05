<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['a'])){
		if($_GET['a']=='del' && isset($_GET['id'])){
			$q = "DELETE FROM tariffs WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_tariffs.php");
		}
		else if($_GET['a']=='upd' && isset($_GET['id'])){
			$name = $_POST["name"];
			$time = $_POST["time"];
			$loc = $_POST["loc"];
			$price = $_POST["price"];
			$q = "UPDATE tariffs SET name = \"{$name}\", time = \"{$time}\", loc = \"{$loc}\", price = \"{$price}\" WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_tariffs.php");
		}
		else if($_GET['a']=='add'){
			$name = $_POST["name"];
			$time = $_POST["time"];
			$loc = $_POST["loc"];
			$price = $_POST["price"];
			$q = "INSERT INTO tariffs (name, time, loc, price) VALUES ('{$name}', '{$time}', '{$loc}', '{$price}');";
			$db->exec($q);
			header("Location: admin_tariffs.php");
		}
	}
	$DBquery="SELECT * FROM tariffs ORDER BY name";
	$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
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
		<a href="admin_tariffs_edit.php"><button class="good big">Добавить абонемент</button></a><br><br>
		<table>
			<thead>
				<td>Название</td>
			</thead>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<tr>";
		echo "<td>{$res[$i]["name"]}</td>";
		echo "<td class=\"noborder\"><a href=\"admin_tariffs_edit.php?id={$res[$i]["ID"]}\"><button class=\"mid\">ред.</button></a></td>";
		echo "<td class=\"noborder\"><a href=\"admin_tariffs.php?a=del&id={$res[$i]["ID"]}\"><button class=\"bad\">×</button></a></td>";
		echo "</tr>";
	}
?>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>