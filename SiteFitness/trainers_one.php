<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['id'])){
		$DBquery="SELECT * FROM trainers WHERE ID={$_GET["id"]};";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		$imgs = get_all_trainer_pics($_GET["id"]);
	}
?>
<html>
<head>
	<title>Тренеры | <?php echo($res[0]["name"]); ?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header();
	get_about_aside(); ?>
	<main class="part1">
		<h1>Тренеры</h1>
		<h2><?php echo($res[0]["name"]); ?></h2>
		<p><span>Тренерский стаж: </span><?php echo($res[0]['experience']); ?> лет.</p>
		<p class="description"><?php echo($res[0]["text"]); ?></p>
<?php
	if(isset($imgs)){
		for($i=0; $i<count($imgs); $i++){
			echo "<img class=\"item i4\" src=\"img/{$imgs[$i]["img"]}\" alt=\"trainer_pic\">";
		}
	}
?>		
	</main>
	<?php get_footer(); ?>
</body>
</html>