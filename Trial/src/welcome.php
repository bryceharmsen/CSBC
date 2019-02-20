<?php
	session_start();

	if (!isset($_SESSION["username"]) || empty($_SESSION["username"]))
	{
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welcome</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css" />
		<style>
			body
			{
				font: 14px sans-serif;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div class="page-header">
			<h1>Hi, <b><?php echo $_SESSION["username"]; ?></b>. Welcome to our site.</h1>
			<?php

				$servername = "localhost";
				$username = "root";
				$password = "1iL+HPb7!";
				$dbname = "CSBC";
				
				$conn = mysqli_connect($servername, $username, $password, $dbname);

				if(!$conn)
				{
					die("Could not connect: " . mysql_connect_error());
				}
				
				$result = mysqli_query($conn, "SELECT FirstName, LastName, Phone, Email, Address FROM MemberDirectory");

				
				echo "<table>";
				echo "<th>Last Name:</th><th>First Name:</th><th>Phone:</th><th>Email:</th><th>Address:</th>";
				
				if (mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>";
						echo "<td id='sermon-cell'>" . $row['LastName'] . "</td>";
						echo "<td id='sermon-cell'>" . $row['FirstName'] . "</td>";
						echo "<td id='sermon-cell'>" . $row['Phone'] . "</td>";
						echo "<td id='sermon-cell'>" . $row['Email'] . "</td>";
						echo "<td id='sermon-cell'>" . $row['Address'] . "</td>";
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
		</div>
		<p>
			<a href="logout.php" class="btn btn-danger">Sign Out</a>
		</p>
	</body>
</html>
