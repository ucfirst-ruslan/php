<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
</head>

<body>

<h1> Upload File</h1>

<form enctype="multipart/form-data" method="post"> 
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"> 
    Send this file: <input name="file" type="file"> 
    <input type="submit" value="Send File"> 
</form>
<br><br>
<table style="width:100%">
  <tr>
    <th>#</th>
    <th>File Name</th> 
    <th>Size</th>
  </tr>
  <tr>
<?php $i = 1; foreach ($arrDateDir as $key => $dateDir):?> 
    <td><?= $i ?></td>
    <td><?= $key ?></td> 
    <td><?= $dateDir ?></td>
<?php endforeach; ?>
  </tr>
</table>

</body>
</html>
