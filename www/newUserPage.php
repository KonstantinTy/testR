<?php
  require_once "mysqlCon.php";
  $login = $_REQUEST["newUserName"];
  $password = $_REQUEST["newUserPassword"];
  $fraction = $_REQUEST["fraction"];
  if ($fraction == "Рашер") {
    $fraction = "rusher";
  }
  if ($fraction == "Дефер") {
    $fraction = "defer";
  }
  if ($fraction == "Кастер") {
    $fraction = "caster";
  }
  if ($fraction == "Эльф") {
    $fraction = "elph";
  }
  $ct = mysql_result(mysql_query("SELECT COUNT(*) FROM players WHERE login = '".$login."'"), 0, 0);
//  echo "<br> $ct <br>";
  if ($ct > 0) {
    echo "Не обманывай меня! Я старик, но это не значит, что у меня склероз! Я уже знаком с $login";
  } else {
    echo "
	Да будет нерушимой наша дружба, $login ! Теперь ты можешь начать своё приключение!<br>";
	echo "
<form action = \"userPage.php\" method = post>
<input type = submit name = \"newbie\" value = \"Вперееед!\">
<input type = hidden name = \"login\" value = \"".$login."\">
<input type = hidden name = \"password\" value = \"".$password."\">
</form>
    ";
    mysql_query("INSERT INTO players SET login = '".$login."', password = '".$password."', fraction = '".$fraction."', points = '0'"); 
#    echo mysql_error();
  }
?>
