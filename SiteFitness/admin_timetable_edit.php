<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	$DBquery="SELECT * FROM timetable WHERE ID={$_GET["id"]};";
	$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
	$DBquery="SELECT ID, name FROM trainers ORDER BY ID ASC;";
	$trainers = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
	$DBquery="SELECT ID, name FROM locations ORDER BY ID ASC;";
	$locations = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);	
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
		<h1>Расписание</h1>
		<p><span>День недели: </span><?php echo($res[0]['day']); ?></p>
		<p><span>Время тренировки: </span><?php echo($res[0]['time']); ?></p>
		<form method="POST" action="<?php echo "admin_timetable.php?id={$_GET['id']}"; ?>">
			<input class="full" type="text" name="name" placeholder="Название тренировки" <?php echo "value=\"{$res[0]['name']}\""; ?>><br>
			<input class="full" type="text" name="trainerID" placeholder="ID тренера" <?php echo "value=\"{$res[0]['trainerID']}\""; ?>><br>
			<input class="full" type="text" name="locationID" placeholder="ID зала" <?php if(isset($res)) echo "value=\"{$res[0]['locationID']}\""; ?>><br>
			<input class="full button" type="submit" value="Отправить">
		</form>
		<br>
		<table>
			<thead>
				<td>ID тренера</td>
				<td>Имя тренера</td>
			</thead>
<?php
	for ($i=0; $i<count($trainers); $i++) { 
		echo "<tr>";
		echo "<td>{$trainers[$i]["ID"]}</td>";
		echo "<td>{$trainers[$i]["name"]}</td>";
		echo "</tr>";
	}
?>
		</table>
		<br>
		<table>
			<thead>
				<td>ID зала</td>
				<td>Название зала</td>
			</thead>
<?php
	for ($i=0; $i<count($locations); $i++) { 
		echo "<tr>";
		echo "<td>{$locations[$i]["ID"]}</td>";
		echo "<td>{$locations[$i]["name"]}</td>";
		echo "</tr>";
	}
?>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>