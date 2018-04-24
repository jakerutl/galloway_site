<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	require_once('phpscripts/config.php');
	confirm_logged_in();
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
</body>
</html>
