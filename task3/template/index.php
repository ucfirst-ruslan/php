<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?= $title ?></title>
<body>

<br>

<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error):?>
      <h3> Ошибка: <?= $error ?> </h3>
    <?php endforeach;
    else: ?>

      <p><strong>Получить линию</strong> <br><?= $getLine ?></p>

      <p><strong>Получить символ</strong> <br><?= $getSymbol ?></p>

      <p><strong>Заменить линию</strong> <br>
      <?php foreach ($replaceLine as $line):?>
          <?= $line?><br>
      <?php endforeach;?> </p>

      <p><strong>Заменить сивол</strong> <br>
      <?php foreach ($replaceSymbol as $symbol):?>
          <?= $symbol?><br>
      <?php endforeach;
    endif; ?>

</body>
</html>
