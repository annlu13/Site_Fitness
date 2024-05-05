<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	$DBquery="SELECT date, img FROM news_pic UNION SELECT date, img FROM locations_pic UNION SELECT date, img FROM trainers_pic ORDER BY date DESC";
	$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
	<title>Фотогалерея</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header(); ?>
	<h1>Фотогалерея</h1>
	<main class="full">
<?php
	if(count($res)>0){
		for($i=0; $i<count($res); $i++){
			echo "<img class=\"item i5\" src=\"img/{$res[$i]["img"]}\" alt=\"pic\">";
		}
	}
?>		
	</main>
	<?php get_footer(); ?>
</body>
</html>