<?php
include("includes/db.php");
include("includes/slashes.php");
error_reporting(E_ALL ^ E_NOTICE);

$Author = $_REQUEST['authorName'];
$OldPassword = $_REQUEST['oldPassword'];
$md5OldPassword = md5($OldPassword);
$NewPassword = $_REQUEST['newPassword1'];
$md5NewPassword = md5($NewPassword);

$result = mysql_query("SELECT password FROM kpff_authors WHERE AuthorName = '$Author'",$connect);
while($myrow = mysql_fetch_array($result))
 {
  $AuthorsCorrectPassword = $myrow['password'];
 }
if ($OldPassword == $AuthorsCorrectPassword || $md5OldPassword == $AuthorsCorrectPassword)
 {
  $result2 = mysql_query("UPDATE kpff_authors SET Password = '$md5NewPassword' WHERE AuthorName = '$Author'",$connect);
  echo "<script language=JavaScript>window.location.href=\"authors.php?view=$Author\"</script>";
 }
else
 {
  echo "<center><font color=red size=+1><b>Invalid old password entered. Please try again. <a href=\"javascript:history.go(-1)\">Go back</a></b></font></center><br><br>";
 }
?>
