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

$sql = "SELECT G.* FROM gra G WHERE G.StudentId NOT IN (SELECT DISTINCT StudentId FROM milestonespassed)";
$result = $conn->query($sql);

echo "<table border='1'><tr><th>StudentId</th><th>GrantId</th><th>MonthlyPay</th><th>MajorResearchArea</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["StudentId"]."</td><td>".$row["GrantId"]."</td><td>".$row["MonthlyPay"]."</td><td>".$row["MajorResearchArea"]."</td></tr>";
}
echo "</table>";
$conn->close();

?>

<a href="doctoral.html">Back to Main Page</a>