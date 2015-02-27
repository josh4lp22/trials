<HTML>
<HEAD>
<TITLE>Edit Employee</TITLE>
<SCRIPT>

	function validateForm()
	{
		if(document.frmEdit.txtFName.value=="" || document.frmEdit.txtLName.value=="" ||document.frmEdit.txtEmail.value=="" ||document.frmEdit.txtDob.value=="")
		{
			alert("Please fill all the details!!");
			return false;
		}
		else
		{
			if((validateEmail())==true && (checkdate())==true)
			{
				setAction();
			}
			else
				return false;
		}
	}

	function validateEmail()
	{
		var email = document.getElementById('txtEmail');
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if (!filter.test(email.value)) 
		{
			alert('Please provide a valid email address');
			email.focus;
			return false;
		}
		else
			return true;
	}


	function checkdate()
	{
		var input=document.frmEdit.txtDob;
		var validformat=/^\d{4}\-\d{2}\-\d{2}$/ //Basic check for format validity
		var returnval=false
		if (!validformat.test(input.value))
			alert("Invalid Date Format. Please correct and submit again.")
		else
		{ //Detailed check for valid date ranges
			var yearfield=input.value.split("-")[0]
			var monthfield=input.value.split("-")[1]
			var dayfield=input.value.split("-")[2]
			
			var dayobj = new Date(yearfield, monthfield-1, dayfield)
			if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
				alert("Invalid Day, Month, or Year range detected. Please correct and submit again.")
			else
				returnval=true
		}
		if (returnval==false) input.select()
			return returnval
	}	
		

</SCRIPT>
</HEAD>
<BODY>
	<FORM method="post" onsubmit="return validateForm()" name="frmEdit">
		ID: <INPUT type="text" name="txtID" readonly="readonly" value="<?php echo $getDetObj->ID; ?>"><BR>
		First Name: <INPUT type="text" name="txtFName" id="txtFName" value="<?php echo $getDetObj->fName; ?>">*<BR>
		Last Name: <INPUT type="text" name="txtLName" id="txtLName" value="<?php echo $getDetObj->lName; ?>">*<BR>
		Email: <INPUT type="text" name="txtEmail" id="txtEmail" value="<?php echo $getDetObj->email; ?>">*<BR>
		DOB: <INPUT type="text" name="txtDob" id="txtDob" value="<?php echo $getDetObj->dob; ?>">* (YYYY-MM-DD)<BR>
		City: <INPUT type="text" name="txtCity" value="<?php echo $getDetObj->city; ?>"><BR>
		<input type="hidden" name="action" id="action" value="<?php echo $_POST['selAction']; ?>" />
		<INPUT type="submit" value="Update" name="submit">
		<br>(*required fields)
	</FORM>
<BODY>
</HTML>


