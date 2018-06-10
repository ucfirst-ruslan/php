<html>
<head>
	<title>%TITLE%</title>
</head>
<body>
<div><h2>Contact Form</h2></div>
<div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>


<form name="contact" method="post" action="index.php">
 	<p><b>Name:</b><br>
		<input type="text" name="name" size="30">
	</p>
	<p><b>Email:</b><br>
		<input type="email" name="email" size="30">
	</p>

	<p><b>Subj:</b><br>
	<select name="subj">
		<option selected disabled>Select subj</option>
		<option value="SUBJ_1"><?php ucfirst(SUBJ_1)?></option>
		<option value="SUBJ_2"><?php ucfirst(SUBJ_2)?></option>
		<option value="SUBJ_3"><?php ucfirst(SUBJ_3)?></option>
    </select></p>
   
	<p><b>Message:</b><br>
		<textarea name="message" cols="40" rows="5"></textarea></p>
	<p><input type="submit" value="Send">
  </form>
 
</body>
</html>
