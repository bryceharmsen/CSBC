<?php

	$myEmail = "casey@caseyschen.com";
	$mySubject = "";
	
	$errorName = $errorEmail = $errorMsg = "";
	$name = $email = $message = "";
	$nameGood = $emailGood = $msgGood = False;
	$error = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (isset($_POST["nm"]))
		{
			if (empty($_POST["nm"]))
			{
				$error .= "<br />Name is required";
			}
			else
			{
				$name = test_input($_POST["nm"]);
				
				if (!preg_match("/^[a-zA-Z ]*$/", $name))
				{
					$error .= "<br />Only letters and spaces are allowed";
				}
				else
				{
					$nameGood = True;
				}
			}
		}
		if (isset($_POST["em"]))
		{
			if (empty($_POST["em"]))
			{
				$error .= "<br />Email is required";
			}
			else
			{
				$email = test_input($_POST["em"]);
				
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$error .= "<br />Invalid email (missing @ or .)";
				}
				else
				{
					$emailGood = True;
				}
			}
		}
		if (isset($_POST["emmsg"]))
		{
			if (empty($_POST["emmsg"]))
			{
				$error .= "<br />Please enter a message";
			}
			else
			{
				$message = test_input($_POST["emmsg"]);
				$msgGood = True;
			}
		}
		
		echo "<h3 style='text-align: center'>" . $error . "</h3>";
	}
	
	if (isset($_POST["sub"]))
	{
		$subject = test_input($_POST["sub"]);
		
		$mySubject = "Website Feedback: " . $subject;
	}
	
	$subForUser = "Thank you for contacting Chestnut Street Baptist Church";
	$msgForUser = "Dear " . $name . ",\n\nThank you for contacting Chestnut Street Baptist Church in Ellensburg. We will do our best to get back to you within 24 hours.";
	
	if ($nameGood && $emailGood && $msgGood)
	{
	
		echo "<h3 style='text-align: center'>Thank you for your message, " .$name . "! We will get back to you within 24 hours.</h3>";
	}
	
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		
		return $data;
	}
	
?>