<?php
//Filename: valid.php
//Coded by: Adam Humpherys -- www.thescrpters.com
//First call database configuration
include("includes/db.php");
//Include strip_slashes function file
include("includes/slashes.php");
//Set variables
$ficId = $_REQUEST['ficId'];
$valid = $_REQUEST['validate'];
$rating = $_REQUEST['rating'];
//Query database for fic info
$result = mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$ficId'",$connect);
while($myrow = mysql_fetch_array($result))
  {
    $author = $myrow['author'];
    $authorEmail = $myrow['authorEmail'];
    $ficTitle = $myrow['ficTitle'];
    $ficChapter = $myrow['chapter'];
    $ficValid = $myrow['valid'];
  }
//Create the different scenarios
//If the validate form said "True" then keep and update db to True so it will be active
if ($valid == "true")
  {
    $verifyForm = mysql_query("UPDATE kpff_fics SET valid = 'True', rating = '$rating' WHERE fanFicId = '$ficId'",$connect);
    //We need to tell the user their story was accepted.
    mail("$author <$authorEmail>","Story Accepted And Activated",strip_gpc_slashes("Dear $author,\n\nWe're happy to let you know your story \"$ficTitle - $ficChapter\" has been accepted and activated. You can view it here:\n\nhttp://www.kpfanfiction.com/fics.php?fic=$ficId\n\nThank you.\nKPFanFiction.com Team"),"From: KPFF Editors <editors@kpfanfiction.com>");
  }
//If the validate form said "False" then delete the record altogether
if ($valid == "false")
  {
    $verifyForm = mysql_query("DELETE FROM kpff_fics WHERE fanFicId = '$ficId' LIMIT 1",$connect);
    //Even though it was rejected, we need to tell the user so they aren't waiting on it.
    mail("$author <$authorEmail>","Story Rejected and Removed",strip_gpc_slashes("Dear $author,\n\nWe regret to inform you that your story was rejected from KPFanFiction.com.\n\nIt was probably against the guidelines somehow. For more information, We would suggest contacting editors@kpfanfiction.com to find out exactly why. Then you may try again by using the submission form.\n\nThank you.\nKPFanFiction.com Team"),"From: KPFF Editors <editors@kpfanfiction.com>");
  }
echo "<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"includes/kpff.css\"></head><body>";
echo "<a href=\"javascript:window.close();\">Close Window</a></body></html>";
?>
