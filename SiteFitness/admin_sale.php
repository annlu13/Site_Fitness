<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['a'])){
		if($_GET['a']=='del' && isset($_GET['id'])){
			$q = "DELETE FROM sale WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_sale.php");
		}
		else if($_GET['a']=='upd' && isset($_GET['id'])){
			$name = $_POST["name"];
			$text = $_POST["text"];
			$q = "UPDATE sale SET name = \"{$name}\", text = \"{$text}\" WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_sale.php");
		}
		else if($_GET['a']=='add'){
			$name = $_POST["name"];
			$text = $_POST["text"];
			$q = "INSERT INTO sale (name, text) VALUES ('{$name}', '{$text}');";
			$db->exec($q);
			header("Location: admin_sale.php");
		}
	}
	$DBquery="SELECT * FROM sale ORDER BY name";
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
		<h1>Акции</h1>
		<a href="admin_sale_edit.php"><button class="good big">Добавить акцию</button></a><br><br>
		<table>
			<thead>
				<td>Название</td>
			</thead>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<tr>";
		echo "<td>{$res[$i]["name"]}</td>";
		echo "<td class=\"noborder\"><a href=\"admin_sale_edit.php?id={$res[$i]["ID"]}\"><button class=\"mid\">ред.</button></a></td>";
		echo "<td class=\"noborder\"><a href=\"admin_sale.php?a=del&id={$res[$i]["ID"]}\"><button class=\"bad\">×</button></a></td>";
		echo "</tr>";
	}
?>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>