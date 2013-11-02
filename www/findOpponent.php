<?php
  require_once "mysqlCon.php";
  
  $opponentLogin = $_REQUEST["opponentLogin"];
  $myLogin = $_REQUEST["login"];
  $ct = mysql_result(mysql_query("SELECT COUNT(*) FROM players WHERE login = '".$opponentLogin."'"), 0, 0);
  if ($ct == 0) {
    echo "Увы, еще никто не назывался таким именем! Вспомни-ка получше имя того подлеца... или поищи его в рейтингах!";
	echo "
<form action = \"userPage.php\" method = post>
<input type = submit name = \"newbie\" value = \"Вернуться домой\">
<input type = hidden name = \"login\" value = \"".$me["login"]."\">
<input type = hidden name = \"password\" value = \"".$me["password"]."\">
</form>";
  } else {
    $opp = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE login = '".$opponentLogin."'"));
//	echo var_dump($opp);
	$fractionChanges = array (
	  "rusher" => "рашер",
	  "defer" => "дефер",
	  "caster" => "кастер",
	  "elph" => "эльф",
	);
	if ($myLogin == $opp["login"]) {
	  echo "Ты что, воин? Это ж твоё собственное имя!";
	} else {
	echo "Да-да, припоминаю этого ".$fractionChanges[$opp["fraction"]]."а! <br>
	<form action = \"user.php\" method = post>
	<input type = submit name = \"go\" value = \"Наведаться к врагу!\">
	<input type = hidden name = \"oppId\" value = \"".$opp["id"]."\">
	<input type = hidden name = \"myLogin\" value = \"".$myLogin."\">
	</form>";
	}
	}
?>