<?php
//connectivity
require('config.php');

//captcha
$num1 = range(9,0);
	$num2 = range(9,0);
	$rnum1 = array_rand($num1);
	$rnum2 = array_rand($num2);
	$n1 = $num1[$rnum1];
	$n2 = $num2[$rnum2];
	$sum = $n1 + $n2;
	$res = $n1." + ".$n2;
if(isset($_POST['submit']))
{
if($_POST['c1']==$_POST['c2'])
{
	$n = $_POST['uname'];
	$pass = $_POST['upass'];
	$p = md5($pass);//encrypt pass
	$em = $_POST['umail'];
	$gen = $_POST['gender'];
	$mob = $_POST['umob'];
	$add = $_POST['address'];
	//$img = $_FILES['file']['name'];

//check user if already exists
$q = "SELECT mob FROM users WHERE mob='$mob'";
$cq = mysqli_query($con,$q);
$ret = mysqli_num_rows($cq);
if($ret == true)
{
	echo "<center><h2 style='color:red'>User with same Mobile no. already exists</h2></center>";
}
//insert into database
else
{
	$query = "INSERT INTO users VALUES ('','$n','$p','$em','$gen','$mob','$add')";
	mysqli_query($con,$query);
	//mkdir("images/".$_POST['umail']);
	//move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_POST['umail']."/".$_FILES['file']['name']);
	echo "<center><h2 style='color:green'>Details Saved!</h2></center>";
}
}
else
{
	echo '<script>alert("Wrong Verification Code, try again!")</script>';
}
}

//display details
if(isset($_POST['display']))
{
	$que = mysqli_query($con,"select * from users");

	echo "<div align='center'>";
	echo "<table border='1' bgcolor='#B2B8FF' width='500px'>";
	echo "<tr><th>User ID</th><th>UserName</th><th>Password<br>(Encrypted)</th><th>Email</th><th>Gender</th><th>Mobile No.</th><th>Image</th><th>Option</th></tr>";

	while($row= mysqli_fetch_array($que))
	{
	echo "<tr>";
	echo "<td>".$row['id']."</td>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['password']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['gender']."</td>";
	echo "<td>".$row['mob']."</td>";

	$e=$row['email'];
	$img=$row['image'];

	echo "<td><img src='images/$e/$img' width='70' height='70'/></td>";

	echo "<td><a href='edit.php'>Edit</a>&nbsp;&nbsp;
		<a href='delete.php?email=$e'>Delete</a>
	</td>";
	echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
}
?>
<html>
<head>
<script>
	function go()
	{
		document.location='./login.php';
	}
	function refresh()
	{
		document.location='./index.php';
	}
</script>
</head>
<body style="background-color:#E5E5E5">
<div align="center">
	<form method="post" enctype="multipart/form-data">
		<fieldset style="background-color: #D8D8D8;">
		<legend><font size="+2"><strong>Registration</strong></font></legend>
			<div class="form-group">
				<label>UserName</label>
				<input type="text" class="form-control" placeholder="required" name="uname" required/>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" placeholder="required" name="upass" required/>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" placeholder="required" name="umail" required/>
			</div>
	    <p><b>Gender : </b><input type="radio" name="gender" value="m">Male&nbsp;<input type="radio" name="gender" value="f">Female</p>
			<div class="form-group">
				<label>Mobile</label>
				<input type="tel" class="form-control" placeholder="required" name="umob" required/>
			</div>
			<div class="form-group">
				<label>Adress</label>
				<input type="text" class="form-control" placeholder="required" name="address" required/>
			</div>
					<p><fieldset style="display: inline-flex; background-color: #D8D8D8;"><legend><strong>Verification</strong></legend><p><?php
					error_reporting(1);
					echo $res." = ";
					?>
			<input type="hidden" name="c1" value="<?php echo $sum; ?>">
			<input type="text" name="c2" autofocus placeholder="Enter Sum">*</p></fieldset></p><br>
			
	    <p><input type="submit" name="submit" value="Register">&nbsp;<input type="reset" onClick="refresh()"></p>
	</form>
</body>
</html>
