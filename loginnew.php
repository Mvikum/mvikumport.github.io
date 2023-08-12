<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Sanitize user input
    $user_name = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['psw'];

    if (!empty($user_name) && !empty($password)) {
        // Read from database using prepared statement
        $query = "SELECT * FROM user WHERE username = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $user_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                // Verify password using password_verify
                if (password_verify($password, $user_data['pass'])) {
                    $_SESSION['username'] = $user_data['username'];
                    header("Location: index.html");
                    die;
                } else {
                    echo "Wrong username or password!";
                }
            } else {
                echo "Wrong username or password!";
            }
        } else {
            echo "Database error!";
        }
    } else {
        echo "Username and password are required!";
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
    <form action="#" style="border: 1px solid #ccc">
        <div class="container">
            <h1>Login</h1>
            <hr>
            <label for="username"><b>User Name</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <div class="clearfix">
                <a href="index.html"><button type="button" class="cancelbtn">Cancel</button></a>
                <button type="submit" class="signupbtn">Log In</button>
            </div>
        </div>
    </form>
</body>
</html>
