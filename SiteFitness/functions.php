<?php
	function get_header(){
		echo "<header>
		<nav>
			<button class=\"logo\" onclick=\"location.href='index.php'\">IST fit</button>
			<button onclick=\"location.href='news.php'\">Новости</button>
			<button onclick=\"location.href='timetable.php'\">О нас</button>
			<button onclick=\"location.href='tariffs.php'\">Абонементы</button>
			<button onclick=\"location.href='gallery.php'\">Фотогалерея</button>
			<button onclick=\"location.href='contacts.php'\">Контакты</button>
			<button class=\"admin\" onclick=\"location.href='enter.php'\">ЛК</button>
		</nav>
		</header>";
	}
	function get_contacts(){
		$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
		$DBquery="SELECT * FROM contacts";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	function get_footer(){
		$res = get_contacts();
		echo "<footer>
		<div>
			<a href=\"{$res[0]["vk"]}\"><img class=\"footer\" src=\"img/perm/vk.png\" alt=\"vk\"></a>
			<a href=\"{$res[0]["inst"]}\"><img class=\"footer\" src=\"img/perm/inst.png\" alt=\"inst\"></a>
		</div>
		<div>
			<span>Адрес:</span> {$res[0]["address"]} | 
			<span>Тел.:</span> {$res[0]["phone"]} | 
			<span>E-mail:</span> {$res[0]["email"]}
		</div>
		</footer>";
	}
	function get_about_aside(){
		echo "<aside class=\"part2\">
		<p onclick=\"location.href='timetable.php'\">Расписание</p>
		<p onclick=\"location.href='locations.php'\">Залы</p>
		<p onclick=\"location.href='trainers.php'\">Тренеры</p>
		</aside>";
	}
	function get_price_aside(){
		echo "<aside class=\"part2\">
		<p onclick=\"location.href='tariffs.php'\">Абонементы</p>
		<p onclick=\"location.href='sale.php'\">Акции</p>
		</aside>";
	}
	function get_admin_aside(){
		echo "<aside class=\"part2\">
		<p onclick=\"location.href='admin_requests.php'\">Заявки</p>
		<p onclick=\"location.href='admin_contacts.php'\">Контакты</p>
		<p onclick=\"location.href='admin_advertisment.php'\">Объявление</p>
		<p onclick=\"location.href='admin_news.php'\">Новости</p>
		<p onclick=\"location.href='admin_locations.php'\">Залы</p>
		<p onclick=\"location.href='admin_trainers.php'\">Тренеры</p>
		<p onclick=\"location.href='admin_timetable.php'\">Расписание</p>
		<p onclick=\"location.href='admin_tariffs.php'\">Абонементы</p>
		<p onclick=\"location.href='admin_sale.php'\">Акции</p>
		</aside>";
	}
	function get_advert(){
		$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
		$DBquery="SELECT * FROM advertisment";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	function get_all_news_pics($newsID){
		$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
		$DBquery="SELECT * FROM news_pic WHERE newsID={$newsID} ORDER BY date ASC";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		if(count($res)>0) return $res;
	}
	function get_first_pic($newsID){//новостей
		$res = get_all_news_pics($newsID);
		if(isset($res)) return $res[0]["img"];
	}
	function get_all_loc_pics($locID){
		$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
		$DBquery="SELECT * FROM locations_pic WHERE locationID={$locID} ORDER BY date ASC";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		if(count($res)>0) return $res;
	}
	function get_first_loc_pic($locID){
		$res = get_all_loc_pics($locID);
		if(isset($res)) return $res[0]["img"];
	}
	function get_all_trainer_pics($trainerID){
		$db = new PDO("mysql:dbname=fitness;host=127.0.0.1", "root","");
		$DBquery="SELECT * FROM trainers_pic WHERE trainerID={$trainerID} ORDER BY date ASC";
		$res = $db->query($DBquery)->fetchAll(PDO::FETCH_ASSOC);
		if(count($res)>0) return $res;
	}
	function get_first_trainer_pic($trainerID){
		$res = get_all_trainer_pics($trainerID);
		if(isset($res)) return $res[0]["img"];
	}
	function fill_timetable_cell($res, $i){
		if(isset($res[$i]["name"])) echo "{$res[$i]["name"]}<br>";
		if(isset($res[$i]["trainer"])) echo "<a href=\"trainers_one.php?id={$res[$i]["trainerID"]}\">{$res[$i]["trainer"]}</a><br>";
		if(isset($res[$i]["location"])) echo "<a href=\"locations_one.php?id={$res[$i]["locationID"]}\">{$res[$i]["location"]}</a>";
	}
	function get_timetable_cell($res, $i){
		echo "<td>";
		for ($j=0; $j<count($res); $j++)
			if($res[$j]["ID"]==(string)$i)
				fill_timetable_cell($res, $j);
		echo "</td>";
	}
	function get_admin_timetable_cell($res, $i){
		echo "<td><a href=\"admin_timetable_edit.php?id={$res[$i]["ID"]}\"><button class=\"mid\">ред.</button></a></td>";
	}
?>