<?php
  $user = 'root';
  $password = '';
  $host = 'localhost';
  $db = 'players';

  mysql_connect($host, $user, $password);
  @mysql_query("CREATE DATABASE ".$db);
  mysql_select_db($db);
  @mysql_query("CREATE TABLE players (id INT AUTO_INCREMENT PRIMARY KEY, login TEXT, password TEXT, fraction TEXT, points INT)");
#  echo mysql_error();
?>