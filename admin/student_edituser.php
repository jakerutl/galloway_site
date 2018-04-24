<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);
	//echo $info;

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
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
	<h2 class="editPage">Edit User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form class="editDiv" action="admin_edituser.php" method="post">
		<label class="editLabels">First Name:</label>
		<input class="editInput" type="text" name="fname" value="<?php echo $info['user_fname'];  ?>"><br><br>
		<label class="editLabels">Username:</label>
		<input class="editInput" type="text" name="username" value="<?php echo $info['user_name'];  ?>"><br><br>
		<label class="editLabels">Password:</label>
		<input class="editInput" type="text" name="password" value="<?php echo $info['user_pass'];  ?>"><br><br>
		<label class="editLabels">Email:</label>
		<input class="editInput" type="text" name="email" value="<?php echo $info['user_email'];  ?>"><br><br>
		<button id="saveUser" type="submit" name="submit" value="Edit Account">Edit Account</button>
	</form>
</div>

</body>
</html>
