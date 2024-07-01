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

$sql = "SELECT G.StudentId, P.FName, P.LName FROM gra G, phdstudent P WHERE G.StudentId=P.StudentId";
$result = $conn->query($sql);

echo "<table border='1'><tr><th>StudentId</th><th>FName</th><th>LName</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["StudentId"]."</td><td>".$row["FName"]."</td><td>".$row["LName"]."</td></tr>";
}
echo "</table>";
$conn->close();

?>

<a href="doctoral.html">Back to Main Page</a>