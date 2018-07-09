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

			<p><strong>Оригинальный файл</strong> <br>
			<?php foreach ($getFile as $file):?>
				<?= $file?><br>
			<?php endforeach;?> </p>

      <p><strong>Получить строку #<?= $getStringNum ?></strong>  <br><?= $getLine ?></p>

      <p><strong>Получить символ #<?= $getSymbolNum ?> из строки #<?= $getStringNum ?></strong> <br><?= $getSymbol ?></p>

      <p><strong>Заменить строку #<?= $repStringNum ?></strong> <br>
      <?php foreach ($replaceLine as $line):?>
          <?= $line?><br>
      <?php endforeach;?> </p>

      <p><strong>Заменить символ #<?= $repSumbolNum ?> в строке #<?= $repStringNum ?></strong> <br>
      <?php foreach ($replaceSymbol as $symbol):?>
          <?= $symbol?><br>
      <?php endforeach;
    endif; ?>

</body>
</html>
