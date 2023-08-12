<?php 

session_start();

	include("connection.php");
	// include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			// added new admin panel
			if($user_name=="admin" && $password=="root"){
				header("Location: admin.php");
				die;
			}

			//read from database
			$query = "select * from user where username = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['username'] = $user_data['username'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body style="background-color:white">

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}
	header {
    background-color: grey;
    /* position: fixed; */
    width: 100%;
    color: #fff;
    padding: 12px;
    /* z-index: 9999; */
  }

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
body{
	background-image:url("bgimage.jpg");
}
	</style>
<header>
        <h1 style="text-align:center">LOGIN</h1>
    </header>
	<div id="box">
		
	
		<form method="post">
			<!-- <div style="font-size: 20px;margin: 10px;color: white;">Login</div> -->
			<p>Email : </p>
			<input id="text" type="text" name="user_name"><br><br>
			<p>Password : </p>
			<input id="text" type="password" name="password"><br><br>
			
			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>

			<!-- <a href="admin.php">Admin Login</a><br> -->
		</form>
	</div>
</body>
</html>