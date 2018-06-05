<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Калькулятор</title>
<body>

<br><br>

<form method="post" action="index.php">

<label for="username">Введите чиcло #1<br></label><input type="text" size="3" name="count1"><br>
<label for="username">Введите чиcло #2<br></label><input type="text" size="3" name="count2"><br>

<label for="username">Выберите операцию<br></label>
<select name="operation">
  <option selected value="summ">+</option>
  <option value="sub">-</option>
  <option value="multi">*</option>
  <option value="div">/</option>
  <option value="square"></option>
 <option value="div">/</option>
 <option value="div">/</option>    
</select><br><br>
<input type="submit" value="посчитать">
</form>
</body>
</html>
