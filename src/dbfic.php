<?php
include("includes/db.php");
include("includes/slashes.php");
//Set variables for use in SQL queries and email
$userName = strip_gpc_slashes($_REQUEST['userName']);
$userName2 = addslashes($userName);

$userEmail = strip_gpc_slashes($_REQUEST['userEmail']);
$userEmail2 = addslashes($userEmail);

$userFic = strip_gpc_slashes($_REQUEST['userFic']);
$userFic2 = addslashes($userFic);

$userChapter = strip_gpc_slashes($_REQUEST['userChapter']);
$userChapter2 = addslashes($userChapter);

$userText = strip_gpc_slashes($_REQUEST['ficText']);
$userText2 = addslashes($userText);

$date = date("D\, j M Y H:i:s T");
//Insert story into the database
  $submitForm = mysql_query("INSERT INTO kpff_fics (fanFicId, author, authorEmail, ficTitle, chapter, ficText, datePosted, valid)
  Values ('', '$userName2', '$userEmail2', '$userFic2', '$userChapter2', '$userText2','$date','False')",$connect);

// retrieve new fanFicId
//$result = mysql_query("SELECT fanFicId FROM kpff_fics WHERE author = '$userName' AND authorEmail = '$userEmail' AND ficTitle = '$userFic' AND chapter = '$userChapter'",$connect);
$result = mysql_query("SELECT fanFicId FROM kpff_fics WHERE ficText = '$userText2'",$connect);
while($myrow = mysql_fetch_array($result))
 {
  $newFicId = $myrow['fanFicId'];
 }

//Email the user that it has been submitted and will be reviewed
mail("$userName <$userEmail>",strip_gpc_slashes("Thank You For Submitting to KPFanFiction.com"),strip_gpc_slashes("Dear $userName,\n\nThank you for submitting \"$userFic - $userChapter\" to KPFanFiction.com.\n\nCurrently it is inactive. Meaning it is not currently viewable by the public. When it has been verified by an editor, you will be notified accordingly.\n\nThank you.\nKPFanFiction.com Team"),"From: KPFF Editors <editors@kpfanfiction.com>");
//Email the editors about the new fanfic to review.
mail("KPFF Editors <editors@kpfanfiction.com>", strip_gpc_slashes("Fanfiction Story Submitted Needs Reviewing"), strip_gpc_slashes("Dear Editors,\n\nA submitted fanfiction story needs reviewing. You can read and verify/remove \"$userFic - $userChapter\" here:\n\nhttp://editors.kpfanfiction.com/verify.php?fic=$newFicId\n\nThank you.\nKPFanFiction.com Team"), "From: KPFanFiction.com <webmaster@kpfanfiction.com>");
echo "<html><head><link rel=\"stylesheet\" href=\"includes/kpff.css\" type=\"text/css\"><title>Preview of $userFic - $userChapter</title></head>";
echo "<h2>$userFic<br><font size=\"-1\">$userChapter</font></h2><center>";
echo "<h4><b>By: <a href=\"mailo:$userEmail\">$userName</a></b></h4>";
echo "<h5>Added on: $date</h5></center><br>";
echo nl2br($userText);
echo "<br><br><hr>";
?>
<a href="index.php">Home</a> &nbsp;<a href="index.php?mode=submit">Submit Another</a><br><br>
