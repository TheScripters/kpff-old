<?php
$p = $_REQUEST['p'];
if ($p == "update")
  {
    include("includes/db.php");
    $FicID = $_REQUEST['FicID'];
    $ficTitle = $_REQUEST['ficTitle'];
    $chapter = $_REQUEST['chapter'];
    $author = $_REQUEST['author'];
    $authorEmail = $_REQUEST['authorEmail'];
    $FicUpdate = mysql_query("UPDATE kpff_fics SET ficTitle = '$ficTitle', chapter = '$chapter', author = '$author', authorEmail = '$authorEmail' WHERE fanFicId = '$FicID'",$connect);
    header("Location: index.php?mode=ficedit");
  }
?>
<?php
include("includes/db.php");
$ficId = $_REQUEST['update'];
$result = mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$ficId'",$connect);
while($myrow = mysql_fetch_array($result))
  {
    $ficTitle = $myrow['ficTitle'];
    $chapter = $myrow['chapter'];
    $author = $myrow['author'];
    $authorEmail = $myrow['authorEmail'];
  }
include("includes/header.inc");
?>
<h2>Update Fic Information</h2>
<center><form action="ficedit.php?p=update" method="post" name="FicUpdate">
<b>Author:</b> <input type="text" name="author" value="<?echo$author?>"><br>
<b>Author Email:</b> <input type="text" name="authorEmail" value="<?echo$authorEmail?>"><br>
<b>Title:</b> <input type="text" name="ficTitle" value="<?echo$ficTitle?>"><br>
<b>Chapter:</b> <input type="text" name="chapter" value="<?echo$chapter?>"><input type="hidden" value="<?echo$ficId?>" name="FicID"><br>
<input type="submit" value="Update!"></form></center>
<?include("includes/footer.inc");?>
