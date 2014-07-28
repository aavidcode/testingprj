jQuery(function($) {
	var val_holder;	
	$("form input[name='submit']").click(function() {
		val_holder 		= 0;
		var email 		= jQuery.trim($("form input[name='email']").val()); // email field
		var password 	= jQuery.trim($("form input[name='password']").val()); // password field
		var cpassword 	= jQuery.trim($("form input[name='cpassword']").val()); // confirm password field
		var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // reg ex email check	
		
		if(email == "") {
			$("span.email_val").html("Please enter valid email");
			val_holder = 1;
		}
		if(email != "") {
			if(!email_regex.test(email)){
				$("span.email_val").html("Your email is invalid.");
				val_holder = 1;
			} 
		}
		if(password == "") {
		$("span.password_val").html("Please enter Password");
		val_holder = 1;
		} 
		if(cpassword == "") {
			$("span.cpassword_val").html("Please enter Confirm Password");
		val_holder = 1;
		} 
		if(val_holder == 1) {
			return false;
		}  
		val_holder = 0;
		var datastring = 'email='+ email +'&password='+ password +'&cpassword='+ cpassword; // get data in the form manual
		$.ajax({
			type: "POST", // type
			url: "ajax/emailAjax.php",
			data: datastring, // post the data
			success: function(responseText) { // get the response
				if(responseText == 1) { // if the response is 1
					$("span.email_val").html("Email are already exist.");
				} else { // else blank response
					if(responseText == "") { 
						$("form input[type='text']").val(''); // optional: empty the field after registration
					}
				}
			}
		});
	});
});