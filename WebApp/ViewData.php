<?php
session_start();
$_SESSION['usertype']=0;
$_SESSION['username']="";
$_SESSION['password']="";
echo $_SESSION['password'];
echo $_SESSION['username'];

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src ="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
 $('#table').DataTable();
});
</script>
</head>

<table id="table">
      <thead>
             <th>First Name</th>
             <th>SurnameName</th>
			       <th>Birthday</th>
             <th>University</th>
      </thead>
          <tbody>

					<?php
                  $connect = mysqli_connect("localhost", "root", "", "mydb");
                  $sql = "SELECT * FROM mydb.students;";

                  $result = mysqli_query($connect, $sql);

                    while($row = mysqli_fetch_array($result))
                    {
                      echo  "
                      <tr>
                              <td>{$row['FirstName']}</td>
                              <td>{$row['Surname']}</td>
					                    <td>{$row['Birthday']}</td>
					                    <td>{$row['University']}</td>
                     </tr>
                                ";
                   }
        ?>
        </tbody>

</body>
</html>
