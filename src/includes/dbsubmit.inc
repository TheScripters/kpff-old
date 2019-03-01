<h2>Submit Fanfiction</h2>
<br><br><center>
<?
if ($userNameSession)
 {
  include("includes/dbsubmitform.inc");
 }
else
 {
  echo("<i><font color=red size=6>You must be logged in to submit a fan fiction.</font></i>");
 }
?>
