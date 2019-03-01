<?php
include("includes/db.php");
include("includes/slashes.php");
$userName = $_REQUEST['Name'];
$userEmail = $_REQUEST['Email'];
$Password = $_REQUEST['Password'];
$Password1 = $_REQUEST['Password1'];
if (empty($userName))
  {
    include("includes/header.inc");
    echo "<h2>Register</h2><center>";
    echo "<br><font size=\"+2\" color=\"#FF0000\">Username not entered!<br>Please try again.</font></center>";
    echo "<center><form action=\"register.php\" name=\"RegisterForm\" method=\"post\">
<table>
  <tr>
    <td align=\"right\"><b>Username:</b></td>
    <td><input type=\"text\" name=\"Name\" maxlength=\"40\" value=\"$userName\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Email:</b></td>
    <td><input type=\"text\" name=\"Email\" maxlength=\"40\" value=\"$userEmail\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Password:</b></td>
    <td><input type=\"password\" name=\"Password\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Re-type Password:</b></td>
    <td><input type=\"password\" name=\"Password1\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Register!\"></td>
  </tr>
</table>
</center>
</form>";
    include("includes/footer.inc");
    exit;
  }
if (empty($userEmail))
  {
    include("includes/header.inc");
    echo "<h2>Register</h2><center>";
    echo "<br><font size=\"+2\" color=\"#FF0000\">Email address not entered!<br>Please try again.</font></center>";
    echo "<center><form action=\"register.php\" name=\"RegisterForm\" method=\"post\">
<table>
  <tr>
    <td align=\"right\"><b>Username:</b></td>
    <td><input type=\"text\" name=\"Name\" maxlength=\"40\" value=\"$userName\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Email:</b></td>
    <td><input type=\"text\" name=\"Email\" maxlength=\"40\" value=\"$userEmail\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Password:</b></td>
    <td><input type=\"password\" name=\"Password\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Re-type Password:</b></td>
    <td><input type=\"password\" name=\"Password1\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Register!\"></td>
  </tr>
</table>
</center>
</form>";
    include("includes/footer.inc");
    exit;
  }
if (empty($Password))
  {
    include("includes/header.inc");
    echo "<h2>Register</h2><center>";
    echo "<br><font size=\"+2\" color=\"#FF0000\">Password not entered!<br>Please try again.</font></center>";
    echo "<center><form action=\"register.php\" name=\"RegisterForm\" method=\"post\">
<table>
  <tr>
    <td align=\"right\"><b>Username:</b></td>
    <td><input type=\"text\" name=\"Name\" maxlength=\"40\" value=\"$userName\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Email:</b></td>
    <td><input type=\"text\" name=\"Email\" maxlength=\"40\" value=\"$userEmail\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Password:</b></td>
    <td><input type=\"password\" name=\"Password\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Re-type Password:</b></td>
    <td><input type=\"password\" name=\"Password1\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Register!\"></td>
  </tr>
</table>
</center>
</form>";
    include("includes/footer.inc");
    exit;
  }
if (!empty($Password) && !empty($userName) && !empty($userEmail))
  {
if ($Password == $Password1)
  {
$result = mysql_query("SELECT COUNT(*) AS count FROM kpff_authors WHERE AuthorName = '$userName'",$connect);
while($row = mysql_fetch_array($result))
  {
    $count = $row['count'];
  }
$result1 = mysql_query("SELECT COUNT(*) AS count FROM kpff_authors WHERE AuthorEmail = '$userEmail'");
while($row1 = mysql_fetch_array($result1))
  {
    $emcount = $row1['count'];
  }
if ($count == "0" && $emcount == "0")
  {
    $md5pwd = md5($Password);
    $RegisterForm = mysql_query("INSERT INTO kpff_authors (AuthorId,AuthorName,AuthorEmail,AboutAuthor,Interests,Age,Password)
    VALUES ('','$userName','$userEmail','','','','$md5pwd')",$connect);
    mail("$userName <$userEmail>","Welcome to KPFanFiction.com",strip_gpc_slashes("Welcome to KPFanFiction.com\n\nPlease keep this email for your records. Your name and password are as follows:\n\n----------------------------\nUsername: $userName\nPassword: $Password\n----------------------------\n\nYou may request a new password at any time if you forget it.\n\nYou may also add and change this information upon logging in by clicking \"Update Profile\"\n\n--\nKPFanFiction.com"),"From: KPFF Editors <editors@kpfanfiction.com>");
    header("Location: index.php");
  }
if ($count == "1" && $emcount == "1")
  {
    include("includes/header.inc");
    echo "<h2>Register</h2><center>";
    echo "<br><font size=\"+2\" color=\"#FF0000\">User and Email already in use!<br>Please try again.</font></center>";
    echo "<center><form action=\"register.php\" name=\"RegisterForm\" method=\"post\">
<table>
  <tr>
    <td align=\"right\"><b>Username:</b></td>
    <td><input type=\"text\" name=\"Name\" maxlength=\"40\" value=\"$userName\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Email:</b></td>
    <td><input type=\"text\" name=\"Email\" maxlength=\"40\" value=\"$userEmail\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Password:</b></td>
    <td><input type=\"password\" name=\"Password\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Re-type Password:</b></td>
    <td><input type=\"password\" name=\"Password1\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Register!\"></td>
  </tr>
</table>
</center>
</form>";
    include("includes/footer.inc");
    exit;
  }
if ($count == "1" && $emcount == "0")
  {
    include("includes/header.inc");
    echo "<h2>Register</h2><center>";
    echo "<br><font size=\"+2\" color=\"#FF0000\">User already exists!<br>Please try again.</font></center>";
    echo "<center><form action=\"register.php\" name=\"RegisterForm\" method=\"post\">
<table>
  <tr>
    <td align=\"right\"><b>Username:</b></td>
    <td><input type=\"text\" name=\"Name\" maxlength=\"40\" value=\"$userName\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Email:</b></td>
    <td><input type=\"text\" name=\"Email\" maxlength=\"40\" value=\"$userEmail\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Password:</b></td>
    <td><input type=\"password\" name=\"Password\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Re-type Password:</b></td>
    <td><input type=\"password\" name=\"Password1\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Register!\"></td>
  </tr>
</table>
</center>
</form>";
    include("includes/footer.inc");
    exit;
  }
if ($count == "0" && $emcount == "1")
  {
    include("includes/header.inc");
    echo "<h2>Register</h2><center>";
    echo "<br><font size=\"+2\" color=\"#FF0000\">Email already in use!<br>Please try again.</font></center>";
    echo "<center><form action=\"register.php\" name=\"RegisterForm\" method=\"post\">
<table>
  <tr>
    <td align=\"right\"><b>Username:</b></td>
    <td><input type=\"text\" name=\"Name\" maxlength=\"40\" value=\"$userName\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Email:</b></td>
    <td><input type=\"text\" name=\"Email\" maxlength=\"40\" value=\"$userEmail\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Password:</b></td>
    <td><input type=\"password\" name=\"Password\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Re-type Password:</b></td>
    <td><input type=\"password\" name=\"Password1\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Register!\"></td>
  </tr>
</table>
</center>
</form>";
    include("includes/footer.inc");
    exit;
  }
 }
else
 {
   include("includes/header.inc");
   echo "<h2>Register</h2><br>
<center><font size=\"+2\" color=\"#FF0000\">Passwords don't match!</font><br>
<form action=\"register.php\" name=\"RegisterForm\" method=\"post\">
<table>
  <tr>
    <td align=\"right\"><b>Username:</b></td>
    <td><input type=\"text\" name=\"Name\" maxlength=\"40\" value=\"$userName\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Email:</b></td>
    <td><input type=\"text\" name=\"Email\" maxlength=\"40\" value=\"$userEmail\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Password:</b></td>
    <td><input type=\"password\" name=\"Password\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td align=\"right\"><b>Re-type Password:</b></td>
    <td><input type=\"password\" name=\"Password1\" maxlength=\"25\"></td>
  </tr>
  <tr>
    <td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Register!\"></td>
  </tr>
</table>
</center>
</form>";
   include("includes/footer.inc");
 }
}
?>
