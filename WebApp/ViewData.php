<?php
$_SESSION['usertype']=0;
?>
<html>
<head>
<title>MLA </title>
<link rel="stylesheet" type="text/css" href="designMLA.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src ="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>	
<style>
.dropdown-content {
    min-width: 450px;
} 
</style>
</head>

		<div class="content"> 
		        <div class="table-responsive">  
                     <h3 align="center">Data Set of Test User</h3><br /> 
                    <table id="table">  
                <thead>  
                     <th>Order Num</th>  
                     <th>Student Name</th>  
					 <th>Grade</th>
                </thead>
				<tbody>

					<?php  
 $connect = mysqli_connect("localhost", "root", "", "dbsales");  
 $sql = "SELECT * FROM dbsales.orderdetails;
               "; 
		   
 $result = mysqli_query($connect, $sql);   
 
      while($row = mysqli_fetch_array($result))  
      {  
           echo  "  
                <tr>  
                     <td>{$row['orderNumber']}</td>  
                     <td>{$row['productCode']}</td>
					 <td>{$row['quantityOrdered']}</td>
					 <td>{$row['priceEach']}</td>
					 <td>{$row['orderLineNumber']}</td>
                 </tr>  
           ";  
      }  

  

 ?>  
</tbody>
					
		 

		<div id="edit" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		     
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit Row</h4>
		      </div>
		      <div class="modal-body">

		      	<div class=" form-group  ">
		      		<label for='name' class="col-md-3">Student Name: </label>
		      		<input type="text" name="name" id='name1' readonly>
		      	</div>
		      	<div class=" form-group  ">
		      		<label for='desc' class="col-md-3">Filipino: </label>
		      		<input type="text" name="quan" id='fil'>
		      	</div>
		      	<div class=" form-group  ">
		      		<label for='price' class="col-md-3">English: </label>
		      		<input type="text" name="price" id='eng'>
		      	</div>
		      	<div class=" form-group  ">
		      		<label for='quan' class="col-md-3">Math:</label>
		      		 <input type="text" name="quan" id='mth'>
		      	</div>
				<div class=" form-group  ">
		      		<label for='quan' class="col-md-3">Science:</label>
		      		 <input type="text" name="quan" id='sci'>
		      	</div>
				<div class=" form-group  ">
		      		<label for='quan' class="col-md-3">TLE:</label>
		      		 <input type="text" name="quan" id='tle'>
		      	</div>
				<div class=" form-group  ">
		      		<label for='quan' class="col-md-3">AP:</label>
		      		 <input type="text" name="quan" id='apl'>
		      	</div>
				<div class=" form-group  ">
		      		<label for='quan' class="col-md-3">Music:</label>
		      		 <input type="text" name="quan" id='mus'>
		      	</div>
				<div class=" form-group  ">
		      		<label for='quan' class="col-md-3">Arts:</label>
		      		 <input type="text" name="quan" id='art'>
		      	</div>
				<div class=" form-group  ">
		      		<label for='quan' class="col-md-3">PE:</label>
		      		 <input type="text" name="quan" id='phe'>
		      	</div>
				<div class=" form-group  ">
		      		<label for='quan' class="col-md-3">Health:</label>
		      		 <input type="text" name="quan" id='hea'>
		      	</div>
		      	
		      </div>
		      <div class="modal-footer">
		      
		      </div>
		    </div>

		  </div>
		</div>
                </div>  
		</div>
		
		                

		
		
		

</body>

	 
	 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){

			 function fetch_data()  
		{  
           $.ajax({  
                url:"selectAdvStudents.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
		}  
      fetch_data();
		
		
	 var table = $('#table').DataTable();
			
			
			$('#table').on('click','.edit',function(){
				var id = $(this).attr('id');
				var temp = $(this).parent('tr');
				var data = table.row( $(this).closest('tr').get(0) ).data();
				console.log(id);
				$('#name1').val(data[1]);
				
				
				
				$('#edit').modal('show');
				$('#submitedit').click(function(){
				var name1 = $('#name1').val();
				
				var fil = $('#fil').val();
				var eng = $('#eng').val();
				var mth = $('#mth').val();
				var sci = $('#sci').val();
				var tle = $('#tle').val();
				var apl = $('#apl').val();
				var mus = $('#mus').val();
				var art = $('#art').val();
				var phe = $('#phe').val();
				var hea = $('#hea').val();
				$("#submitedit").unbind('click').bind('click', function () { }); 

				
				$.ajax({
					type:'POST',
					url: 'ajax2.php',
					data:{ 'method':1, 'id':id,'name':name1,'fil':fil,'eng':eng,'mth':mth, 'sci':sci
						  ,'tle':tle,'apl':apl,'mus':mus,'art':art,'phe':phe,'hea':hea},
					success: function(data){
						$('#edit').modal('hide');

						alert(data);
						$('#fil').val('');
						$('#eng').val('');
						$('#mth').val('');
						$('#sci').val('');
						$('#tle').val('');
						$('#apl').val('');
						$('#mus').val('');
						$('#art').val('');
						$('#phe').val('');
						$('#hea').val('');
					}
				})
			});
			});

		});
	</script>


</html>
