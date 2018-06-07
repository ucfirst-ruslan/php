<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
</head>

<body>

<h1> Upload File</h1>

<form enctype="multipart/form-data" method="post"> 
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"> 
    <input name="file" type="file">
    <input type="submit" value="Загрузить">
</form>

<br><br>
<?php if (!empty($messForUser['error'])): ?>
  <h3 style="color: red"><?= $messForUser['error'] ?></h3>
<?php endif; ?>

<?php if (!empty($messForUser['success'])): ?>
    <h3  style="color: blue"><?= $messForUser['success'] ?></h3>
<?php endif; ?>

<br><br>
<table style="width:768px; text-align: left; border:1px solid black">
  <tr>
    <th>#</th>
    <th>File Name</th>
    <th>Size</th>
    <th>Delete</th>
  </tr>
<form method="post">
<?php if (!empty($arrDateDir)): 
    foreach ($arrDateDir as $key => $dateDir): ?>
    <tr>
    <td><?= $setIteration ?></td>
    <td><?= $key ?></td>
    <td><?= $dateDir ?></td>
    <td><button value="<?= $key ?>" name="delete" type="submit">Удалить</button></td>
    </tr>
<?php $setIteration++;
    endforeach; 
    endif; ?>

</form>
</table>

</body>
</html>
