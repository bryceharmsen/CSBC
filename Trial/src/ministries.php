<?php
$link = mysqli_connect('localhost:3306', 'bryce_harmsen', 'Alan1989!');
if(!$link) {
	die('Could not connect: ' . mysql_error());
}

function get_sermons() {
	$link = mysqli_connect('localhost:3306', 'bryce_harmsen', 'Alan1989!', 'CSBC');
	$result = mysqli_query($link, 'SELECT * FROM ministries_directory');
	$headers = mysqli_query($link, 'SHOW COLUMNS FROM ministries_directory');
	$rows = array();
	$rows[0] = $headers;
	$index = 1;
	while ($row = mysqli_fetch_row($result)) {
		$rows[$index] = $row;
		$index++;
	}

	return $rows;
}

function make_table() {
	$rows = get_sermons();
	echo "<table>";
	$headers = $rows[0];
	foreach ($headers as $header) {
			$titles = 0;
			$count = 0;
			foreach($header as $entry) {
				if ($count == $titles) {
					echo "<th>";
					echo $entry;
					echo "</th>";
					$count++;
				} else {
					break;
				}
			}
	}

	for ($index = 1; $index < sizeof($rows); $index++) {
		echo "<tr>";
		$row = $rows[$index];
	        $file = 1;
		$guest = 4;
	        $count = 0; 
		$filepath;
		foreach($row as $entry) {
			echo '<td id="sermon-cell">';
			echo $entry;
			echo "</td>";
			$count++;
		}
		echo "</tr>";
	}
	echo "</table>";
}

make_table();

mysqli_close($link);
?>
