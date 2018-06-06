<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?= $title ?></title>
<body>

<br><br>

<?php if (!empty($error)): ?>
<h3><?= $error ?></h3>
<?php else: ?>

<table style="width:300px; text-align: left">
<?php foreach ($datas as $key => $data):?>
<tr>
  <td><?= $key ?></td>
  <td><?= $data ?></td>
</tr>
<?php endforeach;
      endif; ?>
</table>
</body>
</html>
