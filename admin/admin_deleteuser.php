<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();
	$tbl = "tbl_user";
	$users = getAll($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1.0, width=device-width"/>
<title>Delete User</title>
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
	<h2 class="delPage">Remove User</h2>
<div class="list">
<?php
while($row = mysqli_fetch_array($users)){
	echo "<h3>{$row['user_fname']} </h3> <a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Remove</a><br><br><br>";
}

 ?>
</div>
</div>

</body>
</html>
