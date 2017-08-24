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
  <img src="../pictures/admin.jpg" class="img-fluid"> 


</div>
<br>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>


  

</html>

<style>
<?php include '../css/table.css'; ?>
</style>

<?php 
     echo '<script language="javascript" type="text/javascript" src = "../js/checkboxes.js"> </script>';
?>

<style>
<?php include '../css/table.css'; ?>
</style>

<?php 
     echo '<script language="javascript" type="text/javascript" src = "../js/checkboxes.js"> </script>';
?>


<?php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);

  if ($conn->connect_error) die($conn->connect_error);
 if (isset($_POST['delete']) && isset($_POST['num']))
  {
	  foreach ($_POST['num'] as $job_id) {
                  $opt = $conn->real_escape_string($job_id);
	  

   $query  = "DELETE FROM jobdetails WHERE job_id ='$opt'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
}
  if (isset($_POST['job_id'])   &&
      isset($_POST['companyname'])    &&
      isset($_POST['industry']) &&
      isset($_POST['jobtitle'])     &&
      isset($_POST['jobdescription']) &&
      isset($_POST['joblocation'])     &&
      isset($_POST['keyword']))
  {
    $job_id        = get_post($conn, 'job_id');
    $companyname   = get_post($conn, 'companyname');
    $industry      = get_post($conn, 'industry');
    $jobtitle    = get_post($conn, 'jobtitle');
    $jobdescription     = get_post($conn, 'jobdescription');
    $joblocation    = get_post($conn, 'joblocation');
    $keyword    = get_post($conn, 'keyword');
    $query    = "INSERT INTO jobdetails VALUES" .
      "('$job_id', '$companyname', '$industry', '$jobtitle', '$jobdescription', '$joblocation', '$keyword')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="admin.php" method="post"><pre>
    Job ID:          <input type="text" name="job_id">
    Company Name:    <input type="text" name="companyname">
    Industry:        <input type="text" name="industry">
    Job Title:       <input type="text" name="'jobtitle">
    Job Description: <input type="text" name="jobdescription">
    Job Location:    <input type="text" name="joblocation">
    Keyword:         <input type="text" name="keyword">
           <input type="submit" value="ADD NEW JOB">
  </pre></form>
_END;

  $query  = "SELECT * FROM jobdetails";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;

echo <<<_END
<form action="project.php" method="post" style = "margin:0px">
  <input type="submit" value="Delete" name="delete">
_END;

  echo '<table><tr><th>Job ID</th><th>Company Name</th><th>Industry</th><th>Job Title</th><th>Job Description</th>
<th>Job Location</th><th>Keywords</th><th><input type = "checkbox" onclick = "check_all(this)"></th></tr>';

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

  echo "
    <tr><td>$row[0]</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td>$row[4]</td>
        <td>$row[5]</td>
        <td>$row[6]</td>
 <td><input type = \"checkbox\" name = \"num[]\" value = \"$row[0]\"></td>
</tr>";
  //echo <<<_END 
  //  
//_END;
  }
  echo '</form></table>';
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }


?>

  </body>
  
    

 <footer class="footer">
  <div class="text-center">
    <p class="text"><font size = "1"> Copyright 2017 </font>
	<font size = "1"> <a href = "http://yussufa.myweb.cs.uwindsor.ca/60334/assignments/project/html/project.php">TheJob.com</a>
 </font>
 </p>
  </div>
</footer>
</html>
  
