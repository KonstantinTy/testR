<?php
  require_once "mysqlCon.php";
  
  $myLogin = $_REQUEST["myLogin"];
  if (isset($_REQUEST["fraction"])) {
    $fraction = $_REQUEST["fraction"];
  }
  $rusFrac = array(
    "rusher" => "рашер",
	"defer" => "дефер",
	"caster" => "кастер",
	"elph" => "эльф",
  );
  if (!isset($fraction)) {
    echo "Общий рейтинг";
  } else {
    echo "Рейтинг среди ".$rusFrac[$fraction]."ов";
  }
  if (!isset($fraction)) {
    $r = mysql_query("SELECT * FROM players ORDER BY points DESC");
  } else {
    $r = mysql_query("SELECT * FROM players WHERE fraction = '".$fraction."' ORDER BY points DESC");
  }
  echo "<table border = \"2\">
    <tr> <td></td><td> Имя </td><td> Стиль </td><td> Очки </td></tr>";
  $n = 0;
  for ($playerz = array(); $player = mysql_fetch_assoc($r); $playerz[] = $player) {
    $n = $n + 1;
	echo "
	  <tr> 
	    <td> ".$n.". </td>
	    <td> <a href = \"user.php?oppId=".$player["id"]."&myLogin=".$myLogin."\">".$player["login"]." </a> </td>
		<td> ".$rusFrac[$player["fraction"]]." </td>
		<td> ".$player["points"]."</td>
	  </tr>
	";
  }
  echo "</table>";
  echo "<br>
  А еще ты можешь просмотреть отдельные рейтинги среди игроков каждого из стилей! <br>
  <form action = \"rating.php\" method = post>
  <select size = \"4\" required name = \"fraction\">
  <option value = \"rusher\"> Рашер </option>
  <option value = \"defer\"> Дефер </option>
  <option value = \"caster\"> Кастер </option>
  <option value = \"elph\"> Эльф </option>
  </select> <br>
  <input type = submit name = \"go\" value = \"Посмотреть\">
  <input type = hidden name = \"myLogin\" value = \"".$myLogin."\">
  </form>";
  if (isset($fraction)) {
    echo "<br> Или перейти к <form action = \"rating.php\" method = post> 
      <input type = hidden name = \"myLogin\" value = \"".$myLogin."\">
	  <input type = submit name = \"go\" value = \"общему рейтингу\">
	</form>";  
  }
  $me = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE login = '".$myLogin."'"));
  echo " <br>
<form action = \"userPage.php\" method = post>
<input type = submit name = \"newbie\" value = \"Вернуться\">
<input type = hidden name = \"login\" value = \"".$me["login"]."\">
<input type = hidden name = \"password\" value = \"".$me["password"]."\">
</form>";
 ?>