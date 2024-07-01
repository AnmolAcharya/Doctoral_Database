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

$sql = "SELECT * FROM instructor";
$result = $conn->query($sql);

echo "<table border='1'><tr><th>InstructorId</th><th>FName</th><th>LName</th><th>StartDate</th><th>Degree</th><th>Rank</th><th>Type</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["InstructorId"]."</td><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["StartDate"]."</td><td>".$row["Degree"]."</td><td>".$row["Rank"]."</td><td>".$row["Type"]."</td></tr>";
}
echo "</table>";
$conn->close();

?>

<a href="doctoral.html">Back to Main Page</a>