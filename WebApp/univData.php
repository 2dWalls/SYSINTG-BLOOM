<?php
session_start();
$_SESSION['usertype']=0;
$_SESSION['username']="";
$_SESSION['password']="";
?>
<html>
	<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/des.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>University Data</title>

		<style type="text/css">

		</style>
	</head>

  <body>
  <div id="wrap">
  	<header>
  		<div class="inner relative">
  			<a class="logo" ><img src="images/logo.png" alt="fresh design web"></a>
  			<a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
  			<nav id="navigation">
  				<ul id="main-menu">
  					<li ><a href="Data.php">Home</a></li>
  					<li class="current-menu-item"><a href="univData.php">University Data</a></li>
  					<li><a href="studentData.php">Student Data</a></li>


  				</ul>
  			</nav>
  			<div class="clear"></div>
  		</div>
  	</header>
  </div>
  </body>
  <br>
	<body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



		<script type="text/javascript">


$(document).ready(function () {

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'University Population'
        },
        tooltip: {
					pointFormat: '{series.name}: <b>{point.y:1f} Students</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'University',
            colorByPoint: true,
            data: [
              <?php

              $connect = mysqli_connect("localhost", "root", "", "mydb");
              $sql = "select university, count(firstname) as 'total' from mydb.students
                            group by 1;";
                        $result = mysqli_query($connect, $sql);

                          while($row = mysqli_fetch_array($result))
                          {
                            echo  "{name:  ";
                            echo "'";
                            echo $row['university'];
                            echo "',";
                            echo "y: ";
                            echo $row['total'];
                            echo '},';
                         }
                         ?>

               ]
        }]
    });
});
		</script>
	</body>
</html>
