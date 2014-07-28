<html>
<head>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script>
/*jQuery(function($) {
	$('#email').on('blur', function() {
		var datastring = 'email='+ $("#email").val();
		$.ajax({
			type:
 "POST",
			url: "ajax/emailAjax.php",
			data: datastring,
			success: function(responseText) {
			}
		});
	});
	
	$('#password').on('blur', function() {
		var datastring = 'email='+ $("#email").val() + '&password='+ $("#password").val();
		$.ajax({
			type: "POST",
			url: "ajax/emailAjax.php",
			data: datastring,
			success: function(responseText) {
				if(responseText != '') {
					alert(responseText);
				} else {
					alert("Problem while sign in");
				}
			}
		});
	});*/
	
	$(document).ready(function() {
		$("#emailForm").validate({		
			submitHandler: ajaxSubmit
		});
	});
	
	function ajaxSubmit() {
	var  form_data = $("#emailForm").serialize();
	//alert(form_data);
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "ajax/emailAjax.php",
			data: form_data,
			success: function(data) {
				if(data.error === false) {
					alert(data.message);
					
				} else {
					alert(data.message);
				}
			}
		});
	}
</script>
</head>

<body>
<form class="form" id="emailForm" name="emailFrm" action="#">
	<span class="form_val validation"></span>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" class="form-control required email" id="email" name="email" placeholder="Enter Email">
		<span class="email_val validation"></span>
    </div><br/>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control required" id="password" name="password" placeholder="Password">
		<span class="password_val validation"></span>
    </div><br/>
    <!--<button type="button" class="btn btn-primary" onClick="emailValid()">Submit</button>-->
	<input name="submit" type="submit" value="Submit" />
</form>
</body></html>