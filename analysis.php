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
	
	
<br>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>


<?php 


   $hn = 'localhost'; //hostname
    $db = 'yussufa_pbl'; //database
    $un = 'yussufa_pbl'; //username
   $pw = 'mypassword'; //password

 $conn = new mysqli($hn, $un, $pw, $db);

  if ($conn->connect_error) die($conn->connect_error);
  
$query = "SELECT industry ,COUNT(*) as cnt FROM jobdetails GROUP BY industry;";
$result = $conn->query($query);
?>
<!DOCTYPE html>

<html>
<head>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['jobdetails', 'industry'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['industry']."', ".$row['cnt']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'Percentage of Job Industries',
        width: 800,
        height: 400,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <!-- Display the pie chart -->
    <div id="piechart"></div>
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