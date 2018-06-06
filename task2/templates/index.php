<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Калькулятор</title>
<body>

<br><br>


<table style="width:300px; text-align: left">
<?php foreach ($datas as $key => $data):?>
<tr>
  <td><?= $key ?></td>
  <td><?= $data ?></td>
</tr>
<?php endforeach;?>
</table>
</body>
</html>
