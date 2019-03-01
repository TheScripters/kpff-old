<?php
$update = $_REQUEST['update'];
include("includes/db.php");
include("includes/slashes.php");
$ficUpdate = mysql_query("UPDATE kpff_config SET Value = '$update' WHERE Id = 'EditorPick'",$connect);
$result = mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$update'",$connect);
while($row = mysql_fetch_array($result))
   {
     $FicTitle = $row['ficTitle'];
     $chapter = $row['chapter'];
     $author = $row['author'];
     $authoremail = $row['authorEmail'];
   }
mail("$author <$authoremail>", strip_gpc_slashes("\"$FicTitle - $chapter\" Selected as Editor's Pick"), strip_gpc_slashes("Dear $author,\n\nYour fanfiction \"$FicTitle - $chapter\" has been selected for the editor's pick. This means it will be featured on the main page of KPFanFiction.com.\n\nThank You.\nKPFF Editors"), "From: KPFF Editors <editors@kpfanfiction.com>");
mail("KPFF Editors <editors@kpfanfiction.com>", strip_gpc_slashes("Editor's Pick Updated"), strip_gpc_slashes("Dear Editors,\n\nOne of the editors has updated the editor's pick on KPFF Main to \"$FicTitle - $chapter\" and the author has been notified.\n\nKPFanFiction.com Webmaster"), "From: KPFanFiction.com <webmaster@kpfanfiction.com>");
header("Location: index.php?mode=pick");
?>
