<?
if ($userNameSession)
  {
    if ($_GET['verify'] == "edit")
      {
        include("includes/db.php");
        start_session();
        include("includes/slashes.php");
        $fic = $_REQUEST['StoryID'];
        $storytext = $_REQUEST['story'];
        $$chapter = $_REQUEST['chapter'];
        $sql = mysql_query("UPDATE kpff_fics SET ficText = '$storytext', chapter = '$chapter' WHERE fanFicId = '$fic'",$connect);
        header("Location: index.php?mode=editstory");
      }
    if ($_GET['verify'] == "delete")
      {
        include("includes/db.php");
        $fic = $_REQUEST['StoryID'];
        $sql = mysql_query("DELETE FROM kpff_fics WHERE fanFicId = '$fic' LIMIT 1",$connect);
        header("Location: index.php?mode=editstory");
      }
    if ($_GET['mode'] == "edit")
      {
        include("includes/db.php");
        include("includes/slashes.php");
        include("includes/header.inc");
        $fic = $_REQUEST['fic'];
        $ficEdit = mysql_fetch_array(mysql_query("SELECT * FROM kpff_fics WHERE fanFicId = '$fic'",$connect));
        $Author = mysql_fetch_array(mysql_query("SELECT AuthorEmail FROM kpff_authors WHERE Author = '$userNameSession'",$connect));
        $userName = strip_gpc_slashes($userNameSession);
        echo "<h2>Edit Story</h2><br>";
        echo "<form action=\"editstory.php?verify=edit\" method=\"post\"><input type=\"hidden\" name=\"StoryID\" value=\"$fic\">";
        echo "<center><table><tr><th align=\"right\">Name</th><td>$userName</td></tr>";
        echo "<tr><th>Email</th><td>";
        echo $Author['AuthorEmail'];
        echo "</td></tr><tr><th align=\"right\">Story Title</th><td><input type=\"text\" name=\"Title\" value=\"";
        echo strip_gpc_slashes($ficEdit['FicTitle']);
        echo "\"></td></tr><tr><th align=\"right\">Chapter</th><td><input type=\"text\" name=\"chapter\" value=\"";
        echo strip_gpc_slashes($ficEdit['chapter']);
        echo "\"></td></tr><tr><th colspan=\"2\" align=\"right\">Story</th></tr><tr><td colspan=\"2\" align=\"center\"><textarea cols=\"85\" rows=\"30\" name=\"Story\">";
        echo strip_gpc_slashes($ficEdit['ficText']);
        echo "</textarea></td></tr><tr><td colspan=\"2\" align=\"center\"><input type=\"submit\" value=\"Submit Changes\"> &nbsp; <input type=\"reset\" value=\"Clear Changes\"></td></tr></table>"
        include("includes/footer.inc");
        exit;
      }
    if ($_GET['mode'] == "delete")
      {
        include("includes/db.php");
        include("includes/slashes.php");
        include("includes/header.inc");
        $fic = $_REQUEST['fic'];
        $ficDel = mysql_fetch_array(mysql_query("SELECT ficTitle, chapter FROM kpff_fics WHERE fanFicId = '$fic'",$connect));
        echo "<h2>Delete Story</h2><br>";
        echo "<center>Are you sure you wish to delete the story/chapter ";
        echo strip_gpc_slashes($ficDel['ficTitle']);
        echo " -- ";
        echo strip_gpc_slashes($ficDel['chapter']);
        echo "?<br>";
        echo "<form action=\"editstory.php?verify=delete\" method=\"post\"><input type=\"hidden\" name=\"StoryID\" value=\"$fic\">";
        echo "<select name=\"delete\"><option value=\"True\" name=\"delete\">Yes</option><option name=\"delete\" value=\"False\">No</option></select>&nbsp; <input type=\"submit\" value=\"Submit\"></form></center>";
        include("includes/footer.inc");
        exit;
      }
    echo "<h2>Edit Stories</h2><br>";
    echo "<center><table><tr><th>Story Title</th><th>Chapter Title</th><th>Action</th></tr>";
    $storyEdit = mysql_query("SELECT * FROM kpff_fics WHERE Author = '$userNameSession' ORDER BY fanFicId",$connect);
    while($edit = mysql_fetch_array($storyEdit))
      {
        $fid = $edit['fanFicId'];
        echo "<tr><td>";
        echo $edit['ficTitle'];
        echo "</td><td>";
        echo $edit['chapter'];
        echo "</td<td><a href=\"editstory.php?mode=edit&fic=$fid\">Edit</a> &nbsp; <a href=\"editstory.php?mode=delete&fic=$fid\">Delete Fic</a></td></tr>";
      }
    echo "</table></center>";
  }
if (!$userNameSession)
  {
    echo "<h2>Edit Story</h2><br>";
    echo "<center>Please log in before attempting to edit any stories.<br><br>Click <a href=\"login.php\">here</a> to log in and then you may retry editing stories.<br><br>Thank you.</center>";
  }
?>
