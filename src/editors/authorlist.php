<?php
include("includes/db.php");
include("includes/slashes.php");
echo "<h2>Author/Fic List</h2><br>";
echo "<center><table border=\"1\"><tr><th>AuthorId</th><th>Author</th><th>AuthorEmail</th><th># Of Fics</th></tr>";
$result = mysql_query("SELECT * FROM kpff_authors",$connect);
while($row = mysql_fetch_array($result))
  {
    $AuthorId = $row['AuthorId'];
    $Author = addslashes($row['AuthorName']);
    $count = mysql_query("SELECT COUNT(*) AS count FROM kpff_fics WHERE author = '$Author'",$connect);
    while($myrow = mysql_fetch_array($count))
      {
        $AuthorCount = $myrow['count'];
      }
    $AuthorEmail = $row['AuthorEmail'];
    $AuthorName1 = strip_gpc_slashes($Author);
    echo "<tr><td class=\"main\">$AuthorId</td><td class=\"main\">$AuthorName1</td><td class=\"main\">$AuthorEmail</td><td class=\"main\">$AuthorCount</td></tr>";
  }
echo "</table></center><br><br>";
?>
