<?php
$db=mysqli_connect("localhost","root","","janki");

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<center><h3> PHP CRUD</h3></center> 
<title>PHP CRUD</title>
</head>
<body>
	<table style="width:25%" border="1" align="center">
<div class="contant">
<div id = "format">

<form method="post">
<center>


	<tr>
	<td>
	
	<label> Name</label>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" placeholder="Enter Name." required>
	<br><br>
	</td>
	</tr>
	
	<tr>
	<td>
	<label> Email</label>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="email" name="email" placeholder="Enter Email." required>
	<br><br>
	</tr>
	</td>
	
	<tr>
	<td>
	<label> Mobile No</label>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="mno" placeholder=" Enter Mobile No." required>
	<br><br>
	</tr>
	</td>
	
	<tr>
	<td>
	<label> Birthdate</label>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="bdate" placeholder=" Enter Birthdate" required>
	<br><br>
	
	</td>
	</tr>
	
	<tr>
	<td colspan="1" align="center">
	<input type="submit" name="submit" value="Submit">
    </tr>
    </td>
	
</table>
</center>
</form>


<hr>
<h3> <center>User Registration </center> </h3>

<table style="width:80%" border="1" align="center">
<tr>
	<th>No </th>
	<th>Name</th>
	<th>Email</th>
	<th>Mobile No</th>
	<th>Birthdate</th>
	<th>Opration</th>
</tr>
<?php
	$i=1;
	$query="select * from jk";
	$run=$db->query($query);
	if($run -> num_rows > 0)
	{
		while ($row=$run -> fetch_assoc())
		{
				$id=$row['u_id'];
			?>
			<tr>
			<td><?php echo $i++; ?></td>
		
			<td><?php echo $row['u_name']?></td>
			<td><?php echo $row['u_email']?></td>
			<td><?php echo $row['u_mno']?></td>
			<td><?php echo $row['u_bdate']?></td>
			<td>
			
				<a href="delete.php?id=<?php echo $id;?>"onclick="return confirm('Are You Sure ?')" >Delete </a>
				 &nbsp;&nbsp;<a href="edit.php?id=<?php echo $id;?>"onclick="return confirm('Update Record')" >Edit</a>
			</td>
			</tr>
			<?php
		}
	}
?>
</table>

</hr>


</div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{

	$name=$_POST['name'];
	$email=$_POST['email'];
	$mno=$_POST['mno'];
	$bdate=$_POST['bdate'];

	$query="insert into jk values(null, '$name','$email','$mno','$bdate')";
	if(mysqli_query($db,$query))
	{
		echo'<script>alert("User registerd successfully .");</script>';
		header('location:user.php');
		
	}
	else
		
	{
		echo mysqli_error($db);
	}
		
}


?>