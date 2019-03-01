<?php
$p = $_REQUEST['p'];
if ($p == "update")
  {
    include("includes/db.php");
    $FicID = $_REQUEST['FicID'];
    $rating = $_REQUEST['rating'];
    $RateUpdate = mysql_query("UPDATE kpff_fics SET rating = '$rating' WHERE fanFicId = '$FicID'",$connect);
    header("Location: index.php?mode=rate");
  }
?>
<?php
$ficId = $_REQUEST['update'];
$current = $_REQUEST['current'];
include("includes/header.inc");
?>
<h2>Update Rating</h2>
<center><form action="rating.php?p=update" method="post" name="RateUpdate">
<b>Current Rating:</b> <font color="#FF0000"><i><?echo$current?></i></font><br>
<b>New Rating:</b> <select name="rating"><option name="rating" value="K">K<option name="rating" value="K+">K+<option name="rating" value="T">T<option name="rating" value="M">M<option name="rating" valie="MA">MA</select><input type="hidden" value="<?echo$ficId?>" name="FicID"><br>
<input type="submit" value="Update!"></form></center>
<?include("includes/footer.inc");?>
