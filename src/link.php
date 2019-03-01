<?php
include("includes/db.php");
$Link = $_REQUEST['link'];
$sql = mysql_query("SELECT * FROM kpff_links WHERE LinkId = '$Link'",$connect);
while($row = mysql_fetch_array($sql))
  {
    $Address = $row['Linkage'];
    $Title = $row['LinkTitle'];
    $LinkHits = $row['Hits'];
  }
$HitsNew = $LinkHits + 1;
$sql1 = mysql_query("UPDATE kpff_links SET Hits = '$HitsNew' WHERE LinkId = '$Link'",$connect);
?>
<html>
<head>
<meta http-equiv="Refresh" content="5; url=<?echo$Address?>">
<link rel="stylesheet" href="includes/kpff.css">
<title>Transferring to <?echo$Title?></title>
</head>
<body>
<h2>Transferring to <?echo$Title?>...</h2><br>
<br><br>
<center>If <?echo$Title?> does not load automatically after 5 seconds, <a href="<?echo$Address?>">Click here</a>...</center>

</body>
</html>
