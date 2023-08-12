<?php
	include("connection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $userID = $_POST['userId'];
		$user_name = $_POST['username'];
		$fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['psw'];

        $sql = "INSERT INTO user(user_id,user_name,fullname,email,pass) VALUES('$userID','$user_name','$fullname','$email', '$password')";
        if ($con->query($sql) === TRUE) {
            echo "Data inserted successfully";
            header("Location: index.html"); // Redirect to a success page
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }


?>