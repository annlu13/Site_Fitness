<?php
	include 'functions.php';
	$res = get_contacts();
?>
<html>
<head>
	<title>Контакты</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header(); ?>
	<h1>Контакты</h1>
	<main class="full contacts">
		<p><span>Адрес: </span><?php echo($res[0]["address"]) ?></p>
		<p><span>Телефон: </span><?php echo($res[0]["phone"]) ?></p>
		<p><span>E-mail: </span><?php echo($res[0]["email"]) ?></p>
		<p><span>Социальные сети:</span></p>
		<p>
			<a href="<?php echo($res[0]["vk"]) ?>"><img class="footer" src="img/perm/vk.png" alt="vk"></a>
			<a href="<?php echo($res[0]["inst"]) ?>"><img class="footer" src="img/perm/inst.png" alt="inst"></a>
		</p>
	</main>
</body>
</html>