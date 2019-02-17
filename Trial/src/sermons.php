<?php
$link = mysqli_connect('localhost:3306', 'bryce_harmsen', 'Alan1989!');
if(!$link) {
	die('Could not connect: ' . mysql_error());
}

function get_sermons() {
	$link = mysqli_connect('localhost:3306', 'bryce_harmsen', 'Alan1989!', 'CSBC');
	$result = mysqli_query($link, 'SELECT * FROM Sermons');
	$headers = mysqli_query($link, 'SHOW COLUMNS FROM Sermons');
	$rows = array();
	$rows[0] = $headers;
	$index = 1;
	while ($row = mysqli_fetch_row($result)) {
		$rows[$index] = $row;
		$index++;
	}

	return $rows;
}

function get_file($entry) {
	$words = explode(" ", $entry);
	$fixedpath = "";
	$index = 0;
	foreach($words as $word) {
		if ($index > 0) {
			$fixedpath .= "%20";
		}
		$fixedpath .= $word;
		$index++;
	}
	$filepath = "http://www.bryceharmsen.com/Trial/src/sermons/".$fixedpath.".mp3";
	return $filepath;
}

function is_guest($entry) {
	if ($entry) {
		return "Guest Speaker";
	} else {
		return " ";
	}
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
			if ($count == $file) {
				$filepath = get_file($entry);
                		echo '<a href="';
		                echo $filepath;
		                echo '" >';
		                echo $entry;
				echo "</a>";
			} else if ($count == $guest) {
				echo is_guest($entry);
			} else {
				echo $entry;
			}
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
