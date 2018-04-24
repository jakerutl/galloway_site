<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);


	require_once('admin/phpscripts/config.php');
	// confirm_logged_in();

$tbl = "tbl_post";
$posts = getRand($tbl);
?>

<?php
$tbl = "tbl_studentPost";
$student = getStuRand($tbl);
?>

<?php
$tbl = "tbl_studentPost";
$s_posts = getAll($tbl);

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $story = $_POST['story'];
  $release = $_POST['release'];
  $result = addStudentPost($title, $story, $release);
  $message = $result;
}
?>

<?php
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	$street = $_POST['street'];
	$direct = "thankyou.php";
	if($street === "") {
		$sendMail = submitMessage($name, $email, $phone, $message, $direct);
	}
}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to my site</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/reset.css">
</head>
<body>
	<?php
	include('includes/nav.html');
?>
	<!-- <div class="main"> -->

<header class="header">
	<div class="square">
	<h1>TRACEY GALLOWAY</h1>
</div>
</header>

<div class="aboutSec">
	<div class="aboutInfo">
		<h2>About Tracey</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div class="aboutPic">
		<img src="images/mountain3.png" alt="">
	</div>
</div>

<div class="researchSec">
<h2>RESEARCH</h2>
<div class="whiteLine">
</div>
<p>Lorem ipsum dolor sit amet, sit ne populo bonorum definitiones, civibus indoctum sit no. Mei ad nostro blandit quaestio, eum ancillae gubergren ne. Et ius platonem maluisset. No vel amet gubergren urbanitas, decore feugiat albucius ius in, posse dicit deseruisse cum cu.Lorem ipsum dolor sit amet, sit ne populo bonorum definitiones, civibus indoctum sit no. Mei ad nostro blandit quaestio, eum ancillae gubergren ne. Et ius platonem maluisset. No vel amet gubergren urbanitas, decore feugiat albucius ius in, posse dicit deseruisse cum cu</p>
</div>

<div class="newsSec">
	<div class="newsInfo">
		<h2 class="newsTitle">STAY UP TO DATE</h2>
		<div class="text">
		<?php
		while($row = mysqli_fetch_array($posts)){
		echo "<h3>{$row['post_title']}</h3><br><br><p class=\"newsDesc\">{$row['post_desc']}</p><br><h4><a class=\"linkWork\" href=\"//".$row['post_target']."\" target=\"_blank\">{$row['post_target']}</a></h4>";
	}
		?>
	</div>
		<div class="More">
			<a href="#" class="seeMore" >SEE MORE</a>
		</div>
	</div>
	<div class="newsPic">
		<img src="images/mountain1.png" alt="">
	</div>
</div>

<div class="studentSec">
	<div class="title">
		<h2>SEE WHAT THEY'RE DOING!</h2>
	</div>
	<div class="whiteLine"></div>
	<?php
	while($row = mysqli_fetch_array($student)){
	echo "<h3>{$row['s_post_title']}</h3><br><br><p>{$row['s_post_desc']}</p><br><h4><a class=\"linkWork\" href=\"//".$row['s_post_target']."\" target=\"_blank\">{$row['s_post_target']}</a></h4>";
}
	?>
	<div class="More">
		<a href="#" class="seeMore" >SEE MORE</a>
	</div>
</div>

<div class="contactForm">
	<h2>Write me an Email!</h2>
	<form id="contact" action="contact.php" method="post">

		<fieldset class="inputCon">
  		<input placeholder="Name..." type="text" tabindex="1" name="name" required>
		</fieldset>

		<fieldset class="inputCon">
  		<input placeholder="Email..." type="email" name="email" tabindex="2" required>
		</fieldset>

		<fieldset class="inputCon">
  		<input placeholder="Phone (optional)..." type="tel" name="phone" tabindex="3">
		</fieldset>

		<fieldset class="desc">
  		<textarea placeholder="Your Message..." tabindex="5" name="message" required></textarea>
		</fieldset>

		<fieldset>
  		<input class="street" placeholder="Street" type="text" name="street" autocomplete="off">
		</fieldset>

		<fieldset>
  		<button name="submit" value="Send" type="submit" id="contact-submit">SEND</button>
		</fieldset>
</form>
</div>


<!-- <?php
	include('includes/footer.html');
?> -->
<!-- </div> -->
</body>
</html>
