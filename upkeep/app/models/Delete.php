<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upkeep";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Remove data from the database
$nic = $_GET["nic"];
$sql = "DELETE FROM moderators WHERE NIC = '$nic'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
