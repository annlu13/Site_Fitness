<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	$DBquery="SELECT * FROM locations ORDER bY name ASC";
	$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
	<title>Залы</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header();
	get_about_aside(); ?>
	<main class="part1">
		<h1>Залы</h1>
<?php
	for($i=0; $i<count($res); $i++){
		$img = get_first_loc_pic($res[$i]["ID"]);
		echo "<a href=\"locations_one.php?id={$res[$i]["ID"]}\" class=\"item i4\">";
		if(isset($img)) echo "<img src=\"img/{$img}\" alt=\"loc_pic\">";
		else echo "<img src=\"img/perm/logo.png\" alt=\"logo\">";
		echo "<br>{$res[$i]["name"]}</a>";
	}
?>
	</main>
	<?php get_footer(); ?>
</body>
</html>