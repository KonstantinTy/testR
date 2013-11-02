<?php
  if (!isset($_REQUEST['nameEntered'])) {
?>
Привет!<br>
Введите Ваше имя, пожалуйста:
<form action = "<?=$_SERVER['SCRIPT_NAME']?>" method = post>
<input type = text name = "userName" value = ""> <br>
<input type = submit name = "nameButton" value = "ввести!">
<input type = hidden name = "nameEntered" value = 1>
</form>
<?php
} else {
  if (!isset($_REQUEST['valueEntered'])) {
echo "Ну, здравствуй, ".$_REQUEST['userName']."!<br>";
?>
Теперь введите число, прошу Вас:
<form action = "<?=$_SERVER['SCRIPT_NAME']?>" method = post>
<input type = text name = "numberOf" value = ""> <br>
<input type = submit name = "numberButton" value = "ввести!">
<input type = hidden name = "nameEntered" value = 1>
<input type = hidden name = "valueEntered" value = 1>
<input type = hidden name = "userName" value = <?php echo $_REQUEST['userName'] ?>>
</form>
<?php
} else {
for ($i = 0; $i < $_REQUEST['numberOf']; $i++) {
if (($i == 1) || ($i == 3) || ($i == 2)) {
$s = "а";
} else {
$s = "";
}
  echo "Молодец, ".$_REQUEST['userName']."!  Я сказал это уже ".($i+1)." раз".$s."!! <br>";
}
}
}
?>