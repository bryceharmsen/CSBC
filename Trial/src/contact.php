<!DOCTYPE html>
<html>
	<head>
		<title>Chestnut Street Baptist Church : Contact Us</title>
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body>
		<form name="contactForm" method="post" action="formvalidate.php">
			Name:<br />
			<input type="text" name="nm" id="nm" />
			<span class="required">*</span>
			<br /><br />
			
			Email Address:<br />
			<input type="text" name="em" id="em" />
			<span class="required">*</span>
			<br /><br />
			
			Is there a specific ministry you would like to contact?<br />
			<select name="ministry" id="ministry">
				<option selected>---Select a ministry---
				<option value="gen">General message
				<option value="youth">Youth
				<option value="college">College
				<option value="mens">Men's
				<option value="womens">Women's
			</select>
			<br /><br />
			
			Subject:<br />
			<input type="text" name="sub" id="sub" />
			<br /><br />
			
			Message:<span class="required">*</span>
			<br />
			<textarea name="emmsg" id="emmsg" cols="50" rows="7"></textarea>
			<br /><br />
			
			More information about the church? <span class="required">*</span><br />
			<input type="radio" name="moreinfo" value="yes" checked>Yes
			<input type="radio" name="moreinfo" value="no">No
			<p>
				<input type="submit" name="submit" value="Submit" />
				<input type="reset" value="Clear" />
			</p>
		</form>
		<br />
		<span class="required">* denotes a required field</span>
	</body>
</html>
