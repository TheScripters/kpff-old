<?php
// session_start() seems to be needed in header.inc to be universal to all kpff
// so we must include it.
include("includes/header.inc");
unset($_SESSION);
session_destroy();
?>
// problems with header(Location:) and session
// we create seperate files (createsession and logout) and use javascript redirect
<script language=JavaScript>
window.location.href="index.php";
</script>