<?php
  if (!isset($_REQUEST['nameEntered'])) {
?>
������!<br>
������� ���� ���, ����������:
<form action = "<?=$_SERVER['SCRIPT_NAME']?>" method = post>
<input type = text name = "userName" value = ""> <br>
<input type = submit name = "nameButton" value = "������!">
<input type = hidden name = "nameEntered" value = 1>
</form>
<?php
} else {
  if (!isset($_REQUEST['valueEntered'])) {
echo "��, ����������, ".$_REQUEST['userName']."!<br>";
?>
������ ������� �����, ����� ���:
<form action = "<?=$_SERVER['SCRIPT_NAME']?>" method = post>
<input type = text name = "numberOf" value = ""> <br>
<input type = submit name = "numberButton" value = "������!">
<input type = hidden name = "nameEntered" value = 1>
<input type = hidden name = "valueEntered" value = 1>
<input type = hidden name = "userName" value = <?php echo $_REQUEST['userName'] ?>>
</form>
<?php
} else {
for ($i = 0; $i < $_REQUEST['numberOf']; $i++) {
if (($i == 1) || ($i == 3) || ($i == 2)) {
$s = "�";
} else {
$s = "";
}
  echo "�������, ".$_REQUEST['userName']."!  � ������ ��� ��� ".($i+1)." ���".$s."!! <br>";
}
}
}
?>