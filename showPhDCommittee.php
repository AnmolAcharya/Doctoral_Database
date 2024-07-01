<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctoral";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}


//---------------Query Part----------------

$sql = "SELECT * FROM phdcommittee";
$result = $conn->query($sql);

echo "<table border='1'><tr><th>StudentId</th><th>InstructorId</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["StudentId"]."</td><td>".$row["InstructorId"]."</td></tr>";
}
echo "</table>";
$conn->close();

?>

<a href="doctoral.html">Back to Main Page</a>