<?php
  require_once "mysqlCon.php";
  
  $id = $_REQUEST["oppId"];
  $myLogin = $_REQUEST["myLogin"];
  $user = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE id = '".$id."'"));
  $fractionChanges = array (
	  "rusher" => "�����",
	  "defer" => "�����",
	  "caster" => "������",
	  "elph" => "����",
	);
  echo "��, ��� ��, ��� �� ������! ���������:
  <table>
    <tr>
	  <td> ���: </td>
	  <td> ".$user["login"]." </td>
	</tr>
	<tr>
	  <td> �����: </td>
	  <td> ".$fractionChanges[$user["fraction"]]." </td>
	</tr>
	<tr>
	  <td> ����: </td>
	  <td> ".$user["points"]." </td>
	</tr>
  </table> <br>
  ������ ������� �� ���� ����� ������!<br>
  <form action = \"battle.php\" method = post>
  <input type = submit name = \"toBattle\" value = \"� ���!\" >
  <input type = hidden name = \"oppId\" value = \"".$user["id"]."\">
  <input type = hidden name = \"myLogin\" value = \"".$myLogin."\">
  </form>";
  $me = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE login = '".$myLogin."'"));
  echo " <br>
<form action = \"userPage.php\" method = post>
<input type = submit name = \"newbie\" value = \"���������\">
<input type = hidden name = \"login\" value = \"".$me["login"]."\">
<input type = hidden name = \"password\" value = \"".$me["password"]."\">
</form>";
 ?>
  
	
	 