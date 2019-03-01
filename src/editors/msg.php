<?php
include("includes/db.php");
include("includes/slashes.php");
if ($_GET['mode'] == "edit")
  {
    include("includes/header.inc");
    $post = $_REQUEST['p'];
    $result = mysql_query("SELECT * FROM kpff_message WHERE MsgId = '$post'",$connect);
    while($row = mysql_fetch_array($result))
      {
        $Name = strip_gpc_slashes($row['Name']);
        $Message = strip_gpc_slashes($row['Message']);
      }
    echo "<h2>Edit Post</h2>";
    echo "<center><form action=\"msg_edit.php\" method=\"post\" name=\"PostEdit\">";
    echo "<input type=\"hidden\" value=\"$post\" name=\"Post\"><input type=\"text\" name=\"Name\" value=\"$Name\"><br>";
    echo "<textarea cols=\"65\" rows=\"6\" name=\"Message\">$Message</textarea><br>";
    echo "<input type=\"submit\" value=\"Submit\"></form>";
    include("includes/footer.inc");
    exit;
  }
if ($_GET['mode'] == "delete")
  {
    include("includes/header.inc");
    $post = $_REQUEST['p'];
    echo "<h2>Delete Post</h2>";
    echo "<form action=\"msg_del.php\" method=\"post\" name=\"PostDelete\"><input type=\"hidden\" value=\"$post\" name=\"post\">";
    echo "<center>Are you sure you wish to delete this message (uncheck for \"No\"): <input type=\"checkbox\" name=\"delete\" value=\"True\">Yes<br><input type=\"submit\" value=\"Confirm\"></form></center><br>";
    echo "<table width=\"100%\">";
    $result = mysql_query("SELECT * FROM kpff_message WHERE MsgId = '$post'",$connect);
    while($row = mysql_fetch_array($result))
      {
        $MsgId = $row['MsgId'];
        $Name = $row['Name'];
        $Message = nl2br($row['Message']);
        $MsgText = strip_gpc_slashes($Message);
        $Time = $row['Time'];
        echo "<tr><td><b>Posted on:</b> <i>$Time</i> by $Name</td><td align=\"right\"></td></tr>";
        echo "<tr><td colspan=\"2\"><hr></td></tr>";
        echo "<tr><td colspan=\"2\">$MsgText</td></tr>";
        echo "<tr><td colspan=\"2\"><hr color=\"black\" size=\"2\"></td></tr>";
      }
    echo "</table>";
    include("includes/footer.inc");
    exit;
  }
echo "<h2>Editor's Message Board</h2>";
echo "<center>Latest 15 posts are shown below. Archives soon coming.<br><hr width=\"60%\"><br>";
echo "<table>";
$result = mysql_query("SELECT * FROM kpff_message ORDER BY MsgId DESC LIMIT 0,15",$connect);
while($row = mysql_fetch_array($result))
  {
    $MsgId = $row['MsgId'];
    $Name = $row['Name'];
    $Message = nl2br($row['Message']);
    $MsgText = strip_gpc_slashes($Message);
    $Time = $row['Time'];
    echo "<tr><td><b>Posted on:</b> <i>$Time</i> by $Name</td><td align=\"right\"><a href=\"msg.php?mode=edit&p=$MsgId\">Edit</a> &nbsp; <a href=\"msg.php?mode=delete&p=$MsgId\">Delete</a></td></tr>";
    echo "<tr><td colspan=\"2\"><hr></td></tr>";
    echo "<tr><td colspan=\"2\">$MsgText</td></tr>";
    echo "<tr><td colspan=\"2\"><hr color=\"black\" size=\"2\"></td></tr>";
  }
echo "</table><br>";
echo "<form action=\"msg_post.php\" name=\"Post\" method=\"post\">";
echo "<b>Name:</b> <input type=\"text\" name=\"Name\"><br>";
echo "<b>Message:</b><br>";
echo "<textarea cols=\"65\" rows=\"6\" name=\"Message\"></textarea><br>";
echo "<input type=\"checkbox\" name=\"alert\" value=\"True\">Alert Other Editors?<br>";
echo "<input type=\"submit\" value=\"Post\"></form>";
?>
