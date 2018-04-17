<?php
session_start();

//connectivity
require('config.php');

//marquee display
$q = "SELECT marquee1 FROM admin WHERE id=1";
$q1 = mysqli_query($con,$q);
$disp = mysqli_fetch_array($q1);
//echo $disp['marquee1'];

//change colg name
$q2 = "SELECT colgname FROM admin WHERE id=1";
$q21 = mysqli_query($con,$q2);
$colgdisp = mysqli_fetch_array($q21);

//change intro content
$q3 = "SELECT colgintro FROM admin WHERE id=1";
$q31 = mysqli_query($con,$q3);
$introdisp = mysqli_fetch_array($q31);
//echo $introdisp['colgintro'];

//change footer
$q4 = "SELECT footerinfo FROM admin WHERE id=1";
$q41 = mysqli_query($con,$q4);
$footerdisp = mysqli_fetch_array($q41);
//echo $footerdisp['footerinfo'];

?>
<html>
<head>
<title>Sample School Project</title>
<link rel="stylesheet" type="text/css" href="engine/css/slideshow.css" media="screen" />
	<style type="text/css">.slideshow a#vlb{display:none}</style>
	<script type="text/javascript" src="engine/js/mootools.js"></script>
	<script type="text/javascript" src="engine/js/visualslideshow.js"></script>
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<!-- updated <script type="text/javascript" src="engine1/jquery.js"></script>-->

<!--bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
      <td width="974" height="647" style="vertical-align:text-top">
      	<?php
	@$opt = $_GET['option'];
	if($opt=="")
	{
	?>
	<center>

		<div class="alert alert-info" role="alert"><marquee><?php echo $disp['marquee1']; ?></marquee></div>

		<blockquote class="blockquote text-center">
  		<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
  		<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
		</blockquote> <!--utw zmiennej i dodanie do back-->
	</center>
    <p><center>
      <p><strong><font size="+2"><?php echo $colgdisp['colgname'];?></font></strong> <b>-</b> <font size="+1"><?php echo $introdisp['colgintro']; ?></font></p>
			  <center><img src="images/colg.jpg" width="696" height="488"></center>
    </center></p>
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
		case 'cdrive':
		include('cdrive.php');
		break;
		case 'news':
		include('news.php');
		break;
		case 'sports':
		include('sports.php');
		break;
		case 'admission':
		include ('admission.php');
		break;
		case 'sdp':
		include('sdp.php');
		break;
		case 'wevents':
		include('wevents.php');
		break;
		case 'notice':
		include('notice.php');
		break;

	}}

	?>


      </td>
      <td width="343" >
      <div class="alert alert-secondary text-center" role="alert">College Updates</div>
				<a class="twitter-timeline" data-height="1000" href="https://twitter.com/TwitterDev?ref_src=twsrc%5Etfw" data-tweet-limit="3" data-chrome="nofooter noborders noscrollbar">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2"><br><center>&copy; <?php echo $footerdisp['footerinfo']; ?></center>
      <div align="right">
				<p>version: 1.2</p>
				<a href="#facebook"><img src="images/f.png" width="30" height="30" alt=""/></a>
				<a href="#twitter"><img src="images/t.png" width="30" height="30" alt=""/></a>
				<a href="#youtube"><img src="images/y.png" width="30" height="30" alt=""/></a>
			</div></td>
    </tr>
  </tbody>
</table>
</html>
