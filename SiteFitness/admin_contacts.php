<?php
	include 'functions.php';
	if (isset($_GET["a"])){
		if ($_GET["a"]=="upd"){
			$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
			$addr = $_POST["address"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$vk = $_POST["vk"];
			$inst = $_POST["inst"];
			$q = "UPDATE contacts SET address = \"{$addr}\", phone = \"{$phone}\", email = \"{$email}\", vk = \"{$vk}\", inst = \"{$inst}\"";
			$db->exec($q);
			header("Location: admin_contacts.php");
		}
	}
	$res = get_contacts();
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
		<h1>Контакты</h1>
		<form method="POST" action="admin_contacts.php?a=upd">
			<input class="full" type="text" name="address" placeholder="Адрес" value="<?php echo($res[0]["address"])?>"><br>
			<input class="full" type="text" name="phone" placeholder="Номер телефона" value="<?php echo($res[0]["phone"])?>"><br>
			<input class="full" type="text" name="email" placeholder="Электронная почта" value="<?php echo($res[0]["email"])?>"><br>
			<input class="full" type="text" name="vk" placeholder="Ссылка vk" value="<?php echo($res[0]["vk"])?>"><br>
			<input class="full" type="text" name="inst" placeholder="Ссылка instagram" value="<?php echo($res[0]["inst"])?>"><br>
			<input class="full button" type="submit" value="Отправить">
		</form>
	</main>
	<?php get_footer(); ?>
</body>
</html>