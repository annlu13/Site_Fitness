<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['id'])){
		$DBquery="SELECT * FROM news WHERE ID={$_GET["id"]};";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		$imgs = get_all_news_pics($_GET["id"]);
		if(isset($_GET['a'])){
			if($_GET['a']=='like'){
				if($res[0]["liked"]=="0") $like="1";
				else if($res[0]["liked"]=="1") $like="0";
				$q="UPDATE news SET liked=\"{$like}\" WHERE ID={$_GET["id"]};";
				$db->exec($q);
				header("Location: news_one.php?id={$_GET["id"]}");
			}
		}
	}
?>
<html>
<head>
	<title>Новости | <?php echo($res[0]["name"]); ?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header(); ?>
	<h1>Новости</h1>
	<h2><?php echo($res[0]["name"]); ?></h2>
	<main class="full">
		<p class="date">Дата публикации: <?php echo($res[0]["date"]); ?></p>
		<p class="description"><?php echo($res[0]["text"]); ?></p>
<?php
	if(isset($imgs)){
		for($i=0; $i<count($imgs); $i++){
			echo "<img class=\"item i5\" src=\"img/{$imgs[$i]["img"]}\" alt=\"news_pic\">";
		}
	}
	if($res[0]["liked"]=="0") $like = "heart_no.png";
	else if($res[0]["liked"]=="1") $like = "heart_yes.png";
?>
	<br>
	<div class="like"><a href="news_one.php?a=like&id=<?php echo($_GET["id"]); ?>"><button><img class="like" src="img/perm/<?php echo($like); ?>"></button></a></div>
	</main>
	<?php get_footer(); ?>
</body>
</html>