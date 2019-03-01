<?
error_reporting(E_ALL ^ E_NOTICE);
if ($_GET['mode'] == "validate")
   {
     include("../includes/db.php");
     include("includes/header.inc");
     $linkId = $_REQUEST['link'];
     $links = mysql_fetch_array(mysql_query("SELECT * FROM kpff_links WHERE LinkId = '$linkId'",$connect));
     echo "<h2>Validate</h2>";
     echo "<br><br>";
     echo "<center>Choose a category for ";
     echo $links['LinkTitle'];
     echo " &nbsp; <form action=\"linkadd.php\" method=\"post\" name=\"LinkValidation\"><select name=\"CatSelect\">";
     $link = mysql_query("SELECT * FROM kpff_linkcategories",$connect);
     while($linkcat = mysql_fetch_array($link))
       {
         echo "<option value=\"";
         echo $linkcat['CatId'];
         echo "\" name=\"CatSelect\">";
         echo $linkcat['CatName'];
         echo "</option>";
       }
     echo "</select>";
     echo "<br><br>";
     echo "Please enter a description: <input type=\"text\" name=\"LinkDesc\"><input type=\"hidden\" name=\"Link\" value=\"$linkId\"></form>";
     include("includes/footer.inc");
     exit;
   }
if ($_GET['mode'] == "delete")
   {
     include("../includes/db.php");
     $linkId = $_REQUEST['link'];
     $sql = mysql_query("DELETE FROM kpff_links WHERE LinkId = '$linkId'",$connect);
     include("includes/header.inc");
     echo "<h2>Link Deletion</h2>";
     echo "<br><br><center>Link deleted!</center>";
     include("includes/footer.inc");
     exit;
   }
echo "<table>";
echo "<tr><th>Site Name</th><th>Site Address</th><th>Site Banner</th><th>Action</th></tr>";
$linklist = mysql_query("SELECT * FROM kpff_links WHERE Active = 'No'",$connect);
while($linklst = mysql_fetch_array($linklist))
  {
    echo "<tr><td align=\"center\">";
    echo $linklst['LinkTitle'];
    echo "</td><td><a href=\"";
    echo $linklst['Linkage'];
    echo "\" target=\"_blank\">";
    echo $linklst['Linkage'];
    echo "</a></td><td><img src=\"";
    echo $linklst['LinkBanner'];
    echo "\"></td><td><a href=\"linkadmin.php?mode=verify&link=";
    echo $linklst['LinkId'];
    echo "\">Validate</a> &nbsp;<a href=\"linkadmin.php?mode=delete&link=";
    echo $linklst['LinkId'];
    echo "\">Remove</a></td></tr>";
  }
?>

