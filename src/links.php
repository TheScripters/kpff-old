<?php
echo "<h2>Links</h2>";
$sql = mysql_query("SELECT * FROM kpff_linkcategories",$connect);
while($row = mysql_fetch_array($sql))
  {
    $catId = $row['CatId'];
    $sql2 = mysql_query("SELECT COUNT(*) AS count FROM kpff_links WHERE LinkCategory = '$catId'",$connect);
    while($row2 = mysql_fetch_array($sql2))
      {
        $count = $row2['count'];
      }
    echo "<br><h3>";
    echo $row['CatName'];
    echo " ($count";
    if ($count >= "2")
      {
        echo " Links";
      }
    if ($count == "1")
      {
        echo " Link";
      }
    echo ")</h3>";
    $sql1 = mysql_query("SELECT * FROM kpff_links WHERE LinkCategory = '$catId'",$connect);
    while($row1 = mysql_fetch_array($sql1))
      {
        echo "<ul>";
        echo "<a href=\"link.php?link=";
        echo $row1['LinkId'];
        echo "\" target=\"_blank\">";
        echo "<img src=\"";
        echo $row1['LinkBanner'];
        echo "\" border=\"0\"></a><br><b>";
        echo $row1['LinkTitle'];
        echo "</b> -- <i>Hits:</i> ";
        echo $row1['Hits'];
        echo "<br>";
        echo $row1['LinkDescription'];
        echo "<br><a href=\"link.php?link=";
        echo $row1['LinkId'];
        echo "\" target=\"_blank\">Visit this site...</a>";
        echo "<br>";
        echo "</ul>";
      }
    echo "<br><br>";
  }
  echo "<br><br><center><a href=\"addlink.php\">Add Link</a></center>";
?>
