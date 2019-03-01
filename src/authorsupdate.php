<?php
include("includes/db.php");
include("includes/slashes.php");
error_reporting(E_ALL ^ E_NOTICE);
$AuthorOldName = $_REQUEST['oldName'];
$AuthorNewName = $_REQUEST['updateName'];
$AuthorOldEmail = $_REQUEST['oldEmail'];
$AuthorNewEmail = $_REQUEST['updateEmail'];
$AuthorAge = $_REQUEST['updateAge'];
$AuthorInterest = $_REQUEST['updateInterests'];
$AuthorAboutMe = $_REQUEST['updateAboutMe'];

$checkForName = mysql_query("SELECT AuthorName FROM kpff_authors WHERE AuthorName <> '$AuthorOldName'",$connect);
$nameFound = "False";
while($myrow2 = mysql_fetch_array($checkForName))
{
 $CurrentAuthorNameFromSql = $myrow2['AuthorName'];
 if ($CurrentAuthorNameFromSql == $AuthorNewName)
  {
   $nameFound = "True";
  }
}

if ($nameFound == "False")
 {

$result2 = mysql_query("UPDATE kpff_authors SET AuthorName = '$AuthorNewName', AuthorEmail = '$AuthorNewEmail', AboutAuthor = '$AuthorAboutMe', Interests = '$AuthorInterest', Age = '$AuthorAge' WHERE AuthorName = '$AuthorOldName'",$connect);
if ($AuthorOldName != $AuthorNewName || $AuthorOldEmail != $AuthorNewEmail)
 $result3 = mysql_query("UPDATE kpff_fics SET author = '$AuthorNewName', authorEmail = '$AuthorNewEmail' WHERE author = '$AuthorOldName' AND authorEmail = '$AuthorOldEmail'",$connect);

$OldPassword = $_REQUEST['oldPassword'];
$md5OldPassword = md5($OldPassword);
$NewPassword = $_REQUEST['newPassword1'];
$md5NewPassword = md5($NewPassword);

if ($OldPassword != "" && $NewPassword != "")
 {
  $result = mysql_query("SELECT password FROM kpff_authors WHERE AuthorName = '$AuthorNewName'",$connect);
  while($myrow = mysql_fetch_array($result))
   {
    $AuthorsCorrectPassword = $myrow['password'];
   }
  if ($OldPassword == $AuthorsCorrectPassword || $md5OldPassword == $AuthorsCorrectPassword)
   {
    $result2 = mysql_query("UPDATE kpff_authors SET Password = '$md5NewPassword' WHERE AuthorName = '$AuthorNewName'",$connect);
   }
  else
   {
    echo "<center><font color=red size=+1><b>Invalid old password entered. Please try again. <a href=\"authors.php?view=$AuthorOldName\">Go back</a></b></font></center><br><br>";
    $success = "false";
   }
 }

if ($AuthorOldName != $AuthorNewName)
 {
  echo "<center><font color=red size=+1><b><a href=\"logout.php\">Re login</a> with your new user name.</font></center>";
 }
else
 {
  if ($success != "false")
   {
    echo "<script language=JavaScript>window.location.href=\"authors.php?view=$AuthorNewName\"</script>";
   }
 }

 }
else // nameFound == True
 {
   echo "<center><font color=red size=+1><b>User name already exists. Please try again. <a href=\"authors.php?view=$AuthorOldName\">Go back</a></b></font></center><br><br>";
 }

?>
