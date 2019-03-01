<?php
if ($_GET['p'] == "email")
  {
    include("includes/db.php");
    include("includes/slashes.php");
    $message = $_REQUEST['message'];
    $subject = strip_gpc_slashes($_REQUEST['subject']);
    $emailForm = mysql_query("SELECT AuthorName, AuthorEmail FROM kpff_authors",$connect);
    while($row = mysql_fetch_array($emailForm))
      {
        $author = $row['Author'];
        $authoremail = $row['AuthorEmail'];
        mail("$author <$authoremail>", "Emailed From KPFanFiction.com: $subject", strip_gpc_slashes($message), "From: KPFF Editors <editors@kpfanfiction.com>\r\nReply-To: editors@kpfanfiction.com\r\nX-Mailer: KPFanFiction PHP Mailer\r\nMIME-Version: 1.0");
      }
    if ($_GET['toSelf'] == "True")
      {
        mail("editors@kpfanfiction.com", "Emailed From KPFanFiction.com: $subject", strip_gpc_slashes($message), "From: KPFF Editors <editors@kpfanfiction.com>\r\nReply-To: editors@kpfanfiction.com\r\nX-Mailer: KPFanFiction PHP Mailer\r\nMIME-Version: 1.0");
      }
    include("includes/header.inc");
    echo "<h2>Mass Email Authors</h2>
<center>Mail successful!<br><form action=\"authoremail.php?p=email\" method=\"post\">
<b>Subject:</b> <input type=\"text\" name=\"subject\"><br><br>
<b>Send to editors:</b> <input type=\"checkbox\" name=\"toSelf\" value=\"True\"><br><br>
<b>Message:</b><br><textarea cols=\"50\" rows=\"6\"></textarea><br>
<input type=\"submit\" value=\"Email\"></form>";
    include("includes/footer.inc");
  }
  else
  {
echo "<h2>Mass Email Authors</h2>
<center><form action=\"authoremail.php?p=email\" method=\"post\">
<b>Subject:</b> <input type=\"text\" name=\"subject\"><br><br>
<b>Send to editors:</b> <input type=\"checkbox\" name=\"toSelf\" value=\"True\"><br><br>
<b>Message:</b><br><textarea cols=\"50\" rows=\"6\" name=\"message\"></textarea><br>
<input type=\"submit\" value=\"Email\"></form>";
  }
?>
