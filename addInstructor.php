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
    $FName = $_POST["FName"] ?? '';
    $LName = $_POST["LName"] ?? '';
    $StartDate = $_POST["StartDate"] ?? null;
    $Degree = $_POST["Degree"] ?? '';
    $Rank = $_POST["Rank"] ?? '';
    $Type = $_POST["Type"] ?? '';

    //validate input
    if($InstructorId != '' && $FName != '' && $LName != '' && $StartDate != 0 && $Degree != '' && $Rank != '' && $Type != '' ){
        $stmt = $conn->prepare("INSERT INTO instructor (InstructorId, FName, LName, StartDate, Degree, Rank, Type) VALUES (?,?,?,?,?,?,?)");
        $stmt -> bind_param("sssssss", $InstructorId, $FName, $LName, $StartDate, $Degree, $Rank, $Type);

        if ($stmt->execute())
        {
            echo "Instructor added successfully! InstructorId: " . $InstructorId;
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