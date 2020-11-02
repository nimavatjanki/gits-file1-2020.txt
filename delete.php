<?php
$db=mysqli_connect("localhost","root","","janki");
if(!$db)
{
		die('erro in db '.mysqli_error($db));
		
}

$id=$_GET['id'];

$query="delete  from jk where u_id=$id";
if(mysqli_query($db,$query))
{
	header('location: user.php');
}
else
{
		echo mysqli_error($db);
}
?>