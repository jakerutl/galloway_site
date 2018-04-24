<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		if(empty($lvllist)){
			$message = "Please select a user level.";
		}else{
			$result = createUser($fname, $username, $password, $email, $lvllist);
			$message = $result;
		}
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
		<li><a href="admin_createuser.php">Create User</a></li>
		<li><a href="admin_edituser.php">Edit User</a></li>
		<li><a href="admin_deleteuser.php">Delete User</a></li>
		<li><a href="admin_posts.php">Posts</a></li>
		<li><a href="phpscripts/caller.php?caller_id=logout">Sign Out</a></li>
	</ul>
	</div>

	<div class="delLeft">
	<h2 class="createPage" >Create User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form class="editDiv" action="admin_createuser.php" method="post">
		<label class="editLabels">First Name:</label>
		<input class="editInput" type="text" name="fname" value=""><br><br>
		<label class="editLabels">Username:</label>
		<input class="editInput" type="text" name="username" value=""><br><br>
		<label class="editLabels">Password:</label>
		<input class="editInput" type="text" name="password" value=""><br><br>
		<label class="editLabels">Email:</label>
		<input class="editInput" type="text" name="email" value=""><br><br>
		<select class="lvl" name="lvllist">
			<option value="">Select User Level</option>
			<option value="2">Student</option>
			<option value="1">Prof</option>
		</select><br>
		<button id="createUser" type="submit" name="submit" value="Create User">Create User</button>
	</form>
</div>
</body>
</html>
