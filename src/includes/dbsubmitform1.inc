<script src="includes/submitfic.js"></script>
<form name="submitForm" action="dbfic.php" method="post" onSubmit="return validate_form();">
<table>
  <tr>
    <td align="center" colspan="2"><font color="#FF0000">Nickname or real name, doesn't really matter which</font></td>
  </tr>
  <tr>
    <td align="right"><b>Name:</b></td>
    <td><input type="text" length="30" name="userName" maxlength="40"></td>
  </tr>
  <tr>
    <td align="right"><b>Email:</b></td>
    <td><input type="text" length="30" name="userEmail" maxlength="40"></td>
  </tr>
  <tr>
    <td align="right"><b>Fanfic Title:</b></td>
    <td><input type="text" length="50" maxlength="50" name="userFic"></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><font color="#FF0000">Please include the chapter number with the title.</font><br><font color="#FF0000" size="-1">For example: "Chapter 1: {Title}" (Not needed with "Prologue")</font></td>
  </tr>
  <tr>
    <td align="right"><b>Chapter Title:</b></td>
    <td><input type="text" length="50" maxlength="60" name="userChapter"></td>
  </tr>
  <tr>
    <td align="center" valign="top" colspan="2"><b>Fanfic:</b><br><font color="#FF0000"><code>Input contents of chapter. You may use HTML tags to add images (hosted elsewhere) or formatting (&lt;i&gt;&lt;/i&gt; for example)<br>There is no need to use the &lt;br&gt; or the &lt;p&gt;&lt;/p&gt;. Line breaks will appear automatically.</code></font></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><textarea cols="85" rows="30" name="ficText"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Submit"> <input type="button" value="Clear" onClick="clear_form();"></td>
  </tr>
</table>
</form>