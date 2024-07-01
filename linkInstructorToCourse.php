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
    $CourseId = $_POST["CourseId"] ?? '';

    //validate input
    if($InstructorId != '' && $CourseId != ''){
        $stmt = $conn->prepare("INSERT INTO coursestaught (CourseId, InstructorId) VALUES (?,?)");
        $stmt -> bind_param("ss", $CourseId, $InstructorId);

        if ($stmt->execute())
        {
            echo "Instructor linked successfully to course! CourseId: " . $CourseId;
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