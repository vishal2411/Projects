<?php 
session_start();
?>

<html>
<head>
<title> Sign Up form </title>
</head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

td, tr {
  text-align: left;
  padding: 10px;
}


input {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


</style>

<body>

<h1 align="center"> Log In Form</h1>

<form method ="post" enctype="multipart/form-data">
  <table align= "center" border="1" >
	<tr>
		<td> Email Id </td>
		<td colspan="3"><input type="text" name="user_email" placeholder ="Enter Email Id"/> </td>
	</tr>
	<tr>
		<td>Password </td>
		<td colspan="3"><input type="password" name= "user_pass" placeholder="Enter Password"/> </td>
	</tr>
	<tr>
		<td colspan="4"> <center><input  style="width: 20%" type="submit" class="btn btn-success" name="send_data" value="LOGIN"/> </center> </td>
	</tr>
	<tr>
		<td colspan="2"> <p align="center"> Don't have an account? <a href="signup.php"> Sign Up </a> </p></td>
	</tr>

   </table>
</form>
</body>
</html>

<?php

$conn= mysqli_connect("localhost","root","","registration");
	  
          
	if(isset($_POST{'send_data'}))
	{
		$user_email = $_POST['user_email'];
		$user_pass = $_POST['user_pass'];
		
		$sql = "SELECT * FROM users WHERE email = '$user_email' and pass = '$user_pass'";
		$res=mysqli_query($conn,$sql);
		$num=mysqli_fetch_array($res);
		if($num>0)
		{
			echo "<script>alert('Login Sucessful!');</script>";
			$_SESSION['user']=$user_email;
			
			header("location:homepage.php");
		} else{
			echo "<script>alert('Invalid Login Details');</script>";
		}
	}
?>
