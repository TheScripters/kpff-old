<?php
// session_start() seems to be needed in header.inc to be universal to all kpff
// so we must include it.
include("includes/header.inc");
include("includes/slashes.php");
$username = $_GET['u'];
$username2 = strip_gpc_slashes($username);
$_SESSION["kpffusername"]=$username2;
$userid = $_GET['i'];
$_SESSION["kpffuserid"]=$userid;
?>
// problems with header(Location:) and session
// we create seperate files (createsession and logout) and use javascript redirect
<script language=JavaScript>
window.location.href="index.php";
</script>