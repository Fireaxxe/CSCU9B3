<html>
<head>
	<title>First PHP and MySQL Example</title>
</head>

<body>
  <form action ="firstdbp2.php" method="post">
		Enter your name: <input type="text" name="name">
		<input type="submit">
  </form>

<?php
// procedural version
$servername = "wamp0.cs.stir.ac.uk";
$username = "xxx";
$password = "yyyyyyyy";
$database = "xxx";


if(!empty($_POST['name'])) {

	$name = $_POST['name'];
	echo "Hello, {$_POST["name"]}, and welcome.<br>";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully to database.<br>";

	$name=mysqli_real_escape_string($conn,$name);
	$name=strip_tags($name);

	$sql = "SELECT Name, `Employee Number` FROM employees WHERE Name LIKE '%".$name."%'";
	echo "Query is: ".$sql."<br>";

	$result = mysqli_query($conn, $sql);

	if (!$result) {
		echo "Search produced an error: ". mysqli_error();
	}
	else {
		echo "Results are:<br>";
    	// output data of each row
    	while($row = mysqli_fetch_row($result)) {
        	echo "Name: " . $row[0]. " - Number: " . $row[1]. "<br>";
    	}
	}
	mysqli_close($conn);
}

?>
</body>
</html>