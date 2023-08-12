<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Details</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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


<div id="myForm" class="form">
  <form class="form-container" action="project_create.php" method="POST" >
    <h2 style="font-family: Arial, Helvetica, sans-serif;">Project Details</h2>
    
    <label for="project_id">Project ID:</label>
    <input type="text" placeholder="Enter Project ID" name="project_id" required>
    <br>
    <label for="project_name">Project Name:</label>
    <input type="text" placeholder="Enter Project Name" name="project_name" required>
    <br>
    <label for="project_description">Project Description:</label>
    <input type="text" placeholder="Enter Description" name="project_description" required>
    <br>
    <label for="image_url">Image URL:</label>
    <input type="text" placeholder="Enter image URL "  name="image_url" required>
    <br>
    <button type="submit" class="btn">CREATE</button>
    <div class="clearfix">
                <a href="index.html"><button type="button" class="cancelbtn">Cancel</button></a>
               
            </div>

  </form>
</div>


</body>



</html>