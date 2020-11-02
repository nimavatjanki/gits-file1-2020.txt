<?php
$db=mysqli_connect("localhost","root","","janki");
if(!$db)
{
		die('erro in db '.mysqli_error($db));
		
}
else{
	$id=$_GET['id'];
	$query="select * from jk where u_id=$id";
	$run=$db->query($query);
	if($run -> num_rows > 0)
	{
		while ($row=$run -> fetch_assoc())
		{
			
			$name=$row['u_name'];
			$email=$row['u_email'];
			$mno=$row['u_mno'];
			$bdate=$row['u_bdate'];
	
		
		
		
			}
		}	
}

?>

<!DOCTYPE html>
<html>
<head>	
	<title>Edit User</title>
</head>
<body>
<form method="post">

	
	
	
	<label> Name</label>
	<input type="text" name="name" value="<?php echo $name;?>">

	
	<label> Email</label>
	<input type="email" name="email" value="<?php echo $email;?>">
	

	<label> Mobile No</label>
	<input type="text" name="mno" value="<?php echo $mno;?>">
	<br><br>

	<label> Birthdate</label>
	<input type="text" name="bdate" value="<?php echo $bdate;?>">
	<br><br>
	
	<input type="submit" name="update" value="Update">

	

</form>

</body>
</html>


<?php
if(isset($_POST['update']))
{

	$name=$_POST['name'];
	$email=$_POST['email'];
	$mno=$_POST['mno'];
	$bdate=$_POST['bdate'];

	$query=" update jk set u_name='$name', u_email='$email', u_mno='$mno', u_bdate='$bdate' where u_id= $id";
	if(mysqli_query($db,$query))
	{
		
		header('location:user.php');
		
	}
	else
		
	{
		echo mysqli_error($db);
	}
		
}


?>