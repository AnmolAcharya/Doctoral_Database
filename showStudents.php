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

$sql = "SELECT * FROM phdstudent";
$result = $conn->query($sql);

echo "<table border='1'><tr><th>StudentId</th><th>FName</th><th>LName</th><th>StSem</th><th>StYear</th><th>Supervisor</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["StudentId"]."</td><td>".$row["FName"]."</td><td>".$row["LName"]."</td><td>".$row["StSem"]."</td><td>".$row["StYear"]."</td><td>".$row["Supervisor"]."</td></tr>";
}
echo "</table>";
$conn->close();

?>

<a href="doctoral.html">Back to Main Page</a>