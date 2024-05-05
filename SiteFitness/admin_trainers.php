<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['a'])){
		if($_GET['a']=='del' && isset($_GET['id'])){
			$q = "DELETE FROM trainers WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_trainers.php");
		}
		else if($_GET['a']=='upd' && isset($_GET['id'])){
			$name = $_POST["name"];
			$experience = $_POST["experience"];
			$text = $_POST["text"];
			$q = "UPDATE trainers SET name = \"{$name}\", experience = \"{$experience}\" , text = \"{$text}\" WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_trainers.php");
		}
		else if($_GET['a']=='add'){
			$name = $_POST["name"];
			$experience = $_POST["experience"];
			$text = $_POST["text"];
			$q = "INSERT INTO trainers (name, experience, text) VALUES ('{$name}', '{$experience}', '{$text}');";
			$db->exec($q);
			header("Location: admin_trainers.php");
		}
	}
	$DBquery="SELECT * FROM trainers ORDER BY name ASC";
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
		<h1>Тренеры</h1>
		<a href="admin_trainers_edit.php"><button class="good big">Добавить тренера</button></a><br><br>
		<table>
			<thead>
				<td>Имя тренера</td>
			</thead>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<tr>";
		echo "<td>{$res[$i]["name"]}</td>";
		echo "<td class=\"noborder\"><a href=\"admin_trainers_edit_photo.php?id={$res[$i]["ID"]}\"><button>фото</button></a></td>";
		echo "<td class=\"noborder\"><a href=\"admin_trainers_edit.php?id={$res[$i]["ID"]}\"><button class=\"mid\">ред.</button></a></td>";
		echo "<td class=\"noborder\"><a href=\"admin_trainers.php?a=del&id={$res[$i]["ID"]}\"><button class=\"bad\">×</button></a></td>";
		echo "</tr>";
	}
?>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>