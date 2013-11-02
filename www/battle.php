<?php
  require_once "mysqlCon.php";
  
  $id = $_REQUEST["oppId"];
  $myLogin = $_REQUEST["myLogin"];
  $me = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE login = '".$myLogin."'"));
  $opp = mysql_fetch_assoc(mysql_query("SELECT * FROM players WHERE id = '".$id."'"));
  if ($myLogin != $opp["login"]) {
  $myFrac = $me["fraction"];
  $oppFrac = $opp["fraction"];
  $fracWinnings = array(
    "rusher" => "caster",
	"caster" => "defer",
	"defer" => "rusher",
	);
  if ($myFrac == "elph") {
    if ($oppFrac == "elph") {
	  $res = rand(0, 1);
	  if ($res == 1) {
	    $win = true;
		$myExp = 5;
		$oppExp = 4;
	  } else {
	    $win = false;
		$myExp = 4;
		$oppExp = 5;
	  }
	 } else {
	   $win = true;
	   $myExp = 5;
	   $oppExp = 1;
	 }
  } else {
    if ($oppFrac == "elph") {
	  $win = false;
	  $myExp = 1;
	  $oppExp = 5;
	} else {
	  if ($myFrac == $oppFrac) {
	    $res = rand(0, 1);
	    if ($res == 1) {
	      $win = true;
     	  $myExp = 5;
		  $oppExp = 4;
	    } else {
	      $win = false;
		  $myExp = 4;
		  $oppExp = 5;
	    }
	  } else {
	    if ($myFrac == $fracWinnings[$oppFrac]) {
		  $win = false;
		  $myExp = 2;
		  $oppExp = 5;
		} else {
		  $win = true;
		  $myExp = 5;
		  $oppExp = 2;
		}
	  }
	}
  }
  if ($win) {
    echo "Славная победа! Поздравляю! <br>";
  } else {
    echo "Эх, неудача! :( <br>";
  }
  echo "Ты получаешь аккурат столько очков: ".$myExp."<br>";
  echo $opp["login"]." получает ровно столько очков: ".$oppExp."<br>";
  $myNewExp = $myExp + $me["points"];
  $oppNewExp = $oppExp + $opp["points"];
  mysql_query("UPDATE players SET points = '".$myNewExp."' WHERE id = '".$me["id"]."'");
//  echo mysql_error();
  mysql_query("UPDATE players SET points = '".$oppNewExp."' WHERE id = '".$opp["id"]."'");
//  echo mysql_error();
  } else {
  echo "Скажем нет мазохизму!";
  }
  echo " Пора возвращаться домой!
<form action = \"userPage.php\" method = post>
<input type = submit name = \"newbie\" value = \"Вернуться\">
<input type = hidden name = \"login\" value = \"".$me["login"]."\">
<input type = hidden name = \"password\" value = \"".$me["password"]."\">
</form>";
?>