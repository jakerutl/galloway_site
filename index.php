<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);


	require_once('admin/phpscripts/config.php');
	// confirm_logged_in();

$tbl = "tbl_post";
$posts = getAll($tbl);

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $story = $_POST['story'];
  $release = $_POST['release'];
  $result = addPost($title, $story, $release);
  $message = $result;
}
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
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php
	include('includes/nav.html');
?>
	<!-- <div class="main"> -->


<div class="header">
	<div class="square">
	<h1>TRACEY GALLOWAY</h1>
</div>
</div>

<div class="mainPosts">
<?php
	while($row = mysqli_fetch_array($posts)){
		echo "<h2>{$row['post_title']} </h2><p>{$row['post_desc']}</p> <h3><a href=\"//".$row['post_target']."\" target=\"_blank\">{$row['post_target']}</a></h3>";
	}
	?>
	</div>

	<div class="mainPosts">
<h2>Student posts</h2>
<br>
<br>
	<?php
		while($row = mysqli_fetch_array($s_posts)){
			echo "<h2>{$row['s_post_title']} </h2><p>{$row['s_post_desc']}</p> <h3><a href=\"//".$row['s_post_target']."\" target=\"_blank\">{$row['s_post_target']}</a></h3>";
		}
		?>
</div>

<form id="contact" action="contact.php" method="post">

<fieldset>
  <input placeholder="Name..." type="text" tabindex="1" name="name" required>
</fieldset>

<fieldset>
  <input placeholder="Email..." type="email" name="email" tabindex="2" required>
</fieldset>

<fieldset>
  <input placeholder="Phone (optional)..." type="tel" name="phone" tabindex="3">
</fieldset>

<fieldset>
  <textarea placeholder="Your Message..." tabindex="5" name="message" required></textarea>
</fieldset>

<fieldset>
  <input class="street" placeholder="Street" type="text" name="street" autocomplete="off">
</fieldset>

<fieldset>
  <button name="submit" value="Send" type="submit" id="contact-submit">SEND</button>
</fieldset>
</form>


<!-- <?php
	include('includes/footer.html');
?> -->
<!-- </div> -->
</body>
</html>
