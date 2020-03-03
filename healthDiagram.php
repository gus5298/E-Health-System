<?php
  require('includes/conn.inc.php');
  require('includes/functions.inc.php');

  $sType = safeString($_GET['type']); //Changes depending on what you click
  $user_id = "1";                     //NEEDS to change depending on the logged in user

  if ($sType != "exercise_done"){
    $sql = "SELECT $sType, date_stored FROM healthData WHERE user_id = $user_id";
  } else {
    $sql = "SELECT $sType, exercise_time FROM healthData WHERE user_id = $user_id";
  }
  $stmt = $pdo->query($sql);

  $dataP = array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ARJ - Health Diagram</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Mobile navbar -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Logo</a>
      </div>
      <!-- Desktop navbar -->
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="/E-Health-System/index.html">Index</a></li>
          <li><a href="/E-Health-System/home.php">Home</a></li>
          <li><a href="#">Projects</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
</head>

<!-- Main body -->
<body>
    <div style="text-align:center" id="container">
        <h1>Hello world</h1>
        <select id="select">
        <option value="line">line</option>
        <option value="bar">bar</option>
        <option value="pie">pie</option>
        <option value="scatter">scatter</option>
        </select>
        <br>

        <!-- PHP for displaying the raw data -->
        <?php 
        if($sType == "heart_rate"){
				  while($row =$stmt->fetchObject()){
            // echo "<p> Exercise Name: <b> $row->heart_rate </b> --
            //           Date: <b> $row->date_stored </b></p>"; 

            array_push($dataP, array( "y"=>$row->heart_rate));
          }
        } elseif ($sType == "hours_slept") {
          while($row =$stmt->fetchObject()){
            echo "<p> Exercise Name: <b> $row->hours_slept </b> --
                      Date: <b> $row->date_stored </b></p>"; 
            
            array_push($dataP, array("x"=>$row->date_stored, "y"=>$row->hours_slept));
          }
        } elseif ($sType == "exercise_done") {
            while($row =$stmt->fetchObject()){
              echo "<p> Exercise Name: <b> $row->exercise_done </b> --
                        Time: <b> $row->exercise_time </b></p>"; 
            }
        }?>
    
<script> 


window.onload = function () {

  var year = "line";
  $("#select" ).on('change', function() { 
  year = $(this).val();
  console.log(year);
  });

console.log("outside: ", year)
var chartType = "line";
var titleMsg = "<?php echo $sType; ?>"

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: titleMsg
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: <?php echo json_encode($dataP, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}

</script>

<div id="chartContainer" style="height: 370px; width: 60%; padding-left: 20%"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

</div>
</body>

<footer style="padding-top:3%" class="container-fluid text-center">
    <br>
    <p>Copyright &copy; 2020</p>
    <p>Footer Text</p>
</footer>

</html>