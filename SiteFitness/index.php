<?php
	include 'functions.php';
	if (isset($_GET["a"])){
		if ($_GET["a"]=="send"){
			$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
			$name = $_POST["name"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$text = $_POST["text"];
			$q = "INSERT INTO requests (date, name, phone, email, text, processed) VALUES (NOW(), '{$name}', '{$phone}', '{$email}', '{$text}', '0');";
			$db->exec($q);
			header("Location: index.php");
		}
	}
	$res = get_advert();
?>
<html>
<head>
	<title>ИСТинный ФИТнес</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header(); ?>
	<h1>ИСТинный ФИТнес</h1>
	<main class="full">
		<div class="part1">
			<p><?php echo($res[0]["text"]); ?></p>
		</div>
		<img class="part2" src="img/perm/<?php echo($res[0]["img"]); ?>" alt="advertisment">
		<h2>Напишите нам!</h2>
		<form method="POST" action="index.php?a=send">
			<input class="third" type="text" name="name" placeholder="Представьтесь, пожалуйста">
			<input class="third" type="text" name="phone" placeholder="Ваш номер телефона">
			<input class="third" type="text" name="email" placeholder="Ваша электронная почта"><br>
			<input class="big high" type="text" name="text" placeholder="Ваше сообщение"><br>
			<input class="big button" type="submit" name="send" value="Отправить">
		</form>
	</main>
	<?php get_footer(); ?>
</body>
</html>