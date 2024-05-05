<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if(isset($_GET['a'])){
		if($_GET['a']=='del' && isset($_GET['imgid'])){
			$q = "DELETE FROM trainers_pic WHERE ID={$_GET["imgid"]};";
			$db->exec($q);
			header("Location: admin_trainers_edit_photo.php?id={$_GET['id']}");
		}
		if($_GET['a']=='add'){
			$img = $_POST["img"];
			$q = "INSERT INTO trainers_pic (date, img, trainerID) VALUES (NOW(), '{$img}', {$_GET['id']})";
			$db->exec($q);
			header("Location: admin_trainers_edit_photo.php?id={$_GET['id']}");
		}
	}
	if(isset($_GET['id'])){
		$DBquery="SELECT * FROM trainers WHERE ID={$_GET["id"]};";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		$imgs = get_all_trainer_pics($_GET['id']);
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
		<h1>Тренеры</h1>
		<p><span>Имя тренера: </span><?php echo($res[0]['name']); ?></p>
		<form method="POST" action="admin_trainers_edit_photo.php?a=add&id=<?php echo($_GET['id']); ?>">
			<input class="part1" type="text" name="img" placeholder="Название файла">
			<input class="button" type="submit" value="Отправить">
		</form>
		<table>
<?php
	if(isset($imgs)){
		for($i=0; $i<count($imgs); $i++){
			echo "<div class=\"item i4\">";
			echo "<img src=\"img/{$imgs[$i]["img"]}\" alt=\"news_pic\">";
			echo "<a href=\"admin_news_edit_photo.php?a=del&id={$_GET['id']}&imgid={$imgs[$i]["ID"]}\"><button class=\"bad\">×</button></a>";
			echo "</div>";
		}
	}
?>			
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>