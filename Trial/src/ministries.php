<?php
	$servername = "localhost:3306";
	$username = "bryce_harmsen";
	$password = "Alan1989!";
	$dbname = "CSBC";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	$result = mysqli_query($conn, "SELECT * FROM ministries_directory");
	if ($result->num_rows > 0)
	{
		while ($row = $result->fetch_assoc())
		{
			$context = "MContactID: " . $row["MContactID"] . "<br />"
				. "Name: " . $row["Name"] . "<br />"
				. "Position: " . $row["Position"] . "<br />"
				. "Phone: " . $row["Phone"] . "<br />"
				. "Email: " . $row["Email"];
			echo $context;
		}
	}
	else
	{
		echo "0 results";
	}
	
	$conn->close();
?>
