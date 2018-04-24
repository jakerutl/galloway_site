<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	require_once('phpscripts/config.php');
	// confirm_logged_in();

$tbl = "tbl_studentPost";
$posts = getAll($tbl);

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $story = $_POST['story'];
  $release = $_POST['release'];
  $result = addStudentPost($title, $story, $release);
  $message = $result;
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1.0, width=device-width"/>
<title>Welcome to your admin panel</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/admin_main.css">
</head>
<body>
<div class="panel">
	<h2 class="AdminPg">Welcome to the admin Page <?php echo $_SESSION['user_name'];?></h2>
	<ul class="controls">
	<li><a href="student_edituser.php">Edit User</a></li>
	<li><a href="student_posts.php">Posts</a></li>
	<li><a href="phpscripts/caller.php?caller_id=logout">Sign Out</a></li>
</ul>
</div>

<div class="delLeft">

<div class="addPost">
  <form action="student_posts.php" method="post" enctype="multipart/form-data">
		<label>Post Title:</label>
		<input type="text" name="title" value="" required>
		<br><br>
		<label>Description:</label>
		<textarea type="text" name="story" value=""></textarea>
		<br><br>
		<label>Link:</label>
		<input type="text" name="release" value="" required>
		<br><br>
		<input type="submit" name="submit" value="Add Post">
	</form>
</div>

<div class="posts">
<?php
while($row = mysqli_fetch_array($posts)){
	echo "<h3>{$row['s_post_title']}</h3> <p>{$row['s_post_desc']}</p> <h3><a href=\"//".$row['s_post_target']."\" target=\"_blank\">{$row['s_post_target']}</a></h3><a href=\"phpscripts/caller.php?caller_id=deletestudentPost&id={$row['s_post_id']}\">Delete</a><br>";
}
?>
</div>
</div>

</body>
</html>
