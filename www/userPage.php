<?php
  require_once "mysqlCon.php";
  
  $login = $_REQUEST['login'];
  $password = $_REQUEST['password'];
  $ct = mysql_result(mysql_query("SELECT COUNT(*) FROM players WHERE login = '".$login."' AND password = '".$password."'"), 0, 0);
  if ($ct  == 0) {
    echo "��������, �� ������ �� ����� ��������� ������, ����, ��� ����� ��� � ���� ��������!";
   } else {
    echo "������, ������ ���� $login ! <br>";
	$usr = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE login = '".$login."' AND password = '".$password."'"));
	$points = $usr["points"];
	$fraction = $usr["fraction"];
	$fractionChanges = array (
	  "rusher" => "�����",
	  "defer" => "�����",
	  "caster" => "������",
	  "elph" => "����",
	);
	$fraction = $fractionChanges[$fraction];
	echo "��� ���� ����, ".strtolower($fraction)."? ������ � ���� ��� �������� �����, � ���� ��������: $points";
	echo "<br>
	<form action = \"findOpponent.php\" method = post>
	����������� � ��� ����� ������! ������ ����� ��� ����������� ���������! <br>
	<input type = text name = \"opponentLogin\" value = \"\">
	<input type = submit name = \"toBattle\" value = \"��������� ���������!\">
	<input type = hidden name = login value = \"".$login."\">
	</form>";
	echo "<br>
	  ������ ������������ �� ����� ������� ���� �������!
	  <form action = \"rating.php\" method = post>
	  <input type = submit name = \"watafaka\" value = \"���������\">
	  <input type = hidden name = myLogin value = \"".$login."\">
	  </form>	
	";
	echo "<br>
	<form action = \" startpage.html\" method = post>
	<input type = submit name = \"watafaka\" value = \"�� �������!\">
	</form>
	";
	}
?>