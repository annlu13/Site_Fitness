<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	$DBquery="SELECT * FROM news ORDER BY date DESC";
	$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
	<title>Новости</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header(); ?>
	<h1>Новости</h1>
	<main class="full">
<?php
	for($i=0; $i<count($res); $i++){
		$img = get_first_pic($res[$i]["ID"]);
		echo "<a href=\"news_one.php?id={$res[$i]["ID"]}\" class=\"item i5\">";
		if(isset($img)) echo "<img src=\"img/{$img}\" alt=\"news_pic\">";
		else echo "<img src=\"img/perm/logo.png\" alt=\"logo\">";
		echo "<br>{$res[$i]["name"]}</a>";
	}
?>
	</main>
	<?php get_footer(); ?>
</body>
</html>