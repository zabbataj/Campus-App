<?php

//connectivity
require('config.php');


if(isset($_POST['login']))
{
	$u = $_POST['uname'];
	$pass = $_POST['upass'];
	$p = md5($pass);
	$_SESSION['user']=$u;
	$_SESSION['pass']=$p;
//user check
$q = "SELECT * FROM users WHERE username='$u' AND password='$p'";
$cq = mysqli_query($con,$q);
$ret = mysqli_num_rows($cq);
if($ret == true)
{
	echo "<script>document.location='profile.php'</script>";
	//echo "<center><h2 style='color:green'>ACCESS GRANTED</h2></center>";
}
else
{
	echo "<center><h2 style='color:red'>ACCESS DENIED</h2></center>";
}
}

?>
<html>
<body style="background-color:#E5E5E5">
<div align="center">
	<div class="d-inline-flex p-2">
<form method="post">
	<form>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Login</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter login" name="uname">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="upass">
	  </div>
	  <div class="form-check">
	    <label class="form-check-label">
	      <input type="checkbox" class="form-check-input">
	      Check me out
	    </label>
	  </div>
	  <button type="submit" class="btn btn-primary" value="Login" name="login">Submit</button>
	</form>
</form>
	</div>
</div>
</body>
</html>
