<html>
<head>
	<title>Assignment Template</title>
</head>

<body>
  <form action ="assignment.php" method="post">
		Search player name: <input type="text" name="name">
		<input type="submit">
  </form>

<?php
$servername = "wamp0.cs.stir.ac.uk";
$username = "cco";
$password = "cco";
$database = "cco";


if (!empty($_POST['name'])) {

	$name = $_POST['name'];
	echo "Hello, {$_POST["name"]}, and welcome.<br>";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);	

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully to database.<br>";

	$name = mysqli_real_escape_string($conn, $name);
	$name = strip_tags($name);

	$sql = mysqli_query($conn, "SELECT DISTINCT * FROM players WHERE players.Forename LIKE '%" . $name . "%' OR players.Surname LIKE '%" . $name . "%'");
	$sql2 = mysqli_query($conn, "SELECT GROUP_CONCAT(playerskills.Skill), playerskills.PlayerID
			FROM playerskills
			RIGHT JOIN players 
			ON players.PlayerID = playerskills.PlayerID
			WHERE players.Forename LIKE '%" . $name . "%' OR players.Surname LIKE '%" . $name . "%' GROUP BY players.PlayerID
					 ");


	 if (!$sql) {
		echo "Search produced an error: " . mysqli_error($conn);
	} else {
		echo "Results are:<br>";
    	// output data of each row
		while ($row = mysqli_fetch_row($sql)) {
			echo "<br> &#160;- Player ID: " . $row[0] . "<br> &#160; -Surname: " . $row[1] . "<br> &#160; -Forename: " . $row[2] . "<br> &#160; -TeamName: " . $row[3] . "<br> &#160; -Status: " . $row[4];

			if($row = mysqli_fetch_row($sql2)) {
				echo "<br>&#160; -Skills:" . $row[0] . "&#160;<br><br>";
			}
		}
	}
	mysqli_close($conn);
}
?>
</body>
</html>

