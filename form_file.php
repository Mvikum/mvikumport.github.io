<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "connected successfully";
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//ok variables
$nameOk=false;
$emailOk=false;
$phoneOk=false;
$messageOk=false;
//name valication
function isValidName($name) {
    // Trim whitespace from the beginning and end of the name
    $name = trim($name);

    // Check if the name contains only letters and spaces
    if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $nameOk = false;
        return $nameOk;
    }

    // Check if the name is not too short or too long
    if (strlen($name) < 2 || strlen($name) > 50) {
        $nameOk = false;
        return $nameOk;
    }

    // Additional checks can be added, such as checking for specific patterns
    
    $nameOk = true;
    return $nameOk;
}
//email validation
function isValidEmail($email) {
    // Remove leading and trailing whitespace
    $email = trim($email);

    // Use PHP's built-in filter_var function with FILTER_VALIDATE_EMAIL flag
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailOk=true;
        return $emailOk;
    } else {
        $emailOk = false;
        return $emailOk;
    }
}
function isValidPhoneNumber($phone) {
    // Remove any non-digit characters
    $phone = preg_replace('/\D/', '', $phone);

    // Check if the phone number has a valid length
    if (strlen($phone) < 7 || strlen($phone) > 15) {
        return false;
    }

    // Additional checks can be added, such as specific patterns for different countries
    $phoneOk=true;
    return $phoneOk;
}
function isValidMessage($message, $maxLength = 1000) {
    // Trim whitespace from the beginning and end of the message
    $message = trim($message);

    // Check if the message is not too long
    if (strlen($message) > $maxLength) {
        return false;
    }
    $messageOk=true;
    return $messageOk;
}
//validation
$nameOk = isValidName($name);
$emailOk = isValidEmail($email);
$phoneOk = isValidPhoneNumber($phone);
$messageOk = isValidMessage($message);


if($nameOk===true && $emailOk===true && $phoneOk === true && $messageOk === true){
    // Insert data into the database
    $sql = "INSERT INTO contactme (name, email,phone,message) VALUES ('$name', '$email','$phone','$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close the database connection
    $conn->close();






}
?>
