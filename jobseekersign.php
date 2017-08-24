<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  
  </head>
  <body>
    
	
	<div class = "container">
	<nav class="navbar navbar-toggleable-md navbar-light bg-primary">
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="http://yussufa.myweb.cs.uwindsor.ca/60334/assignments/project/html/project.php" style "font-size: 25px;">
    <img src="/users/Win8/Desktop/WWW%20Project/star.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
    TheJob.com
	
  </a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-md-0"> 
    <li class="nav-item">
        <a class="nav-link" href="http://yussufa.myweb.cs.uwindsor.ca/60334/assignments/project/html/findjobs.php">Find Jobs </a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="http://yussufa.myweb.cs.uwindsor.ca/60334/assignments/project/html/analysis.php">Industry Analysis</a>
      </li>
<li class="nav-item">
        <a class="nav-link" href="http://yussufa.myweb.cs.uwindsor.ca/60334/assignments/project/html/analysis2.php">Location Analysis</a>
      </li>


    </ul>
<form class="form-inline my-2 my-lg-0 ">
      
<li class="nav-item dropdown">
        <a class="form-control mr-sm-2 bg-primary" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="http://yussufa.myweb.cs.uwindsor.ca/60334/assignments/project/html/admin.php">Admin</a>
          <a class="dropdown-item" href="http://yussufa.myweb.cs.uwindsor.ca/60334/assignments/project/html/jobseekerlog.php">Job Seeker</a>
     
        </div>
      </li>
    
  </div>
  
</form>
  
 </nav>
	<br>
	
		<div class="text-center">
  <img src="../pictures/signup.jpg" class="img-fluid"> 


</div>
<br>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>


  




<style>
<?php include '../css/login.css'; ?>
</style>

<?php
 require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);

  if ($conn->connect_error) die($conn->connect_error);
if (isset($_POST['username'])   &&
      isset($_POST['firstname'])    &&
      isset($_POST['lastname']) &&
      isset($_POST['password'])     &&
 isset($_POST['email'])     &&
      isset($_POST['gender']))
  {
    $username   = get_post($conn, 'username');
    $firstname    = get_post($conn, 'firstname');
    $lastname = get_post($conn, 'lastname');
    $password    = get_post($conn, 'password');
    $email    = get_post($conn, 'email'); 
    $gender     = get_post($conn, 'gender');
    $query    = "INSERT INTO jsdetails VALUES" .
      "('$username','$firstname', '$lastname', '$password', '$email', '$gender')";
    $result   = $conn->query($query);

  	if(!empty($result)) {
		$error_message = "";
		$success_message = "You have registered successfully!";	
		unset($_POST);
	} else {
		$error_message = "Problem in registration. Try Again!";	
	}
  }



  echo <<<_END
  <form action="jobseekersign.php" method="post"><pre>
	<table border="0" width="500"  class="demo-table">
		
		<tr>
			<td>User Name</td>
			<td><input type="text" class="InputBox" name="username"></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td><input type="text" class="InputBox" name="firstname" ></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" class="InputBox" name="lastname"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" class="InputBox" name="password" ></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" class="InputBox" name="confirm_password"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" class="InputBox" name="email"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><input type="radio" name="gender" value="Male"> Male   <input type="radio" name="gender" value="Female"> Female
			</td>
		</tr>
<tr>
<td>Resume</td> 
<td><form action="upload.php" method="post" enctype="multipart/form-data"> 
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload Resume" name="submit">
</form></td
</tr>

<tr>
<td>Cover Letter </td> 
<td><form action="upload.php" method="post" enctype="multipart/form-data"> 
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload Cover Letter" name="submit">
</form></td
</tr>

		<tr>
			<td colspan=2>
			<input type="checkbox" name="terms"> I accept Terms and Conditions <input type="submit" name="register-user" value="Register" class="btnRegister"></td>
		</tr>
	</table>

  </pre></form>
_END;


function get_post ($conn, $var){
       return $conn->real_escape_string($_POST[$var]);
}

?>

 <footer class="footer">
  <div class="text-center">
    <p class="text"><font size = "1"> Copyright 2017 </font>
	<font size = "1"> <a href = "http://yussufa.myweb.cs.uwindsor.ca/60334/assignments/project/html/project.php">TheJob.com</a>
 </font>
 </p>
  </div>
</footer>
</html>