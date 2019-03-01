<?php
$ficId = $_REQUEST['ficId'];
$validate = "true";
?>
<html>
<head>
<head>
<link rel="stylesheet" type="text/css" href="includes/kpff.css">
<title>Verify Rating</title>
</head>
<body>
<h2>Verify Rating</h2>

<center><form action="validwin.php" method="post" name="verifyForm">
<input type="hidden" name="ficId" value="<?echo$ficId?>"><input type="hidden" name="validate" value="<?echo$validate?>">
<select name="rating"><option name="rating" value="K">K<option name="rating" value="K+">K+<option name="rating" value="T">T<option name="rating" value="M">M<option name="rating" valie="MA">MA</select>&nbsp; <input type="submit" value="Validate!"></form></center>
</body>
</html>
