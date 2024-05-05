<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	$DBquery="SELECT timetable.ID, timetable.name, timetable.trainerID, trainers.name as trainer, timetable.locationID, locations.name as location FROM timetable, trainers, locations WHERE trainerID = trainers.ID AND locationID = locations.ID ORDER BY ID ASC";
	$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
	<title>Расписание</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header();
	get_about_aside(); ?>
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
	for($i=1; $i<=7; $i++){
		get_timetable_cell($res, $i);
	}
?>
			</tr>
			<tr>
				<td>12:00 - 13:00</td>
<?php
	for($i=8; $i<=14; $i++){
		get_timetable_cell($res, $i);
	}
?>
			</tr>
			<tr>
				<td>14:00 - 15:00</td>
<?php
	for($i=15; $i<=21; $i++){
		get_timetable_cell($res, $i);
	}
?>
			</tr>
			<tr>
				<td>16:00 - 17:00</td>
<?php
	for($i=22; $i<=28; $i++){
		get_timetable_cell($res, $i);
	}
?>
			</tr>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>