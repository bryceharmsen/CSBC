<?php

	$servername = "localhost:3306";
	$username = "bryce_harmsen";
	$password = "Alan1989!";
	$dbname = "CSBC";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn)
	{
		die("Could not connect: " . mysql_connect_error());
	}
	
	$result = mysqli_query($conn, "SELECT * FROM ministries_directory");

	
	echo "<table>";
	echo "<th>Name:</th><th>Position:</th><th>Phone:</th><th>Email</th>";
	
	if (mysqli_num_rows($result) > 0)
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			echo "<td id='sermon-cell'>" . $row['Name'] . "</td>";
			echo "<td id='sermon-cell'>" . $row['Position'] . "</td>";
			echo "<td id='sermon-cell'>" . $row['Phone'] . "</td>";
			echo "<td id='sermon-cell'>" . $row['Email'] . "</td>";
			echo "</tr>";
		}
	}
	else
	{
		echo "0 results";
	}
	
	echo "</table>";

	mysqli_close($conn);

?>
