function checkNEmail(form) {
	if (isBlank(form.email.value) || isBlank(form.name.value) || !isEmailValid(form.email.value) )
	{
		alert("Please enter a valid Name and  Email Address .\nThe email or name you have typed in does not appear to be valid.");
		form.email.focus();
		return false;
	}
	}

function checkEmail(form) {
	if (isBlank(form.email.value) || !isEmailValid(form.email.value) ) {
		alert("Please enter a valid Email Address.\nThe email you have typed in does not appear to be valid.");
		form.email.focus();
		return false;
	}
return true;

}

function isBlank(fieldValue) {
	var blankSpaces = / /g;
	fieldValue = fieldValue.replace(blankSpaces, "");
	return (fieldValue == "") ? true : false;
}

function isEmailValid(fieldValue) {
	var emailFilter = /^.+@.+\..{2,4}$/;
	var atSignFound = 0;
	for (var i = 0; i <= fieldValue.length; i++)
		if ( fieldValue.charAt(i) == "@" )
			atSignFound++;
	if ( atSignFound > 1 )
		return false;
	else
		return ( emailFilter.test(fieldValue) && !doesEmailHaveInvalidChar(fieldValue) ) ? true : false;
}

function doesEmailHaveInvalidChar(fieldValue) {
	var illegalChars = /[\(\)\<\>\,\;\:\\\/\"\[\] ]/;
	return ( illegalChars.test(fieldValue) ) ? true : false;
}

function validate_form()
 {
  var form;
  form = document.updatePass;
  if (isBlank(form.oldPassword.value) || isBlank(form.newPassword1.value) || isBlank(form.newPassword2.value))
   {
    alert("All fields are required. One or more fields are blank.");
    return false;
   }
  else if (form.newPassword1.value != form.newPassword2.value)
   {
    alert("New Password and Retype New Password do not match.");
    return false;
   }
  else if (form.oldPassword.value == form.newPassword1.value)
   {
    alert("Your old password and new password are the same.");
    return false;
   }
  else
   {
    return true;
   }
 }