<?php
  require_once "mysqlCon.php";
  $login = $_REQUEST["newUserName"];
  $password = $_REQUEST["newUserPassword"];
  $fraction = $_REQUEST["fraction"];
  if ($fraction == "�����") {
    $fraction = "rusher";
  }
  if ($fraction == "�����") {
    $fraction = "defer";
  }
  if ($fraction == "������") {
    $fraction = "caster";
  }
  if ($fraction == "����") {
    $fraction = "elph";
  }
  $ct = mysql_result(mysql_query("SELECT COUNT(*) FROM players WHERE login = '".$login."'"), 0, 0);
//  echo "<br> $ct <br>";
  if ($ct > 0) {
    echo "�� ��������� ����! � ������, �� ��� �� ������, ��� � ���� �������! � ��� ������ � $login";
  } else {
    echo "
	�� ����� ��������� ���� ������, $login ! ������ �� ������ ������ ��� �����������!<br>";
	echo "
<form action = \"userPage.php\" method = post>
<input type = submit name = \"newbie\" value = \"��������!\">
<input type = hidden name = \"login\" value = \"".$login."\">
<input type = hidden name = \"password\" value = \"".$password."\">
</form>
    ";
    mysql_query("INSERT INTO players SET login = '".$login."', password = '".$password."', fraction = '".$fraction."', points = '0'"); 
#    echo mysql_error();
  }
?>
