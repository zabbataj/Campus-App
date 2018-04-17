<?php
session_start();
//connectivity
require('config.php');

$q2 = "SELECT colgname FROM admin WHERE id=1";
$q21 = mysqli_query($con,$q2);
$colgdisp = mysqli_fetch_array($q21);

// proba lapania danych
$l2 = "SELECT email FROM users WHERE id=1"; //statycznie id zmiana na fetch id to user
$l21 = mysqli_query($con,$l2);
$dane = mysqli_fetch_array($l21);

if($_SESSION['user']=="")
{
	header('location:index.php');
}

?>
<html>
<head>
<title>Sample School Project</title>
<link rel="stylesheet" type="text/css" href="engine/css/slideshow.css" media="screen" />
	<style type="text/css">.slideshow a#vlb{display:none}</style>
	<script type="text/javascript" src="engine/js/mootools.js"></script>
	<script type="text/javascript" src="engine/js/visualslideshow.js"></script>
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>

<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


	</head>
	<table width="1050px" align="center">
		<tbody>
			<tr>
				<th height="39" colspan="2">
					<div style="text-align:left;color:#000000" class="p-3 mb-2 bg-info text-white">
						<h1 class="display-3"><?php echo $colgdisp['colgname'];?></h1>
						<nav class="nav">
							<a class="nav-link bg-info text-light" href="index.php">Home</a>
							<a class="nav-link bg-info text-light" href="index.php?option=about">About</a>
							<a class="nav-link bg-info text-light" href="index.php?option=contact">Contact</a>
							<a class="nav-link bg-info text-light" href="index.php?option=gallery">Gallery</a>
							<a class="nav-link bg-info text-light" href="index.php?option=courses">Courses</a>
							<a class="nav-link bg-info text-light" href="index.php?option=regs">Registration</a>
							<a class="nav-link bg-info text-light" href="index.php?option=login">Login</a>
						</nav>
					</div>
				</th>
			</tr>
			<tr>
      <th height="317" colspan="2">
      <!--Slider-->
      <div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/banner_01.jpg" alt="Multispeciality College Campus" title="Multispeciality College Campus" id="wows1_0"/></li>
<li><img src="data1/images/highlightnews.jpg" alt="International Accredition" title="International Accredition" id="wows1_1"/></li>
<li><img src="data1/images/img21644.jpg" alt="Best Overall Employement" title="Best Overall Employement" id="wows1_2"/></li>
<li><img src="data1/images/url.jpg" alt="Best Of Class Infrastructure" title="Best Of Class Infrastructure" id="wows1_3"/></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="Multispeciality College Campus"><img src="data1/tooltips/banner_01.jpg" alt="Multispeciality College Campus"/>1</a>
<a href="#" title="International Accredition"><img src="data1/tooltips/highlightnews.jpg" alt="International Accredition"/>2</a>
<a href="#" title="Best Overall Employement"><img src="data1/tooltips/img21644.jpg" alt="Best Overall Employement"/>3</a>
<a href="#" title="Best Of Class Infrastructure"><img src="data1/tooltips/url.jpg" alt="Best Of Class Infrastructure"/>4</a>
</div></div>
<span class="wsl"></span>
	<a href="#" class="ws_frame"></a>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
    <!--slider end-->

      </th>
    </tr>

    <tr>
      <td height="38" colspan="2">
				<div class="alert alert-dark" role="alert">
					<nav class="nav">
						<a class="nav-link bg-secodary" href="profile.php">Profil</a>
						<a class="nav-link" href="profile.php?option=about">About</a>
						<a class="nav-link" href="profile.php?option=mfees">Mess Fees</a>
						<a class="nav-link" href="profile.php?option=rfees">Room Fees</a>
						<a class="nav-link" href="logout.php">Logout</a>
					</nav>
				</div>
      	<div>
				</td>
    </tr>
    <tr>
      <td width="974" height="647" bgcolor="#D9D9D9" style="vertical-align:text-top">
      	<?php
	@$opt = $_GET['option'];
	if($opt=="")
	{
	?>
    <html>
	<h1><center>Welcome <?php echo $_SESSION['user']; ?></center></h1>
	<h2><center>Adres: <?php echo $_SESSION['email'];?></center></h1>

    </html>
	<?php
    error_reporting(1);
	}
	else{
	switch($opt)
	{
		case 'regs':
		include('registration.php')	;
		break;
		case 'login':
		include('login.php');
		break;
        case 'about':
		include('about.php');
		break;
		case 'contact':
		include('contact.php');
		break;
		case 'gallery':
		include('gallery.php');
		break;
		case 'course':
		include ('course.php');
		break;
		case 'mfees':
		include('mfees.php');
		break;
		case 'rfees':
		include('rfees.php');
		break;

	}}

	?>


      </td>
    <!--  <td width="343" style="background-color:#468EFF">

		</td> -->
    </tr>
    <tr>
      <td height="25" colspan="2" style="background-color:#B8AFFF"><center><b>&copy; 2014 by UserName | Managed by ABC</b></center></td>
    </tr>
  </tbody>
</table>
</html>
