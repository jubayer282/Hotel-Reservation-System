<?php 

/**
* CSE 208 Lab [Project Demo]
* Lab 8
* 14 Oct, 2021
*/

$servername = "localhost";
$username = "root";
$password = "";
$db = "lab_8";

	//Database Connection
if ($_GET['action'] == 'created_database' ) {
	$conn = new mysqli($servername, $username, $password);
} else {
	$conn = new mysqli($servername, $username, $password, $db);
}

	//Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Database Lab</title>
</head>
<body>

	<ul>
		<li><a href="./?action=created_database">Create Databse</a></li>
		<li><a href="./?action=created_table">Create Table</a></li>
		<li><a href="./?action=insert">Insert Value</a></li>
		<li><a href="./?action=show">Display Value</a></li>
			<ul>
				<li><a href="./?action=show&Q=1">Question 1</a></li>
			</ul>
	</ul>

	<?php 
	if ($_GET['action'] == 'created_table') {

		$sql = "CREATE TABLE student (
		id INT PRIMARY KEY,
		name VARCHAR(30) NOT NULL,
		intake INT,
		section INT
	)";
	if ($conn->query($sql) === TRUE) {
		echo "Table student created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE course (
		c_id VARCHAR(30) PRIMARY KEY,
		c_name VARCHAR(30) NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
		echo "Table course created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}

	$sql = "CREATE TABLE take (
		id INT,
		c_id VARCHAR(30),
		PRIMARY KEY(id,c_id)
	)";
	if ($conn->query($sql) === TRUE) {
		echo "Table take created successfully";
	} else {
		echo "Error creating table: " . $conn->error;
	}

}
elseif($_GET['action'] == 'insert') {

	$sql = "INSERT INTO student
	VALUES (101, 'Axy', 44, 1), (102, 'Bxy', 44, 01), (103, 'Cxy', 44, 2), (104, 'Dxy', 44, 5), (105, 'Exy', 44, 8)";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql = "INSERT INTO course
	VALUES ('c_111', 'ACT'), ('c_207', 'Database Management'), ('c_208', 'Database Lab'), ('c_205', 'DLD')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql = "INSERT INTO take
	VALUES (101, 'c_11'), (102, 'c_207'), (103, 'c_207'), (105, 'c_205')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
elseif($_GET['action'] == 'show') {

	$sql = "SELECT * FROM student";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Intake: " . $row["intake"]. " - Section: " . $row["section"] . "<br>";
		}
	} else {
		echo "No results";
	}

}

?>

</body>
</html>
<?php $conn->close(); ?>