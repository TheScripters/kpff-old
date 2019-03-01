<?php
include("includes/db.php");
include("includes/slashes.php");
$result = mysql_query("SELECT * FROM kpff_authors",$connect);
while($row = mysql_fetch_array($result))
  {
    $author = $row['AuthorName'];
    $email = $row['AuthorEmail'];
    $passwd = $row['Password'];
    mail(strip_gpc_slashes("$author <$email>"),"Username/Password Setup for KPFanFiction.com",strip_gpc_slashes("Dear $author,\n\nKPFanFiction.com has added a logon feature to the site. The name you provided when submitting stories has been used and a random password provided. You can change preferences and options as well as your password (if desired) upon logging in. This information is as follows:\n\nUsername: $author\nPassword: $passwd\n\nThank you.\nKPFanFiction Team"),"KPFF Editors <editors@kpfanfiction.com>");
  }
header("Location: index.php");
?>
