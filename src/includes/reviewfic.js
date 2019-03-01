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
  form = document.reviewForm;
  if (isBlank(form.userName.value)) { form.userName.value = ""; }
  if (isBlank(form.userEmail.value)) { form.userEmail.value = ""; }
  if (isBlank(form.userReview.value)) { form.userReview.value = ""; }
  if (form.userName.value == "" && form.userReview.value == "")
   {
    alert("Name and Comments have not been filled out. Please fill out these parts before continuing.");
    return false;
   }
  else if (form.userName.value == "")
   {
    alert("Name has not been filled out. Please fill out this part before continuing.");
    return false;
   }
  else if (form.userReview.value == "")
   {
    alert("Comments has not been filled out. Please fill out this part before continuing.");
    return false;
   }
  else
   {
    if (!isEmailValid(form.userEmail.value) && !isBlank(form.userEmail.value))
     {
      alert("Please enter a valid e-mail address.");
      return false;
     }
    else
     {
      if (confirm('Are you sure you want to send this message?'))
       {
	return true;
       }
      else
       {
        return false;
       }
     }
   }
 }

function clear_form()
 {
  var form;
  form = document.reviewForm;
  if (form.userName.value == "" && form.userEmail.value == "" && form.userReview.value == "")
   {
    return false;
   }
  else
   {
    if (confirm('Are you sure you want to clear this form?'))
     {
      form.userName.value = "";
      form.userEmail.value = "";
      form.userReview.value = "";
     }
   }
 }