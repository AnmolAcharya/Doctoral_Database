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
    $InstructorId = $_POST["InstructorId"] ?? '';
    $StudentId = $_POST["StudentId"] ?? '';

    //validate input
    if($InstructorId != '' && $StudentId != ''){
        $stmt = $conn->prepare("INSERT INTO phdcommittee (StudentId, InstructorId) VALUES (?,?)");
        $stmt -> bind_param("ss", $StudentId, $InstructorId);

        if ($stmt->execute())
        {
            echo "Instructor (" . $InstructorId . ") added to the Student (" . $StudentId . ")'s PhD committee successfully!";
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