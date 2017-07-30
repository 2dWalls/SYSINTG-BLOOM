<?php
session_start();
$_SESSION['usertype']=0;
$_SESSION['username']="";
$_SESSION['password']="";
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src ="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function(){
   $('#table').DataTable({});
  });
  </script>

<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">

<script type="text/javascript" src="js/function.js"></script>
<style>
  table{
    overflow-y: scroll;
    height:200px;
  }
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
					<li class="current-menu-item"><a href="Data.php">Home</a></li>
					<li><a href="univData.php">University Data</a></li>
					<li><a href="studentData.php">Student Data</a></li>


				</ul>
			</nav>
			<div class="clear"></div>
		</div>
	</header>
</div>
</body>
<br>
<div id ="box">
  <div class="box-top">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

      University:        <a><select name ="univ">
      <option value="All">All</option>
       <option value="Ateneo de Manila University">Ateneo de Manila University</option>
       <option value="De La Salle University">De La Salle University</option>
       <option value="Lyceum of the Philippines University">Lyceum of the Philippines University</option>
       <option value="Mapua University">Mapua University</option>
       <option value="Systems Technology Institute">Systems Technology Institute</option>
       <option value="University of Santo Tomas">Mapua University</option>
       <option value="University of the Philippines">University of the Philippines</option>
     </select>

   </a><input class="btn" type="submit"  name "submit" align= "left"></li></div>
  </div>
</div>
<br>


<body style="height:98vh">

  <form action="">
  </form>


<table id="table">
  <thead>
    <th>First Name</th>
    <th>Surname</th>
    <th>Birthday</th>
    <th>University</th>
  </thead>
  <tbody>

  <?php
          $connect = mysqli_connect("localhost", "root", "", "mydb");


if(isset($_POST['univ'])==true)
{
        if($_POST['univ']!="All")
        {
          $sql = "SELECT * FROM mydb.students
                        where university = '{$_POST['univ']}';";
          $result = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_array($result))
            {
              echo  "
              <tr>
                      <td align='center'>{$row['FirstName']}</td>
                      <td align='center'>{$row['Surname']}</td>
                      <td align='center'>{$row['Birthday']}</td>
                      <td align='center'>{$row['University']}</td>
             </tr>
                        ";
           }
        }else
        {

          $sql = "SELECT * FROM mydb.students;";

          $result = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_array($result))
            {
              echo  "
              <tr>
                      <td align='center'>{$row['FirstName']}</td>
                      <td align='center'>{$row['Surname']}</td>
                      <td align='center'>{$row['Birthday']}</td>
                      <td align='center'>{$row['University']}</td>
             </tr>
                        ";
           }
         }
}else {
  $sql = "SELECT * FROM mydb.students;";

  $result = mysqli_query($connect, $sql);

    while($row = mysqli_fetch_array($result))
    {
      echo  "
      <tr>
              <td align='center'>{$row['FirstName']}</td>
              <td align='center'>{$row['Surname']}</td>
              <td align='center'>{$row['Birthday']}</td>
              <td align='center'>{$row['University']}</td>
     </tr>
                ";
   }
}
  ?>
  </tbody>
</table>

</body>
</html>
