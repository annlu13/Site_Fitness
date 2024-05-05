<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['id'])){
		$name = $_POST["name"];
		$trainerID = $_POST["trainerID"];
		$locationID = $_POST["locationID"];
		$q = "UPDATE timetable SET name = \"{$name}\", trainerID = '{$trainerID}', locationID = '{$locationID}' WHERE ID={$_GET["id"]};";
		//echo ($q);
		$db->exec($q);
		header("Location: admin_timetable.php");
	}


	$DBquery="SELECT ID FROM timetable ORDER BY ID ASC";
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
		<h1>Расписание</h1>
		<table>
			<thead>
				<td class="noborder"></td>
				<td>ПН</td>
				<td>ВТ</td>
				<td>СР</td>
				<td>ЧТ</td>
				<td>ПТ</td>
				<td>СБ</td>
				<td>ВС</td>
			</thead>
			<tr>
				<td>10:00 - 11:00</td>
<?php
	for($i=0; $i<=6; $i++){
		get_admin_timetable_cell($res, $i);
	}
?>
			</tr>
			<tr>
				<td>12:00 - 13:00</td>
<?php
	for($i=7; $i<=13; $i++){
		get_admin_timetable_cell($res, $i);
	}
?>
			</tr>
			<tr>
				<td>14:00 - 15:00</td>
<?php
	for($i=14; $i<=20; $i++){
		get_admin_timetable_cell($res, $i);
	}
?>
			</tr>
			<tr>
				<td>16:00 - 17:00</td>
<?php
	for($i=21; $i<=27; $i++){
		get_admin_timetable_cell($res, $i);
	}
?>
			</tr>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>