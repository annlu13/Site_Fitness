<?php
	include 'functions.php';
	$wrong = false;
	if(isset($_GET['a'])){
		if($_GET['a']=='enter'){
			$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
			$DBquery="SELECT * FROM admin";
			$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
			$login = $_POST["login"];
			$password = $_POST["password"];
			if($login!=$res[0]["login"]||$password!=$res[0]["password"]){
				header("Location: enter.php?a=wrong");
			}
			else{
				header("Location: admin_requests.php");
			}
		}
		if($_GET['a']=='wrong'){
			$wrong = true;
		}
	}
?>
<html>
<head>
	<title>Вход</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php get_header(); ?>
	<h1>Вход</h1>
	<main class="full">
<?php
	if($wrong) echo "<p class=\"bad\">Введённые данные не соответствуют данным администратора!<br>Введите верные данные или вернитесь к просмотру сайта!</p>";
?>
		<form method="POST" action="enter.php?a=enter">
			<input class="big" type="text" name="login" placeholder="Логин">
			<input class="big" type="password" name="password" placeholder="Пароль">
			<input class="big button" type="submit" value="Отправить">
		</form>
	</main>
	<?php get_footer(); ?>
</body>
</html>