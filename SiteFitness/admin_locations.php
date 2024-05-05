<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['a'])){
		if($_GET['a']=='del' && isset($_GET['id'])){
			$q = "DELETE FROM locations WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_locations.php");
		}
		else if($_GET['a']=='upd' && isset($_GET['id'])){
			$name = $_POST["name"];
			$square = $_POST["square"];
			$text = $_POST["text"];
			$q = "UPDATE locations SET name = \"{$name}\", square = \"{$square}\" , text = \"{$text}\" WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_locations.php");
		}
		else if($_GET['a']=='add'){
			$name = $_POST["name"];
			$square = $_POST["square"];
			$text = $_POST["text"];
			$q = "INSERT INTO locations (name, square, text) VALUES ('{$name}', '{$square}', '{$text}');";
			$db->exec($q);
			header("Location: admin_locations.php");
		}
	}
	$DBquery="SELECT * FROM locations ORDER bY name ASC";
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
		<h1>Залы</h1>
		<a href="admin_locations_edit.php"><button class="good big">Добавить зал</button></a><br><br>
		<table>
			<thead>
				<td>Название зала</td>
			</thead>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<tr>";
		echo "<td>{$res[$i]["name"]}</td>";
		echo "<td class=\"noborder\"><a href=\"admin_locations_edit_photo.php?id={$res[$i]["ID"]}\"><button>фото</button></a></td>";
		echo "<td class=\"noborder\"><a href=\"admin_locations_edit.php?id={$res[$i]["ID"]}\"><button class=\"mid\">ред.</button></a></td>";
		echo "<td class=\"noborder\"><a href=\"admin_locations.php?a=del&id={$res[$i]["ID"]}\"><button class=\"bad\">×</button></a></td>";
		echo "</tr>";
	}
?>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>