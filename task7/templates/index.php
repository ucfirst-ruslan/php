<html>
<head>
	<title>%TITLE%</title>
</head>
<body>
<div><h2>Contact Form</h2></div>
<div style="color: #FF0000; font-size: 15px;"><strong>%ERR_DATE%</strong></div>


<form name="contact" method="post" action="index.php">
	<p><b>Name:</b><br>
		<input type="text" name="name" size="30" value="%FIELD_NAME%"><br>
	<div style="color: #FF0000; font-size: 15px;"><strong>%ERR_NAME%</div>
	</p>
	<p><b>Email:</b><br>
		<input type="email" name="email" size="30" value="%FIELD_EMAIL%"><br>
	<div style="color: #FF0000; font-size: 15px;"><strong>%ERR_EMAIL%</div>
	</p>

	<p><b>Department:</b><br>
		%SELECT% <br>
	<div style="color: #FF0000; font-size: 15px;"><strong>%ERR_DEP%</div>
	</p>

	<p><b>Message:</b><br>
		<textarea name="message" cols="40" rows="5">%FIELD_MESS%</textarea><br>
	<div style="color: #FF0000; font-size: 15px;"><strong>%ERR_MESS%</div>
	</p>
	<input type="hidden" name="date" id="setDate" value="">
	<p><input id="btn" type="submit" onclick="getDate()" value="Send">
</form>

</body>
<script>
    function getDate() {
        var date = new Date();
        input = document.getElementById("setDate");
        input.value = date;
    }
</script>
</html>
