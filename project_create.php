<?php
include("connection.php");
//get form data
$project_id = $_POST['project_id'];
$project_name = $_POST['project_name'];
$project_description = $_POST['project_description'];
$image_url = $_POST['image_url'];

$host = 'localhost';  // Change to your database host
$user = 'root';   // Change to your database username
$password = ''; // Change to your database password
$database = 'mydb'; // Change to your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO project(id,title,description,imageurl) VALUES('$project_id','$project_name','$project_description','$image_url')";
        if ($con->query($sql) === TRUE) {
            echo "Data inserted successfully";
            header("Location: index.html"); // Redirect to a success page
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();


?>