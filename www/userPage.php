<?php
  require_once "mysqlCon.php";
  
  $login = $_REQUEST['login'];
  $password = $_REQUEST['password'];
  $ct = mysql_result(mysql_query("SELECT COUNT(*) FROM players WHERE login = '".$login."' AND password = '".$password."'"), 0, 0);
  if ($ct  == 0) {
    echo "Вероятно, ты ошибся со своим секретным словом, друг, ишь какое оно у тебя мудреное!";
   } else {
    echo "Привет, старый друг $login ! <br>";
	$usr = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE login = '".$login."' AND password = '".$password."'"));
	$points = $usr["points"];
	$fraction = $usr["fraction"];
	$fractionChanges = array (
	  "rusher" => "рашер",
	  "defer" => "дефер",
	  "caster" => "кастер",
	  "elph" => "эльф",
	);
	$fraction = $fractionChanges[$fraction];
	echo "Как твои дела, ".strtolower($fraction)."? Сейчас у тебя вот столечко очков, у меня записано: $points";
	echo "<br>
	<form action = \"findOpponent.php\" method = post>
	Отправляйся в бой прямо сейчас! Просто укажи имя несчастного супостата! <br>
	<input type = text name = \"opponentLogin\" value = \"\">
	<input type = submit name = \"toBattle\" value = \"Подыскать соперника!\">
	<input type = hidden name = login value = \"".$login."\">
	</form>";
	echo "<br>
	  Можешь полюбоваться на общий рейтинг всех игроков!
	  <form action = \"rating.php\" method = post>
	  <input type = submit name = \"watafaka\" value = \"Взглянуть\">
	  <input type = hidden name = myLogin value = \"".$login."\">
	  </form>	
	";
	echo "<br>
	<form action = \" startpage.html\" method = post>
	<input type = submit name = \"watafaka\" value = \"До встречи!\">
	</form>
	";
	}
?>