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

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $StudentId = $_POST["StudentId"] ?? '';

    //validate input
    if($StudentId != ''){
        $stmt = $conn->prepare("DELETE FROM phdstudent WHERE StudentId = (?)");
        $stmt -> bind_param("s", $StudentId);

        if ($stmt->execute())
        {
            echo "GRA Student deleted successfully to course! StudentId: " . $StudentId;
        }
        else {
            echo "Error adding Instructor: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Please fill in all the fields";
    } 
}


$conn->close();
?>

<a href="doctoral.html">Back to Main Page</a>