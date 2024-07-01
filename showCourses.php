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

$sql = "SELECT * FROM course";
$result = $conn->query($sql);

echo "<table border='1'><tr><th>CourseID</th><th>CName</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["CourseID"]."</td><td>".$row["CName"]."</td></tr>";
}
echo "</table>";
$conn->close();

?>

<a href="doctoral.html">Back to Main Page</a>