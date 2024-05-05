<?php
	include 'functions.php';
	$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
	if (isset($_GET['id'])){
		$DBquery="SELECT * FROM requests WHERE ID={$_GET["id"]};";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		if($res[0]["processed"]==0) $n=1;
		else if($res[0]["processed"]==1) $n=0;
		$q = "UPDATE requests SET processed=$n  WHERE ID={$_GET["id"]};";
		$db->exec($q);
		header("Location: admin_requests.php");
	}
	$DBquery="SELECT * FROM requests ORDER BY processed ASC, date DESC";
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
		<h1>Зявки</h1>
		<table>
			<thead>
				<td>Дата</td>
				<td>Имя</td>
				<td>Телефон</td>
				<td>E-mail</td>
				<td>Сообщение</td>
				<td>Обработано</td>
				<td class="noborder"></td>
			</thead>
<?php
	for($i=0; $i<count($res); $i++){
		echo "<tr>";
		foreach($res[$i] as $key => $cell){
			if($key!="ID"){
				if($key=="processed"){
					if($cell==0){
						echo "<td>Нет</td>";
						echo "<td class=\"noborder\"><a href=\"admin_requests.php?id={$res[$i]["ID"]}\"><button class=\"good\">✓</button></a></td>";
					}
					else if($cell==1){
						echo "<td>Да</td>";
						echo "<td class=\"noborder\"><a href=\"admin_requests.php?id={$res[$i]["ID"]}\"><button class=\"bad\">×</button></a></td>";
					}
				}
				else echo "<td>{$cell}</td>";
			}
		}
		echo "</tr>";
	}
?>
		</table>
	</main>
	<?php get_footer(); ?>
</body>
</html>