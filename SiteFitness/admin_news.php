<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['a'])){
		if($_GET['a']=='del' && isset($_GET['id'])){
			$q = "DELETE FROM news WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_news.php");
		}
		else if($_GET['a']=='upd' && isset($_GET['id'])){
			$name = $_POST["name"];
			$text = $_POST["text"];
			$q = "UPDATE news SET name = \"{$name}\", text = \"{$text}\" WHERE ID={$_GET["id"]};";
			$db->exec($q);
			header("Location: admin_news.php");
		}
		else if($_GET['a']=='add'){
			$name = $_POST["name"];
			$text = $_POST["text"];
			$q = "INSERT INTO news (name, date, text, liked) VALUES ('{$name}', NOW(), '{$text}', '0');";
			$db->exec($q);
			header("Location: admin_news.php");
		}
	}
	$DBquery="SELECT * FROM news ORDER BY date DESC";
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
		<h1>Новости</h1>
		<a href="admin_news_edit.php"><button class="good big">Добавить новость</button></a><br><br>
		<table>
			<thead>
				<td>Дата</td>
				<td>Заголовок</td>
				<td class="noborder"></td>
			</thead>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<tr>";
		echo "<td>{$res[$i]["date"]}</td>";
		echo "<td>{$res[$i]["name"]}</td>";
		echo "<td class=\"noborder\"><a href=\"admin_news_edit_photo.php?id={$res[$i]["ID"]}\"><button>фото</button></a></td>";
		echo "<td class=\"noborder\"><a href=\"admin_news_edit.php?id={$res[$i]["ID"]}\"><button class=\"mid\">ред.</button></a></td>";
		echo "<td class=\"noborder\"><a href=\"admin_news.php?a=del&id={$res[$i]["ID"]}\"><button class=\"bad\">×</button></a></td>";
		echo "</tr>";
	}
?>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>