<?php
  require_once "mysqlCon.php";
  
  $myLogin = $_REQUEST["myLogin"];
  if (isset($_REQUEST["fraction"])) {
    $fraction = $_REQUEST["fraction"];
  }
  $rusFrac = array(
    "rusher" => "�����",
	"defer" => "�����",
	"caster" => "������",
	"elph" => "����",
  );
  if (!isset($fraction)) {
    echo "����� �������";
  } else {
    echo "������� ����� ".$rusFrac[$fraction]."��";
  }
  if (!isset($fraction)) {
    $r = mysql_query("SELECT * FROM players ORDER BY points DESC");
  } else {
    $r = mysql_query("SELECT * FROM players WHERE fraction = '".$fraction."' ORDER BY points DESC");
  }
  echo "<table border = \"2\">
    <tr> <td></td><td> ��� </td><td> ����� </td><td> ���� </td></tr>";
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
  � ��� �� ������ ����������� ��������� �������� ����� ������� ������� �� ������! <br>
  <form action = \"rating.php\" method = post>
  <select size = \"4\" required name = \"fraction\">
  <option value = \"rusher\"> ����� </option>
  <option value = \"defer\"> ����� </option>
  <option value = \"caster\"> ������ </option>
  <option value = \"elph\"> ���� </option>
  </select> <br>
  <input type = submit name = \"go\" value = \"����������\">
  <input type = hidden name = \"myLogin\" value = \"".$myLogin."\">
  </form>";
  if (isset($fraction)) {
    echo "<br> ��� ������� � <form action = \"rating.php\" method = post> 
      <input type = hidden name = \"myLogin\" value = \"".$myLogin."\">
	  <input type = submit name = \"go\" value = \"������ ��������\">
	</form>";  
  }
  $me = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE login = '".$myLogin."'"));
  echo " <br>
<form action = \"userPage.php\" method = post>
<input type = submit name = \"newbie\" value = \"���������\">
<input type = hidden name = \"login\" value = \"".$me["login"]."\">
<input type = hidden name = \"password\" value = \"".$me["password"]."\">
</form>";
 ?>